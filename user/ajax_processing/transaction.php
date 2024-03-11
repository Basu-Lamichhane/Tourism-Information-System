<?php

session_start();
require "../include/dbconn.inc.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $uid = $_SESSION['uid'];
    $transid = $_POST['transaction_uuid'];
    $total_amt = $_POST['total_amount'];
    echo $uid . $transid . $total_amt;

    $insert_trans_query = "INSERT INTO `tbl_transaction`(`trans_id`, `t_amount`, `u_id`) VALUES ('" . $transid . "','" . $total_amt . "','" . $uid . "')";

    if ($con->query($insert_trans_query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_trans_query . "<br>" . $con->error;
    }
}
