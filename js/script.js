//go to page for buttons
function goToPage(url) {
  window.location.href = url;
}

// + button for items with quantity more than 5
function incrementMoreThanFive(itemId) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);
  var maxQty = parseInt(document.getElementById("max_qty" + itemId).value, 10);

  if (!isNaN(value) && value < maxQty) {
    input.value = value + 1;
  }
}

// - button for items with quantity more than 5
function decrementMoreThanFive(itemId) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);
  if (value - 1 >= 0) {
    input.value = isNaN(value) ? "0" : Math.max(0, value - 1);
  }
}

// + button for items with quantity less than 5
function incrementLessThanFive(itemId, qty) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);

  if (value + 1 <= qty) {
    input.value = isNaN(value)
      ? "1 (Only " + qty + " left)"
      : value + 1 + " (Only " + qty + " left)";
  }
}

// - button for items with quantity less than 5
function decrementLessThanFive(itemId, qty) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);
  if (value - 1 >= 0) {
    input.value = isNaN(value)
      ? "0 (Only " + qty + " left)"
      : Math.max(0, value - 1) + " (Only " + qty + " left)";
  }
}

// Increment button
function increment(itemId) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);

  if (!isNaN(value)) {
    if (value + 1 > 5) {
      input.style.color = "green"; // Change text color to green
    }

    input.value = value + 1;
  }
}

// Decrement button
function decrement(itemId) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);

  if (!isNaN(value)) {
    if (value <= 5) {
      input.style.color = "red"; // Change text color back to red
    }

    input.value = Math.max(0, value - 1);
  }
}
