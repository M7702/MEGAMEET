

const tabsBox = document.querySelector(".tabs-box"),
  allTabs = tabsBox.querySelectorAll(".tab"),
  arrowIcons = document.querySelectorAll(".icon1 i");



const handleIcons = (scrollVal) => {
  let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
  arrowIcons[0].parentElement.style.display =
    scrollVal <= 0 ? "none" : "flex";
  arrowIcons[1].parentElement.style.display =
    maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
};

arrowIcons.forEach((icon1) => {
  icon1.addEventListener("click", () => {
    // if clicked icon is left, reduce 350 from tabsBox scrollLeft else add
    let scrollWidth = (tabsBox.scrollLeft +=
      icon1.id === "left" ? -340 : 340);
    handleIcons(scrollWidth);
  });
});

allTabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    tabsBox.querySelector(".active").classList.remove("active");
    tab.classList.add("active");
  });
});

const dragging1 = (e) => {
  if (!isDragging) return;
  tabsBox.classList.add("dragging");
  tabsBox.scrollLeft -= e.movementX;
  handleIcons(tabsBox.scrollLeft);
};

const dragStop1 = () => {
  isDragging = false;
  tabsBox.classList.remove("dragging");
};

tabsBox.addEventListener("mousedown", () => (isDragging = true));
tabsBox.addEventListener("mousemove", dragging1);
document.addEventListener("mouseup", dragStop1);

