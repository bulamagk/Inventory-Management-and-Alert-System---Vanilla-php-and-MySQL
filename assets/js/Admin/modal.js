let showModalBtn = document.querySelector("#show-modal");
let modal = document.querySelector(".modal");
let closeModal = document.querySelector("#close");

// Show Modal
showModalBtn.addEventListener("click", () => toggleModal());

// Close Modal
closeModal.addEventListener("click", () => toggleModal());

// Show Modal Function
let toggleModal = () => {
  modal.classList.toggle("show-modal");
};
