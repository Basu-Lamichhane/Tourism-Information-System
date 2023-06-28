<?php
session_start();
if(isset($_SESSION['email'])){
    header('location:search.php');
}
require "include/dbconn.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="style/home_style.css">
    <link rel="stylesheet" href="style/nav_style.css">
    <link rel="stylesheet" href="style/register_style.css">
    <link rel="stylesheet" href="style/noti.css">
    
    <script src="script/jquery.js"></script>
</head>
<body>

    <?php include "include/nav.inc.php"; ?>
        <?php
        if (isset($_SESSION['login_err']))
            {
                echo "<div id='noti'>" . $_SESSION['login_err'] . "</div>";
                unset($_SESSION['login_err']);
            }
            else if(isset($_SESSION['used_email']))
            {
                echo "<div id='noti'>" . $_SESSION['used_email'] . "</div>";
                unset($_SESSION['used_email']);
            }

        ?>

    <div class="register_container">
        <?php include "include/register.inc.php"; ?>
    </div>
    <script src="./script/validation.js"></script>
    <script src="./script/noti.js"></script>
</body>
</html>