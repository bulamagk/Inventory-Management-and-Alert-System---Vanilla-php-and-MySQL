const price = document.querySelector("input[name = price]");
const quantity = document.querySelector("input[name = quantity]");
const total = document.querySelector("input[name = total]");

price.addEventListener("keyup", () => {
  total.value = quantity.value * price.value;
});
