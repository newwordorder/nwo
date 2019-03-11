const container = document.getElementById("container");
const logo = document.getElementById("logo");
const brandTrigger = document.getElementById("brand");
const campaignTrigger = document.getElementById("campaign");
const changeTrigger = document.getElementById("change");

const hoverState = attribute => {
  container.classList.add(`${attribute}--active`);
  document.getElementById(`${attribute}--text`).classList.add("active");
  document.getElementById("logo--green").classList.add("hidden");
  document.getElementById("logo--navy").classList.add("active");
};

const endHover = attribute => {
  container.classList.remove(`${attribute}--active`);
  document.getElementById(`${attribute}--text`).classList.remove("active");
  document.getElementById("logo--green").classList.remove("hidden");
  document.getElementById("logo--navy").classList.remove("active");
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
};

Run();
