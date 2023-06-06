<?php
session_start();
if(isset($_SESSION['email'])){
    header('location:../district_page.php');
}
else if(isset($_POST['email'])&& isset($_POST['pass'])){
    $email=$_POST['email'];
    $pass = $_POST['pass'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    require "dbconn.inc.php";
    $str = "select * from tbl_user where u_email='$email' ";
    $result = $con->query($str);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc){
            if($pass!=$row['u_pass']){
                $_SESSION["login_err"] = "Please Enter Your Correct  Password";
            }else{
                $_SESSION['email'] = $_POST['email'];
                header('location../district_page.php');
            }
        }
    }else{
        $_SESSION['login_err'] = "Email is not registered";
        header('location:../register.php');
    }
}

?>