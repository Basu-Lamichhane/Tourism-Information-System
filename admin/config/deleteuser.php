<?php

session_start();
if (!isset($_SESSION['uname'])) {
    $_SESSION['admin_login'] = "Please login first";
    header('Location:login.php');
}
if(isset($_GET['uid'])){
    require "dbconn.inc.php";
    $uid=$_GET['uid'];

    $user_exec=$con->query("DELETE FROM tbl_user WHERE u_id=".$uid.";");

    if($user_exec){
        $msg="User deleted successfully!!!";
        $_SESSION['action']=$msg;
        header('Location:../admin.php?type=user');
    }else{
        $msg="Couldn't delete user!!!";
        $_SESSION['action']=$msg;
        header('Location:../admin.php?type=user'); 
    }
    
}else{
    header('Location:../admin.php');
}
?>