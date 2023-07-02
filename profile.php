<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Traverse Nepal</title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/nav_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <link rel="stylesheet" href="style/feed_container_style.css">
    <link rel="stylesheet" href="style/reload_animation_style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>


<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="./img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->

    <header id="search-page-header">
        <?php include "include/header.inc.php"; ?>
    </header>
    <main>
        <div class="profile-details-container">
            <div></div>
            <div></div>
        </div>
    </main>

    <footer>

    </footer>


    <script src="./script/reload_animation.js"></script>
</body>
</html>