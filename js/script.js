function openTab(evt, tabName) {
    var i, x, tablinks;
    var x = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("ButtonClassBlue");
  }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " ButtonClassBlue";
  }

  function goToPage(url) {
    window.location.href = url;
}