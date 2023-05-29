function fnSearch() {
  var toSearch = document.getElementById("toSearch").value.trim();
  console.log(toSearch);

  $.ajax({
    type: "POST",
    url: "./include/db_files/findPlaces.php",
    data: { find: toSearch },
    success: function (response) {
      console.log(response);
    },
  });
}
