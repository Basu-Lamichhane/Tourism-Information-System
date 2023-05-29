<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <?php include "include/header.inc.php" ?>
    <div class="dash_section">
        <div class="search_div">
        <input type="text" name="search" class="search" id="toSearch"  placeholder="Enter a place to search">
        <i class="ri-search-line" onclick="fnSearch();"></i>
    </div>
    <div class="dash_main">
        <!-- <div class="place_card" id="card1"></div>
        <div class="place_card" id="card2"></div>
        <div class="place_card" id="card3"></div>
        <div class="place_card" id="card4"></div>
        <div class="place_card" id="card5"></div>
        <div class="place_card" id="card6"></div> -->
    </div>
    <div class="next_page" id="next">
        <div class="page" id="page1">1</div>
    </div>
    </div>


    <script src="script/jquery.js"></script>
    <script src="script/searchPlaces.js"></script>
</body>
</html>
