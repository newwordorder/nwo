const container = document.getElementById("container");
const logo = document.getElementById("logo");
const brandTrigger = document.getElementById("brand");
const campaignTrigger = document.getElementById("campaign");
const changeTrigger = document.getElementById("change");
const horizontalLine = document.getElementById("line--horizontal");
const line1 = document.getElementById("line--1");
const line2 = document.getElementById("line--2");
const line3 = document.getElementById("line--3");

const height = () => {
  const fontHeight = document.querySelector(".homesplash__text--1");
  const compStyles = window.getComputedStyle(fontHeight);
  return compStyles.getPropertyValue("font-size");
};

const delay = time =>
  new Promise(resolve => {
    setTimeout(resolve, time);
  });

const hoverState = attribute => {
  container.classList.add(`${attribute}--active`);
  document.getElementById(`${attribute}--text`).classList.add("active");
  document.getElementById("logo--green").classList.add("hidden");
  document.getElementById("logo--navy").classList.add("active");

  lineHover(attribute);
  lineHide();
};

const endHover = attribute => {
  container.classList.remove(`${attribute}--active`);
  document.getElementById(`${attribute}--text`).classList.remove("active");
  document.getElementById("logo--green").classList.remove("hidden");
  document.getElementById("logo--navy").classList.remove("active");
  lineSetup();
  lineEnd(attribute);
};

const addListener = ({ element, method, target, enter }) => {
  return enter
    ? element.addEventListener("mouseenter", () => {
        method(target);
      })
    : element.addEventListener("mouseleave", () => {
        method(target);
      });
};

const lineSetup = () => {
  TweenMax.to(horizontalLine, 0.3, {
    width: height()
  });
};

const lineHide = () => {
  TweenMax.to(horizontalLine, 0.3, {
    width: "0rem"
  });
};

const reset = attribute => {
  TweenMax.set(line1, {
    height: "0px",
    top: "0px"
  });
};

const lineHover = attribute => {
  if (attribute === "brand") {
    TweenMax.to(line1, 0.3, {
      top: "0rem",
      height: height()
    });
  } else if (attribute === "campaign") {
    let b = height();
    console.log(b);
    TweenMax.to(line1, 0.3, {
      top: `${b}`,
      height: height()
    });
  } else if (attribute === "change") {
    let c = height();
    console.log(parseInt(c.replace(/px/, "")) * 2 + "px");
    let d = parseInt(c.replace(/px/, "")) * 2 + "px";
    TweenMax.to(line1, 0.3, {
      top: `${d}`,
      height: height()
    });
  }
};

const lineEnd = attribute => {
  if (attribute === "brand") {
    let a = height() * 1;
    TweenMax.to(line1, 0.3, {
      height: "0px",
      top: `${a}`,
      onComplete: reset,
      onCompleteParams: [attribute]
    });
  } else if (attribute === "campaign") {
    let a = height() * 2;
    TweenMax.to(line1, 0.3, {
      height: "0px",
      top: `${a}`,
      onComplete: reset,
      onCompleteParams: [attribute]
    });
  } else if (attribute === "change") {
    let a = height() * 3;
    TweenMax.to(line1, 0.3, {
      height: "0px",
      top: `${a}`,
      onComplete: reset,
      onCompleteParams: [attribute]
    });
  }
};

const Run = () => {
  if (window.innerWidth >= 768) {
    addListener({
      element: brandTrigger,
      method: hoverState,
      target: "brand",
      enter: true
    });
    addListener({
      element: brandTrigger,
      method: endHover,
      target: "brand",
      enter: false
    });
    addListener({
      element: campaignTrigger,
      method: hoverState,
      target: "campaign",
      enter: true
    });
    addListener({
      element: campaignTrigger,
      method: endHover,
      target: "campaign",
      enter: false
    });
    addListener({
      element: changeTrigger,
      method: hoverState,
      target: "change",
      enter: true
    });
    addListener({
      element: changeTrigger,
      method: endHover,
      target: "change",
      enter: false
    });
    lineSetup();
  }
};

Run();
