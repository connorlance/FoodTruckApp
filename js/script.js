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
    input.value = value + 1;

    // Change text color to green if value is greater than 5
    if (input.value > 5) {
      input.style.color = "green";
    } else {
      // Otherwise, change text color to red
      input.style.color = "red";
    }
  }
}

// Decrement button
function decrement(itemId) {
  var input = document.getElementById("qty" + itemId);
  var value = parseInt(input.value, 10);

  if (!isNaN(value)) {
    input.value = Math.max(0, value - 1);

    // Change text color to red if value is 5 or below
    if (input.value <= 5) {
      input.style.color = "red";
    }
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Retrieve the state from session storage
  var isContentVisible = sessionStorage.getItem("isContentVisible");
  var manageInventoryOptions = document.getElementById(
    "manageInventoryOptions"
  );
  var toggleButton = document.getElementById("toggleButton");

  // Check if the content should be visible or hidden based on the stored state
  if (isContentVisible === "true") {
    manageInventoryOptions.style.display = "block";
    toggleButton.textContent = "Minimize";
    toggleButton.classList.add("active");
  } else {
    manageInventoryOptions.style.display = "none";
    toggleButton.textContent = "Item and Location Options";
    toggleButton.classList.remove("active");
  }
});

function toggleManageInventoryOptions() {
  var manageInventoryOptions = document.getElementById(
    "manageInventoryOptions"
  );
  var toggleButton = document.getElementById("toggleButton");

  // Check if the content is currently visible
  var isVisible =
    manageInventoryOptions.style.display === "block" ||
    manageInventoryOptions.classList.contains("active");

  if (!isVisible) {
    // If it's not visible, show it
    manageInventoryOptions.style.display = "block";
    toggleButton.textContent = "Minimize";
    toggleButton.classList.add("active");
    // Store the state in session storage
    sessionStorage.setItem("isContentVisible", "true");
  } else {
    // If it's visible, hide it
    manageInventoryOptions.style.display = "none";
    toggleButton.textContent = "Item and Location Options";
    toggleButton.classList.remove("active");
    // Update the state in session storage
    sessionStorage.setItem("isContentVisible", "false");
  }
}
