<?php
session_start();

require "include/dbconn.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | Traverse Nepal</title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/home_style.css">
    <link rel="stylesheet" href="style/reload_animation_style.css">
    <link rel="stylesheet" href="style/register_style.css">
    <link rel="stylesheet" href="style/noti.css">

    <script src="script/jquery.js"></script>
</head>

<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="./img/TN-reload-page-animation.gif" alt="Loading...">
    </div>

    <?php include "include/header.inc.php"; ?>
    <?php
    if (isset($_SESSION['login_err'])) {
        echo "<div id='noti'>" . $_SESSION['login_err'] . "</div>";
        unset($_SESSION['login_err']);
    } else if (isset($_SESSION['used_email'])) {
        echo "<div id='noti'>" . $_SESSION['used_email'] . "</div>";
        unset($_SESSION['used_email']);
    }

    ?>

    <div class="register_container">
        <?php include "include/register.inc.php"; ?>
    </div>
    <script src="./script/validation.js"></script>
    <script src="./script/noti.js"></script>
    <script src="./script/register.js"></script>
    <script src="./script/reload_animation.js"></script>
</body>

</html>