function getPlaces(txt) {
  var mainContent = document.getElementById("main_content");
  if (txt == "resturants") {
    mainContent.innerHTML = "<?php include 'include/getResturants.php'; ?> ";
  } else if (txt == "cafes") {
    mainContent.innerHTML = "include 'include/getCafes.php'";
  }
}
