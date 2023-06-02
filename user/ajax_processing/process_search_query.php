<?php

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

    $query = $_POST["query"];
    $destination = $_POST["destination"];
    $district = $_POST["district"];
    $type = $_POST["type"];

    // echo $destination;

    // require "./include/db_files/dbconn.inc.php";
    $con = new mysqli("localhost", "root", "", "db_tis"); //creating connection

    //checking connection
    if ($con->connect_error) {
        die("Connection failed :" . $con->connect_error);
    }

    $data = array();

    $condition = preg_replace("/[^A-Za-z\s]/", "", $_POST["query"]);


    // if($destination != "")
    // {
    //     $query = "select ".$first_char."_name,".$first_char."_image,".$first_char."_address,".$first_char."_district,".$first_char."_type, from tbl_".$destination." where ".$first_char."_name LIKE '%" . $condition . "%' order by ".$first_char."_id desc Limit 5 ";
    // }

    $first_char = $destination[0];
    // echo $first_char;
    $query = "select " . $first_char . "_id" .",". $first_char . "_name" . /**/"," . $first_char . "_address," . $first_char . "_district," . $first_char . "_type" . /**/" from tbl_" . $destination . " where " . $first_char . "_name LIKE '%" . $condition . "%' order by " . $first_char . "_id desc Limit 5 ";

    // echo  $query;
    $result = $con->query($query);

    // echo $result;
    while ($result_row = $result->fetch_assoc()) {

        // echo $result_row;
        $replace_string = '<b>' . $condition . '</b>';

        foreach ($result as $row) {
            $data[] = array(
                $first_char . "_name" => str_ireplace($condition, $replace_string, $result_row[$first_char . "_name"]),
                // $first_char . "_image" => $result_row[$first_char . "_image"],
                $first_char . "_address" => $result_row[$first_char . "_address"],
                $first_char . "_district" => $result_row[$first_char . "_district"],
                $first_char . "_type" => $result_row[$first_char . "_type"]
            );
        }

    }


    echo json_encode($data);
}

?>