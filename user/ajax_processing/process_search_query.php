<?php

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

    $query = $_POST["query"];
    $destination = $_POST["destination"];
    $district = $_POST["district"];
    $type = $_POST["type"];

    // echo $type;
    // echo $destination;
    // echo $district;

    // require "./include/db_files/dbconn.inc.php";
    $con = new mysqli("localhost", "root", "", "db_tis"); //creating connection

    //checking connection
    if ($con->connect_error) {
        die("Connection failed :" . $con->connect_error);
    }

    $data = array();

    $condition = preg_replace("/[^A-Za-z\s]/", "", $_POST["query"]);


    $first_char = $destination[0];

    $query = "select " . $first_char . "_id" . "," . $first_char . "_name" . /**/"," . $first_char . "_address," . $first_char . "_district," . $first_char . "_type" . /**/" from tbl_" . $destination . " where " . $first_char . "_name LIKE '%" . $condition . "%' order by " . $first_char . "_id desc Limit 5 ";

    if ($district != "") {
        $query = "select " . $first_char . "_id" . "," . $first_char . "_name," . $first_char . "_address," . $first_char . "_district," . $first_char . "_type from tbl_" . $destination . " where " . $first_char . "_name LIKE '%" . $condition . "%' and " . $first_char . "_district ='" . $district . "' order by " . $first_char . "_id desc Limit 5 ";
    }

    if ($type != "") {
        $query = "select " . $first_char . "_id" . "," . $first_char . "_name," . $first_char . "_address," . $first_char . "_district," . $first_char . "_type from tbl_" . $destination . " where " . $first_char . "_name LIKE '%" . $condition . "%' and " . $first_char . "_type ='" . $type . "' order by " . $first_char . "_id desc Limit 5 ";
    }

    if ($district != "" && $type != "") {
        $query = "select " . $first_char . "_id" . "," . $first_char . "_name," . $first_char . "_address," . $first_char . "_district," . $first_char . "_type from tbl_" . $destination . " where " . $first_char . "_name LIKE '%" . $condition . "%' and " . $first_char . "_district ='" . $district . "' and " . $first_char . "_type ='" . $type . "' order by " . $first_char . "_id desc Limit 5 ";
    }
    // echo $first_char;

    // echo  $query;
    $result = $con->query($query);

    $count = 0;
    // echo $result;
    while ($result_row = $result->fetch_assoc()) {

        // echo $result_row;
        $replace_string = '<b>' . $condition . '</b>';

        $data[$count] = array(
            $first_char . "_name" => str_ireplace($condition, $replace_string, $result_row[$first_char . "_name"]),
            // $first_char . "_image" => $result_row[$first_char . "_image"],
            $first_char . "_address" => $result_row[$first_char . "_address"],
            $first_char . "_district" => $result_row[$first_char . "_district"],
            $first_char . "_type" => $result_row[$first_char . "_type"]
        );
        $count++;

    }
    echo json_encode($data);
}

?>