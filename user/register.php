<?php
require "include/dbconn.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="style/home_style.css">
    <link rel="stylesheet" href="style/nav_style.css">
    <link rel="stylesheet" href="style/register_style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body onload="dobvalid();">
    <?php include "include/nav.inc.php"; ?>

    <div class="register_container">
        <?php include "include/register.inc.php"; ?>
    </div>
    <script src="./script/validation.js"></script>
</body>
</html>