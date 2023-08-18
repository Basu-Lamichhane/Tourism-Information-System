<?php
session_start();
if (!isset($_SESSION['uname'])) {
    $_SESSION['admin_login'] = "Please login first";
    header('Location:login.php');
}
require "dbconn.inc.php";
if (isset($_GET['type']) && isset($_GET['id'])) { 
    $destination = $_GET['type'];
    $id = $_GET['id'];
    $tbl = substr($destination, 0, 1);
    if ($destination == "place" || $destination == "accommodation" || $destination == "restaurant" || $destination == "cafe") {

        $qry = "Delete from tbl_" . $destination . " WHERE " . $tbl . "_id=$id";

        $result = $con->query($qry);
        if ($result == TRUE) {
            $_SESSION['action_msg'] = "The Destination is deleted successfully!!!";
            header("Location:../admin.php");
        } else {
            $_SESSION['action_msg'] = "Database Error";
            header("Location:../admin.php");
        }
    }
} elseif (isset($_GET['type']) && $_GET['type'] == "district" && isset($_GET['name'])) {
    $district_name = $_GET['name'];
    $result1 = $con->query("DELETE FROM tbl_district WHERE d_name='{$district_name}';");
    if ($result1) {
        $_SESSION['action_msg'] = "The data of . $district_name . is deleted successfully!";
        header("Location:../admin.php");
    } else {
        $_SESSION['action_msg'] = "The data of . $district_name . couldnot be deleted!";
        header("Location:../admin.php");
    }
} else {
    $_SESSION['action_msg'] = "ERROR";
    header("Location:../admin.php");
}

?>