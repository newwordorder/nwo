"use strict";

var container = document.getElementById("container");
var logo = document.getElementById("logo");
var brandTrigger = document.getElementById("brand");
var campaignTrigger = document.getElementById("campaign");
var changeTrigger = document.getElementById("change");
var horizontalLine = document.getElementById("line--horizontal");
var line1 = document.getElementById("line--1");
var line2 = document.getElementById("line--2");
var line3 = document.getElementById("line--3");

var delay = function delay(time) {
  return new Promise(function(resolve) {
    setTimeout(resolve, time);
  });
};

var hoverState = function hoverState(attribute) {
  container.classList.add(attribute + "--active");
  document.getElementById(attribute + "--text").classList.add("active");
  document.getElementById("logo--green").classList.add("hidden");
  document.getElementById("logo--navy").classList.add("active");

  lineHover(attribute);
  lineHide();
};

var endHover = function endHover(attribute) {
  container.classList.remove(attribute + "--active");
  document.getElementById(attribute + "--text").classList.remove("active");
  document.getElementById("logo--green").classList.remove("hidden");
  document.getElementById("logo--navy").classList.remove("active");
  lineSetup();
  lineEnd(attribute);
};

var addListener = function addListener(_ref) {
  var element = _ref.element,
    method = _ref.method,
    target = _ref.target,
    enter = _ref.enter;

  return enter
    ? element.addEventListener("mouseenter", function() {
        method(target);
      })
    : element.addEventListener("mouseleave", function() {
        method(target);
      });
};

var lineSetup = function lineSetup() {
  TweenMax.to(horizontalLine, 0.3, {
    width: "6.875rem"
  });
};

var lineHide = function lineHide() {
  TweenMax.to(horizontalLine, 0.3, {
    width: "0rem"
  });
};

var reset = function reset(attribute) {
  TweenMax.set(line1, {
    height: "0px",
    top: "0px"
  });
};

var lineHover = function lineHover(attribute) {
  if (attribute === "brand") {
    TweenMax.to(line1, 0.3, {
      top: "0rem",
      height: "6.875rem"
    });
  } else if (attribute === "campaign") {
    TweenMax.to(line1, 0.3, {
      top: "6.875rem",
      height: "6.875rem"
    });
  } else if (attribute === "change") {
    TweenMax.to(line1, 0.3, {
      top: "13.75rem",
      height: "6.875rem"
    });
  }
};

var lineEnd = function lineEnd(attribute) {
  if (attribute === "brand") {
    TweenMax.to(line1, 0.3, {
      height: "0px",
      top: "6.875rem",
      onComplete: reset,
      onCompleteParams: [attribute]
    });
  } else if (attribute === "campaign") {
    TweenMax.to(line1, 0.3, {
      height: "0px",
      top: "13.75rem",
      onComplete: reset,
      onCompleteParams: [attribute]
    });
  } else if (attribute === "change") {
    TweenMax.to(line1, 0.3, {
      height: "0px",
      top: "20.625rem",
      onComplete: reset,
      onCompleteParams: [attribute]
    });
  }
};

var Run = function Run() {
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
};

Run();
