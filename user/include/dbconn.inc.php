<?php
$conn=new mysqli("localhost","root","","db_tis");//creating connection

//checking connection
if($conn->connect_error){
    die("Connection failed :".$conn->connect_error);
}
?>