<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <?php include "include/header.inc.php" ?>
    <div class="dash_section">
        <div id="search">
        <input type="text" name="search" id="search_field" onkeyup="fnSearch();" placeholder="Enter a place to search">
    </div>
    <div class="dash_main">
        <div class="place_card" id="card1"></div>
        <div class="place_card" id="card2"></div>
        <div class="place_card" id="card3"></div>
        <div class="place_card" id="card4"></div>
        <div class="place_card" id="card5"></div>
        <div class="place_card" id="card6"></div>
    </div>
    <div class="next_page" id="next">
        <div class="page" id="page1">1</div>
    </div>
    </div>
</body>
</html>
