

const navBar = document.querySelector("nav"),
  menuIcon = document.querySelectorAll(".cross_icon"),
  menuBtns = document.querySelectorAll(".sidebar_icon");

menuBtns.forEach((menuBtn) => {
  menuBtn.addEventListener("click", () => {
    navBar.classList.toggle("open");
  });
});

menuIcon.forEach((menuIcon) => {
  menuIcon.addEventListener("click", () => {
    navBar.classList.toggle("open");
  });
});

document.onclick = function (e) {
  if (!menuBtns.contains(e.target) && !menuIcon.contains(e.target)) {
    navBar.classList.remove("open");
  }
};





