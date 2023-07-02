<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Traverse Nepal</title>
    <link rel="icon" href="image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="user/style/header_style.css">
    <link rel="stylesheet" href="user/style/search.css">
    <link rel="stylesheet" href="user/style/footer_style.css">
    <link rel="stylesheet" href="user/style/feed_container_style.css">
    <link rel="stylesheet" href="user/style/reload_animation_style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>


<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="user/img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->

    <header id="search-page-header">
        <?php include "user/include/header.inc.php"; ?>
    </header>
    <main>
        <div class="profile-details-container">
            <div></div>
            <div></div>
        </div>
    </main>

    <footer>

    </footer>


    <script src="user/script/reload_animation.js"></script>
</body>
</html>