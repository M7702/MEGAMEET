
const filBar = document.querySelector("aside"),
  filIcon = document.querySelectorAll(".filter_bar");

filIcon.forEach((menuIcon) => {
  filIcon.addEventListener("click", () => {
    filBar.classList.toggle("open");
  });
});

