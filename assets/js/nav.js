const menuBars = document.getElementById("Bars");
const menu = document.getElementById("header");
let icon = document.getElementById("icon");
let backdrop = document.getElementById("backdrop");

menuBars.addEventListener("click", () => {
  menu.classList.toggle("show-header");
  backdrop.classList.toggle("show-backdrop");
  if (icon.classList.contains("fa-bars")) {
    menuBars.innerHTML = `<i id="icon" class="fas fa-times"></i>`;
    icon = document.getElementById("icon");
  } else {
    menuBars.innerHTML = `<i id="icon" class="fas fa-bars"></i>`;
    icon = document.getElementById("icon");
  }
});
