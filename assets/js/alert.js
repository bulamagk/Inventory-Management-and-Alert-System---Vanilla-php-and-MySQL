let alertFail = document.querySelector(".alert");
let alertSuccess = document.querySelector(".alert-success");

setInterval(() => {
  if (alertFail) {
    alertFail.style.display = "none";
  }
  if (alertSuccess) {
    alertSuccess.style.display = "none";
  }
}, 2500);
