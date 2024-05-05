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
function toggleOrderButtons(oid) {
  try {
    var section1 = document.querySelector(".section1_" + oid);
    var section2 = document.querySelector(".section2_" + oid);

    // Check if either section1 or section2 is null
    if (!section1 || !section2) {
      throw new Error("One of the sections is null.");
    }

    // Toggle the visibility based on the current state
    if (section1.style.display === "none") {
      section1.style.display = "block";
      section2.style.display = "none";
      // Update state in localStorage
      updateLocalStorage(oid, "section1");
    } else {
      section1.style.display = "none";
      section2.style.display = "block";
      // Update state in localStorage
      updateLocalStorage(oid, "section2");
    }
  } catch (error) {
    console.error(error.message);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Retrieve the state from localStorage
  var visibleSections =
    JSON.parse(localStorage.getItem("visibleSections")) || {};

  // Loop through each order id to set the visibility state
  Object.keys(visibleSections).forEach(function (oid) {
    var section1 = document.querySelector(".section1_" + oid);
    var section2 = document.querySelector(".section2_" + oid);

    if (section1 && section2) {
      if (visibleSections[oid] === "section1") {
        section1.style.display = "block";
        section2.style.display = "none";
      } else {
        section1.style.display = "none";
        section2.style.display = "block";
      }
    } else {
      // If one of the sections is null, remove its entry from localStorage
      delete visibleSections[oid];
    }
  });

  // Update the localStorage with valid sections
  localStorage.setItem("visibleSections", JSON.stringify(visibleSections));
});

function updateLocalStorage(oid, section) {
  // Retrieve existing state from localStorage
  var visibleSections =
    JSON.parse(localStorage.getItem("visibleSections")) || {};
  // Update state with the new visibility
  visibleSections[oid] = section;
  // Store the updated state back in localStorage
  localStorage.setItem("visibleSections", JSON.stringify(visibleSections));
}
// Add event listeners to navigation buttons
document.addEventListener("DOMContentLoaded", function () {
  var navButtons = document.querySelectorAll(
    "#nav1 button, #nav2 button, #nav3 button, #nav4 button"
  );

  navButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      clearLocalStorage();
    });
  });
});

// Function to clear localStorage
function clearLocalStorage() {
  localStorage.removeItem("visibleSections");
}
