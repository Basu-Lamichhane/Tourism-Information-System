<?php
session_start();
if(isset($_SESSION)){
    
    header("Location:../admin_dashboard.php");
}
else{
    $err="003";
    header("Location:../login.php?err=".$err);
    
}
 ?>