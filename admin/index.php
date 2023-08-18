<?php
session_start();
if (!isset($_SESSION['uname'])) {
    $_SESSION['admin_login'] = "Please login first";
    header('Location:login.php');
}else{
    $_SESSION['action_msg']="Welcome, Admin!!!";
    header('Location:admin.php');
}

?>
