const hallsContainer = document.querySelector("#hallsContainer");
const searchHallInput = document.querySelector("#searchHallInput");

searchHallInput.addEventListener("keyup", (e) => {
  let searchText = e.target.value;

  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if (xhttp.responseText !== "") {
        hallsContainer.style.display = "grid";
        hallsContainer.innerHTML = xhttp.responseText;
      } else {
        hallsContainer.style.display = "block";
        hallsContainer.innerHTML = `
        <div class="w-50 alert">
        <p>Hall Not Found!!!</p>
        </div>
      `;
      }
    }
  };

  xhttp.open("get", "hall_ajax.php?searchText=" + searchText);
  xhttp.send();
});
