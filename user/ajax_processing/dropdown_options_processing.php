<?php

if (isset($_POST["select_option"])){
    district_dropdown_value();
}
if (isset($_POST["dest_option"])){
    type_dropdown_value($_POST["dest_option"]);
}

function district_dropdown_value(){

    // require "./include/db_files/dbconn.inc.php";
    $con = new mysqli("localhost", "root", "", "db_tis"); //creating connection
    
    //checking connection
    if ($con->connect_error) {
        die("Connection failed :" . $con->connect_error);
    }



    $data = array();
    
    $query_district = "select DISTINCT(p_district) from tbl_place";

    
    $result = $con->query($query_district);
    
    foreach ($result as $row) {
        $data[] = array(
            'p_district' => $row["p_district"]
        );
    }
    
    echo json_encode($data);
}

function type_dropdown_value($dest_option){

    // require "./include/db_files/dbconn.inc.php";
    $con = new mysqli("localhost", "root", "", "db_tis"); //creating connection
    
    //checking connection
    if ($con->connect_error) {
        die("Connection failed :" . $con->connect_error);
    }
    
    $fstchar=$dest_option[0];


    $data = array();
    
    $query_district = "select DISTINCT(".$fstchar."_type) from tbl_".$dest_option;



    
    $result = $con->query($query_district);
    
    foreach ($result as $row) {
        $data[] = array(
            'type' => $row[$fstchar."_type"]
        );
    }
    
    echo json_encode($data);
}


?>