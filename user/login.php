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
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/login_style.css">
    <link rel="stylesheet" href="style/noti.css">
</head>
<body>
    <header>
        <?php include "include/header.inc.php"; ?>
    </header>
    <?php
        if (isset($_SESSION['!login_pass_match']))
            {
                echo "<div id='noti'>" . $_SESSION['!login_pass_match'] . "</div>";
                unset($_SESSION['!login_pass_match']);
            }
            elseif(isset($_SESSION['Signed'])){
                echo "<div id='noti'>" . $_SESSION['Signed'] . "</div>";
                unset($_SESSION['Signed']);
            }
            elseif(isset($_SESSION['not_signed'])){
                echo "<div id='noti'>" . $_SESSION['not_signed'] . "</div>";
                unset($_SESSION['not_signed']);
            }

        ?>

    <div class="login_container">
        <?php include "include/login.inc.php"; ?>
    </div>
    <script src="./script/noti.js"></script>
    <script src="./script/login.js"></script>
    <script src="./script/validation.js"></script>

</body>
</html>