const container = document.getElementById("container");
const logo = document.getElementById("logo");
const brandTrigger = document.getElementById("brand");
const campaignTrigger = document.getElementById("campaign");
const changeTrigger = document.getElementById("change");
const horizontalLine = document.getElementById("line--horizontal");
const line1 = document.getElementById("line--1");
const line2 = document.getElementById("line--2");
const line3 = document.getElementById("line--3");

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
    width: "6.875rem"
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

const lineEnd = attribute => {
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

const Run = () => {
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
