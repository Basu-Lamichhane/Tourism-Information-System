<?php

if (isset($_POST["query"])) {

    // require "./include/db_files/dbconn.inc.php";
    $con = new mysqli("localhost", "root", "", "db_tis"); //creating connection

    //checking connection
    if ($con->connect_error) {
        die("Connection failed :" . $con->connect_error);
    }

    $data = array();

    $condition = preg_replace("/[^A-Za-z\s]/", "", $_POST["query"]);

    $query = "select p_name from tbl_place where p_name LIKE '%" . $condition . "%' order by p_id desc Limit 5 ";

    $result = $con->query($query);

    $replace_string = '<b>' . $condition . '</b>';

    foreach ($result as $row) {
        $data[] = array(
            'p_name' => str_ireplace($condition, $replace_string, $row["p_name"])
        );
    }

    

    echo json_encode($data);
}

?>