let bars = document.getElementById("bars");
let aside = document.querySelector("aside");
let content = document.querySelector(".content");

bars.addEventListener("click", () => toggleNav());

let toggleNav = () => {
  aside.classList.toggle("togglenav");
  content.classList.toggle("togglecontent");
};
