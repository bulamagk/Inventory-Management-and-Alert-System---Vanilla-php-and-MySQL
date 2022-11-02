const notification = document.querySelector("#notification");
const passwordInput = document.querySelector("#password");
const confirmPasswordInput = document.querySelector("#confirmpassword");
const emailInput = document.querySelector("#email");
const submitBtn = document.querySelector("#submit");
const staffForm = document.forms["addStaff"];

// Handle Passwords Matching
staffForm.addEventListener("submit", (e) => {
  if (passwordInput.value !== confirmPasswordInput.value) {
    e.preventDefault();
    notification.innerHTML = `<div class="alert">
                                <p>Passwords Does Not Match !!!</p>
                             </div>`;
    return false;
  }
});

// Email
// Handle Email
emailInput.addEventListener("blur", (e) => {
  let email = e.target.value;
  ajaxCall(email);
});

// Ajax CALL
const ajaxCall = (input) => {
  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      let ajaxResponse = xhttp.responseText;
      if (ajaxResponse === "Email Exist") {
        submitBtn.disabled = true;
        notification.innerHTML = `<div class="alert">
        <p>Email Already Exist !!!</p>
        </div>`;
      } else {
        notification.innerHTML = `<div ></div>`;
        submitBtn.disabled = false;
      }
    }
  };

  xhttp.open("get", "admin/email_ajax.php?email=" + input);
  xhttp.send();
};
