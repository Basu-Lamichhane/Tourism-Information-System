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

        ?>

    <div class="login_container">
        <?php include "include/login.inc.php"; ?>
    </div>
    <script src="./script/noti.js"></script>

</body>
</html>