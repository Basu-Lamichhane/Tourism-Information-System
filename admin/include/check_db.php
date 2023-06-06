<?php
session_start();
if(isset($_SESSION['admin_email'])){
    header('Location:admin_dashboard.php');
}
else if(isset($_POST['email'])&&isset($_POST['pass'])){
     $email=$_POST['email'];
    $pass = $_POST['pass'];
    require "dbconn.inc.php";
    $str = "select admin_uname from tbl_admin where admin_uname='$email' ";
    $result = $con->query($str);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            if($pass!=$row['admin_pass']){
                $_SESSION['!admin_pass_match'] = "Please Enter Your Correct  Password";
                header('location:../login.php');
            }else{
                $_SESSION['email'] = $_POST['email'];
                header('location:../admin_panel.php');
            }
        }
    }else{
        $_SESSION['login_err'] = "Admin Email is Incorrect";
        header('location:../login.php');
    }
    
}

 ?>