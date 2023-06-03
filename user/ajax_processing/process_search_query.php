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

    $condition = preg_replace("/[^0-9A-Za-z\s_*><&$#@()=-]/", "", $_POST["query"]);

    // echo $condition;

    if ($destination == "" && $district == "" && $type == "") {

        $query_data = "SELECT name, address, district, type
        FROM (
            SELECT p_id AS id,p_name AS name, p_address AS address, p_district AS district, p_type AS type
            FROM tbl_place
            UNION
            SELECT a_id AS id,a_name AS name, a_address AS address, a_district AS district, a_type AS type
            FROM tbl_accommodation
            UNION
            SELECT r_id AS id,r_name AS name, r_address AS address, r_district AS district, r_type AS type
            FROM tbl_restaurant
            UNION
            SELECT c_id AS id,c_name AS name, c_address AS address, c_district AS district, c_type AS type
            FROM tbl_cafe
        ) AS combined_table
        WHERE name LIKE '" . $condition . "%'
        ORDER BY name ASC;
        ";
            // echo $query_data;
        $result = $con->query($query_data);


        $count = 0;
        // echo $result;
        while ($result_row = $result->fetch_assoc()) {

            // echo $result_row['name'];
            $replace_string = '<b>' . $condition . '</b>';

            $data[$count] = array(
                "name" => str_ireplace($condition, $replace_string, $result_row["name"]),
                "address" => $result_row["address"],
                "district" => $result_row["district"],
                "type" => $result_row["type"]
            );
            $count++;

        }
        echo json_encode($data);
    }
    // if ($destination != "") {
    //     dest_search_results($destination,$district,$type,$con,$condition);
    // }
    else if ($district == "" && $type != "" && $destination != "") {
        $first_char = $destination[0];
        $query_data = "
            SELECT " . $first_char . "_id AS id," . $first_char . "_name AS name, " . $first_char . "_address AS address, " . $first_char . "_district AS district, " . $first_char . "_type AS type 
            FROM tbl_" . $destination . "  where " . $first_char . "_type = '" . $type . "' and " . $first_char . "_name LIKE '" . $condition . "%'ORDER BY name ASC;";

        $result = $con->query($query_data);


        $count = 0;
        // echo $result;
        while ($result_row = $result->fetch_assoc()) {

            // echo $result_row['name'];
            $replace_string = '<b>' . $condition . '</b>';

            $data[$count] = array(
                "name" => str_ireplace($condition, $replace_string, $result_row["name"]),
                "address" => $result_row["address"],
                "district" => $result_row["district"],
                "type" => $result_row["type"]
            );
            $count++;

        }
        echo json_encode($data);
    } else if ($district != "" && $type == "" && $destination == "") {
        // $first_char = $destination[0];
        $query_data = "SELECT name, address, district, type
        FROM (
            SELECT p_id AS id,p_name AS name, p_address AS address, p_district AS district, p_type AS type
            FROM tbl_place
            UNION
            SELECT a_id AS id,a_name AS name, a_address AS address, a_district AS district, a_type AS type
            FROM tbl_accommodation
            UNION
            SELECT r_id AS id,r_name AS name, r_address AS address, r_district AS district, r_type AS type
            FROM tbl_restaurant
            UNION
            SELECT c_id AS id,c_name AS name, c_address AS address, c_district AS district, c_type AS type
            FROM tbl_cafe
        ) AS combined_table
        WHERE name LIKE '" . $condition . "%' and district = '" . $district . "'
        ORDER BY name ASC;
        ";
        // echo $query_data;
        $result = $con->query($query_data);


        $count = 0;
        // echo $result;
        while ($result_row = $result->fetch_assoc()) {

            // echo $result_row['name'];
            $replace_string = '<b>' . $condition . '</b>';

            $data[$count] = array(
                "name" => str_ireplace($condition, $replace_string, $result_row["name"]),
                "address" => $result_row["address"],
                "district" => $result_row["district"],
                "type" => $result_row["type"]
            );
            $count++;

        }
        echo json_encode($data);
    } 
    
    
    
    else if ($district == "" && $destination != "" && $type == "") {
        $first_char = $destination[0];
        $query_data = "
            SELECT " . $first_char . "_id AS id," . $first_char . "_name AS name, " . $first_char . "_address AS address, " . $first_char . "_district AS district, " . $first_char . "_type AS type 
            FROM tbl_" . $destination . " where " . $first_char . "_name LIKE '" . $condition . "%'ORDER BY name ASC;";


        // echo $query_data;
        $result = $con->query($query_data);


        $count = 0;
        // echo $result;
        while ($result_row = $result->fetch_assoc()) {

            // echo $result_row['name'];
            $replace_string = '<b>' . $condition . '</b>';

            $data[$count] = array(
                "name" => str_ireplace($condition, $replace_string, $result_row["name"]),
                "address" => $result_row["address"],
                "district" => $result_row["district"],
                "type" => $result_row["type"]
            );
            $count++;

        }
        echo json_encode($data);
    }
    
    
    else if ($district != "" && $destination != "" && $type == "") {
        $first_char = $destination[0];
        $query_data = "
            SELECT " . $first_char . "_id AS id," . $first_char . "_name AS name, " . $first_char . "_address AS address, " . $first_char . "_district AS district, " . $first_char . "_type AS type 
            FROM tbl_" . $destination . " where " . $first_char . "_name LIKE '" . $condition . "%'and ".$first_char."_district ='".$district."' ORDER BY name ASC;";


        // echo $query_data;
        $result = $con->query($query_data);


        $count = 0;
        // echo $result;
        while ($result_row = $result->fetch_assoc()) {

            // echo $result_row['name'];
            $replace_string = '<b>' . $condition . '</b>';

            $data[$count] = array(
                "name" => str_ireplace($condition, $replace_string, $result_row["name"]),
                "address" => $result_row["address"],
                "district" => $result_row["district"],
                "type" => $result_row["type"]
            );
            $count++;

        }
        echo json_encode($data);
    }
    
    
    else if ($district != "" && $destination != "" && $type != "") {
        $first_char = $destination[0];
        $query_data = "
            SELECT " . $first_char . "_id AS id," . $first_char . "_name AS name, " . $first_char . "_address AS address, " . $first_char . "_district AS district, " . $first_char . "_type AS type 
            FROM tbl_" . $destination . " where " . $first_char . "_name LIKE '" . $condition . "%'and ".$first_char."_district ='".$district."' and ".$first_char."_type ='".$type."' ORDER BY name ASC;";


        // echo $query_data;
        $result = $con->query($query_data);


        $count = 0;
        // echo $result;
        while ($result_row = $result->fetch_assoc()) {

            // echo $result_row['name'];
            $replace_string = '<b>' . $condition . '</b>';

            $data[$count] = array(
                "name" => str_ireplace($condition, $replace_string, $result_row["name"]),
                "address" => $result_row["address"],
                "district" => $result_row["district"],
                "type" => $result_row["type"]
            );
            $count++;

        }
        echo json_encode($data);
    }





























































}




?>