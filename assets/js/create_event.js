const hall = document.querySelector("#hall");
const state = document.querySelector("#state");
const notification = document.querySelector("#notification");
const startDate = document.querySelector("#startDate");
const showModal = document.querySelector("#show-modal");
const modalDiaglog = document.querySelector(".modal-dialog");
const modalBody = document.querySelector(".modal-body");
const createBtn = document.querySelector("#createBtn");
const submitBtn = document.querySelector("#submitBtn");
const spinner = document.querySelector("#spinner");

state.addEventListener("change", (e) => {
  let optionIndex = e.target.options.selectedIndex;
  let searchText = e.target.options[optionIndex].outerText;

  if (searchText == "--Select State--") {
    hall.innerHTML = `<option>Select State First</option>`;
    return;
  }

  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if (xhttp.responseText !== "") {
        hall.innerHTML = xhttp.responseText;
      }
    }
  };

  xhttp.open("get", "create_event_ajax.php?searchText=" + searchText);
  xhttp.send();
});

// Get Hall
function getHall() {
  return hall.value;
}

// Validate Start Date
startDate.addEventListener("blur", (e) => {
  let selectedDate = e.target.value;
  let selectedHall = getHall();

  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if (xhttp.responseText == 1) {
        notification.innerHTML = `<div class="alert">
        <p>Hall Not Available, Please Select Another Hall or Date !!!</p>
        </div>`;
        showModal.disabled = true;
      } else {
        notification.innerHTML = null;
        showModal.disabled = false;
      }
    }
  };

  xhttp.open(
    "get",
    "create_event_ajax.php?selectedDate=" +
      selectedDate +
      "&hall=" +
      selectedHall
  );
  xhttp.send();
});

// Prevent Form Submission
showModal.addEventListener("click", (e) => {
  e.preventDefault();
});

// Set Focus on Payment Div
setInterval(() => {
  if (modalDiaglog) {
    modalDiaglog.scrollIntoView(false);
  }
}, 100);

// Show Spinner
createBtn.addEventListener("click", (e) => {
  e.preventDefault();
  spinner.style.display = "block";

  setTimeout(() => {
    spinner.style.display = "none";
    modalBody.innerHTML = `
                     <div class="form-group">
                        <label for="">Enter OTP</label>
                        <input type="text">
                    </div>

                    <button id = '' type = "Submit" name = "create-event" class = "btn d-block">Pay Now</button>
    `;
  }, 1500);
});
