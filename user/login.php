<?php
session_start();
if(isset($_SESSION['email'])){
    header('location:district_page.php');
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
    <link rel="stylesheet" href="style/login_style.css">
    <link rel="stylesheet" href="style/noti.css">
</head>
<body>
    <?php include "include/nav.inc.php"; ?>
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

        ?>

    <div class="login_container">
        <?php include "include/login.inc.php"; ?>
    </div>
    <script src="./script/noti.js"></script>

</body>
</html>