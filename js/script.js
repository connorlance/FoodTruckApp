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
  var daySalesItemForms = document.getElementById("daySalesItemForms");

  // Check if manageInventoryOptions exists before accessing it
  if (manageInventoryOptions) {
    // Check if the content should be visible or hidden based on the stored state
    if (isContentVisible === "true") {
      manageInventoryOptions.style.display = "block";
      toggleButton.textContent = "Minimize";
      toggleButton.classList.add("active");
      daySalesItemForms.style.marginTop = "20em"; // Adjust marginTop
    } else {
      manageInventoryOptions.style.display = "none";
      toggleButton.textContent = "Item and Location Options";
      toggleButton.classList.remove("active");
      daySalesItemForms.style.marginTop = "5em"; // Adjust marginTop
    }
  }
});

function toggleManageInventoryOptions() {
  var manageInventoryOptions = document.getElementById(
    "manageInventoryOptions"
  );
  var toggleButton = document.getElementById("toggleButton");
  var daySalesItemForms = document.getElementById("daySalesItemForms");

  // Check if the content is currently visible
  var isVisible =
    manageInventoryOptions.style.display === "block" ||
    manageInventoryOptions.classList.contains("active");

  if (!isVisible) {
    // If it's not visible, show it
    manageInventoryOptions.style.display = "block";
    toggleButton.textContent = "Minimize";
    toggleButton.classList.add("active");
    daySalesItemForms.style.marginTop = "20em"; // Adjust marginTop
    // Store the state in session storage
    sessionStorage.setItem("isContentVisible", "true");
  } else {
    // If it's visible, hide it
    manageInventoryOptions.style.display = "none";
    toggleButton.textContent = "Item and Location Options";
    toggleButton.classList.remove("active");
    daySalesItemForms.style.marginTop = "5em"; // Adjust marginTop

    // Update the state in session storage
    sessionStorage.setItem("isContentVisible", "false");
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var buttonDivs = document.querySelectorAll(".button_div");

  // Attach a click event listener to each button_div container
  buttonDivs.forEach(function (buttonDiv) {
    buttonDiv.addEventListener("click", function (event) {
      console.log("Clicked on button!");
      // Check if the clicked element is a button with the class 'orderButton'
      if (event.target.classList.contains("orderButton")) {
        toggleOrderButtons(event);
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var buttonDivs = document.querySelectorAll(".button_div");

  // Attach a click event listener to each button_div container
  buttonDivs.forEach(function (buttonDiv) {
    buttonDiv.addEventListener("click", function (event) {
      console.log("Clicked on button!");
      // Check if the clicked element is a button with the class 'orderButton'
      if (event.target.classList.contains("orderButton")) {
        toggleOrderButtons(event);
      }
    });
  });
});

function toggleOrderButtons(event) {
  console.log("Toggling buttons...");

  // Get the clicked button
  var clickedButton = event.target;

  // Extract the button ID
  var buttonId = clickedButton.id;

  // Extract the button number (1 or 2)
  var buttonNumber = buttonId.split("_")[1];

  // Construct the IDs of the buttons to toggle
  var orderButton1 = document.getElementById("orderButton1_" + buttonNumber);
  var orderButton2 = document.getElementById("orderButton2_" + buttonNumber);

  // Toggle visibility based on the clicked button
  if (clickedButton === orderButton1) {
    console.log("Button 1 clicked!");
    orderButton1.style.display = "none";
    orderButton2.style.display = "block";
  } else if (clickedButton === orderButton2) {
    console.log("Button 2 clicked!");
    orderButton1.style.display = "block";
    orderButton2.style.display = "none";
  }

  // Store the visibility of buttons in local storage
  localStorage.setItem(
    "orderButton1_" + buttonNumber,
    orderButton1.style.display
  );
  localStorage.setItem(
    "orderButton2_" + buttonNumber,
    orderButton2.style.display
  );
}

// Restore the visibility of buttons from local storage on page load
window.onload = function () {
  var buttonDivs = document.querySelectorAll(".button_div");

  buttonDivs.forEach(function (buttonDiv) {
    var buttonNumber = buttonDiv.querySelector("button").id.split("_")[1];
    var orderButton1 = document.getElementById("orderButton1_" + buttonNumber);
    var orderButton2 = document.getElementById("orderButton2_" + buttonNumber);
    var display1 = localStorage.getItem("orderButton1_" + buttonNumber);
    var display2 = localStorage.getItem("orderButton2_" + buttonNumber);

    if (display1 !== null) {
      orderButton1.style.display = display1;
    }

    if (display2 !== null) {
      orderButton2.style.display = display2;
    }
  });
};
