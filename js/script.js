  function goToPage(url) {
    window.location.href = url;
}

function increment(itemId) {
  var input = document.getElementById('qty' + itemId);
  var value = parseInt(input.value, 10);
  input.value = isNaN(value) ? 1 : value + 1;
}

function decrement(itemId) {
  var input = document.getElementById('qty' + itemId);
  var value = parseInt(input.value, 10);
  input.value = isNaN(value) ? 0 : Math.max(0, value - 1);
}