var sliderEffect = function(opts) {
  var THREE = window.THREE;
  var vertex = `
  varying vec2 vUv;
  void main() {
    vUv = uv;
    gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
  }
  `;

  var fragment = `
  varying vec2 vUv;

  uniform float dispFactor;
  uniform sampler2D disp;

  uniform sampler2D texture1;
  uniform sampler2D texture2;
  uniform float angle1;
  uniform float angle2;
  uniform float intensity1;
  uniform float intensity2;

  mat2 getRotM(float angle) {
    float s = sin(angle);
    float c = cos(angle);
    return mat2(c, -s, s, c);
  }

  void main() {
    vec4 disp = texture2D(disp, vUv);
    vec2 dispVec = vec2(disp.r, disp.g);
    vec2 distortedPosition1 = vUv + getRotM(angle1) * dispVec * intensity1 * dispFactor;
    vec2 distortedPosition2 = vUv + getRotM(angle2) * dispVec * intensity2 * (1.0 - dispFactor);
    vec4 _texture1 = texture2D(texture1, distortedPosition1);
    vec4 _texture2 = texture2D(texture2, distortedPosition2);
    gl_FragColor = mix(_texture1, _texture2, dispFactor);
  }
  `;

  function firstDefined() {
    for (var i = 0; i < arguments.length; i++) {
      if (arguments[i] !== undefined) return arguments[i];
    }
  }

  var parent = opts.parent;
  var dispImage = opts.displacementImage;
  var image1 = opts.image1;
  var image2 = opts.image2;
  var image3 = opts.image3;

  var line = opts.line;
  var slides = Array.from(opts.slides);
  var activeSlide = slides[0];

  var images = opts.images;
  var dispImages = opts.displacements;
  var intensity1 = firstDefined(opts.intensity1, opts.intensity, 1);
  var intensity2 = firstDefined(opts.intensity2, opts.intensity, 1);
  var commonAngle = firstDefined(opts.angle, Math.PI / 4); // 45 degrees by default, so grayscale images work correctly
  var angle1 = firstDefined(opts.angle1, commonAngle);
  var angle2 = firstDefined(opts.angle2, -commonAngle * 3);
  var speedIn = firstDefined(opts.speedIn, opts.speed, 1.6);
  var speedOut = firstDefined(opts.speedOut, opts.speed, 1.2);
  var userHover = firstDefined(opts.hover, true);
  var easing = firstDefined(opts.easing, Expo.easeOut);

  var transition = false;

  if (!parent) {
    console.warn("Parent missing");
    return;
  }

  var scene = new THREE.Scene();
  var camera = new THREE.OrthographicCamera(
    parent.offsetWidth / -2,
    parent.offsetWidth / 2,
    parent.offsetHeight / 2,
    parent.offsetHeight / -2,
    1,
    1000
  );

  camera.position.z = 1;

  var renderer = new THREE.WebGLRenderer({ antialias: false, alpha: true });

  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setClearColor(0xffffff, 0.0);
  renderer.setSize(parent.offsetWidth, parent.offsetHeight);
  parent.appendChild(renderer.domElement);

  var render = function() {
    // This will be called by the TextureLoader as well as TweenMax.
    renderer.render(scene, camera);
  };

  var loader = new THREE.TextureLoader();
  loader.crossOrigin = "";

  var textures = images.map(image => loader.load(image, render));

  var texture1 = loader.load(image1, render);
  var texture2 = loader.load(image2, render);
  var texture3 = loader.load(image3, render);

  var disp = loader.load(dispImage, render);
  var disparray = dispImages.map(image => loader.load(image, render));

  disp.wrapS = disp.wrapT = THREE.RepeatWrapping;

  disparray.forEach(disp => (disp.wrapS = disp.wrapT = THREE.RepeatWrapping));

  texture1.magFilter = texture2.magFilter = texture3.magFilter =
    THREE.LinearFilter;
  texture1.minFilter = texture2.minFilter = texture3.minFilter =
    THREE.LinearFilter;

  textures.forEach(texture => (texture.magFilter = THREE.LinearFilter));
  textures.forEach(texture => (texture.minFilter = THREE.LinearFilter));

  var mat = new THREE.ShaderMaterial({
    uniforms: {
      intensity1: { type: "f", value: intensity1 },
      intensity2: { type: "f", value: intensity2 },
      dispFactor: { type: "f", value: 0.0 },
      angle1: { type: "f", value: angle1 },
      angle2: { type: "f", value: angle2 },
      texture1: { type: "t", value: textures[0] },
      texture2: { type: "t", value: textures[1] },
      disp: { type: "t", value: disparray[0] }
    },

    vertexShader: vertex,
    fragmentShader: fragment,
    transparent: true,
    opacity: 1.0
  });

  var geometry = new THREE.PlaneBufferGeometry(
    parent.offsetWidth,
    parent.offsetHeight,
    1
  );
  var object = new THREE.Mesh(geometry, mat);
  scene.add(object);
  textShow(activeSlide);

  timer();

  function transitionNext() {
    transition = true;
    mat.uniforms.dispFactor.value = 0;
    resetTimer();
    TweenMax.to(mat.uniforms.dispFactor, speedIn, {
      value: 1,
      ease: easing,
      onUpdate: render,
      onComplete: nextSlide
    });
    textHide(activeSlide);
    textShow(getNextText(activeSlide));
    activeSlide = getNextText(activeSlide);
  }

  function transitionPrev() {
    transition = true;
    mat.uniforms.dispFactor.value = 1;
    resetTimer();
    TweenMax.to(mat.uniforms.dispFactor, speedOut, {
      value: 0,
      ease: easing,
      onUpdate: render,
      onComplete: prevSlide
    });
    textHide(activeSlide);
    textShow(getPrevText(activeSlide));
    activeSlide = getPrevText(activeSlide);
  }

  function resetTimer() {
    setTimeout(() => {
      TweenMax.to(line, 0, {
        width: "0%",
        onComplete: timer
      });
    }, 200);
  }

  function prevSlide() {
    mat.uniforms.texture1.value = getPrevTexture(mat.uniforms.texture1.value);
    mat.uniforms.disp.value = getNewDisp(mat.uniforms.disp.value);
    render;
    transition = false;
  }

  function nextSlide() {
    mat.uniforms.texture2.value = getNextTexture(mat.uniforms.texture2.value);
    mat.uniforms.disp.value = getNewDisp(mat.uniforms.disp.value);
    render;
    transition = false;
  }

  function getNextTexture(texture) {
    const index = textures.indexOf(texture);
    if (index != textures.length - 1) {
      return textures[index + 1];
    } else {
      return textures[0];
    }
  }

  function getPrevTexture(texture) {
    const index = textures.indexOf(texture);
    if (index != 0) {
      return textures[index - 1];
    } else {
      return textures[textures.length - 1];
    }
  }

  function textShow(slide) {
    TweenMax.to(slide, 0, {
      opacity: 0,
      ease: Power2.easeOut
    });
    TweenMax.to(slide, 0.4, {
      opacity: 1,
      ease: Power2.easeOut,
      delay: 0.4
    });
  }

  function textHide(slide) {
    TweenMax.to(slide, 0.4, {
      opacity: 0,
      ease: Power2.easeOut
    });
    TweenMax.to(slide, 0, {
      opacity: 0,
      ease: Power2.easeOut,
      delay: 0.4
    });
  }

  function getNextText(text) {
    const index = slides.indexOf(text);
    if (index != slides.length - 1) {
      return slides[index + 1];
    } else {
      return slides[0];
    }
  }

  function getPrevText(text) {
    const index = slides.indexOf(text);
    if (index != 0) {
      return slides[index - 1];
    } else {
      return slides[slides.length - 1];
    }
  }

  function getNewDisp(texture) {
    return disparray[Math.floor(Math.random() * disparray.length)];
  }

  function timer() {
    TweenMax.to(line, 8, {
      width: "100%",
      ease: Linear.easeNone,
      onComplete: function() {
        if (!transition) {
          transitionNext();
        }
      }
    }).delay(0.5);
  }

  window.addEventListener("resize", function(e) {
    renderer.setSize(parent.offsetWidth, parent.offsetHeight);
  });

  this.next = function() {
    if (!transition) {
      transitionNext();
    }
  };
  this.previous = function() {
    if (!transition) {
      transitionPrev();
    }
  };
};
