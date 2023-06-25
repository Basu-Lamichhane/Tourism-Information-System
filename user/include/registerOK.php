<?php
session_start();
require "dbconn.inc.php";
if(isset($_SESSION['email'])){
    header('location:../search.php');
}
else if(isset($_POST['email'])&& isset($_POST['pass'])){
    $name = $_POST['name'];
    $email=$_POST['email'];
    $pass = $_POST['pass'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $dob = $_POST['reg_date'];

    if (isEmailRegistered($con, $email)) {
        $_SESSION['used_email']="Email is already Registered";
        header('location:../register.php');
        exit;
    }
    $str = "insert into tbl_user(u_name,u_email,u_pass,u_city,u_district,u_gender,u_dob) values('$name','$email','$pass','$city','$district','$gender','$dob')";
    if($con->query($str)==TRUE){
                $_SESSION['email'] = $email;
                header('location:../search.php');
            }
}

function isEmailRegistered($conn, $email) {
    require "dbconn.inc.php";
    $sql = "SELECT u_email FROM tbl_user WHERE u_email = '$email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}