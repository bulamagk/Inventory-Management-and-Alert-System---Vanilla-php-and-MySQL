const productList = document.querySelector("select");
const productPrice = document.querySelector("input[name = price]");
const productAvailable = document.querySelector("input[name = quantity]");
const productQuantity = document.querySelector("input[name = quantity_sale]");
const amount = document.querySelector("input[name = amount]");
const notice = document.querySelector("div [id=notice]");
const addBtn = document.querySelector("#add");

productList.addEventListener("change", () => {
  let product = productList.value;
  if (product !== "--Select Product--") getProductDetails(product);
});

productQuantity.addEventListener("focus", () => {
  if (productPrice.value == "") {
    productList.focus();
    return;
  }
});

productQuantity.addEventListener("keyup", () => {
  validateQuantity(productAvailable.value, productQuantity.value);
});

// GET PRODUCT DATA FUNCTION
function getProductDetails(product) {
  xhttp = new XMLHttpRequest();
  xhttp.open("get", "ajaxProduct.php?name=" + product);
  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      let productData = JSON.parse(xhttp.responseText);
      productAvailable.value = productData.quantity;
      productPrice.value = productData.price;
    }
  };

  xhttp.send();
}

// VALIDATE QUANTITY TO SALE FUNCTION
function validateQuantity(productAvailable, productSale) {
  if (Number(productAvailable) < Number(productSale)) {
    notice.innerHTML = `
        <div class="alert">
        <p>Not enough Product in Stock  for this sale </p>
        </div>`;
    productQuantity.focus();
    addBtn.disabled = true;
    amount.value = 0;
  } else {
    addBtn.disabled = false;
    notice.innerHTML = "";
    amount.value = calculateAmount();
  }
}

// CALCULATE AMOUNT
function calculateAmount() {
  let amount = Number(productPrice.value) * Number(productQuantity.value);

  return amount;
}
