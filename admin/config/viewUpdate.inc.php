<?php
if(isset($_GET['type'])){
    if($_GET['type']=="place"){
        $id = $_GET['id'];
        include "config/get_Attraction.php";
        if ($res->num_rows> 0) {
            $row = $res->fetch_assoc();
            $name = trim($row['p_name']);
            $desc = trim($row['p_desc']);
            $type = trim($row['p_type']);
            $image = trim($row['p_image']);
            $address = trim($row['p_address']);
            $district = trim($row['p_district']);
            $latitude = trim($row['p_latitude']);
            $longitude = trim($row['p_longitude']);
            $rating = trim($row['p_rating']);
            $reviews = trim($row['p_num_reviews']);
        }
    }
    else if($_GET['type']=="accommodation"){
        include "config/get_Accommodation.php";
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $name = trim($row['a_name']);
            $services = trim($row['a_services']);
            $type = trim($row['a_type']);
            $image = trim($row['a_image']);
            $address = trim($row['a_address']);
            $district = trim($row['a_district']);
            $latitude = trim($row['a_latitude']);
            $longitude = trim($row['a_longitude']);
            $rating = trim($row['a_rating']);
            $reviews = trim($row['a_num_reviews']);
            $rooms= trim($row['a_no_of_rooms']);
            $rate= trim($row['a_room_rate']);
            $phone= trim($row['a_phone']);
            $email= trim($row['a_email']);
            $website= trim($row['a_website']);

        }
    }
    else if($_GET['type']=="cafe"){
        include "config/get_Cafe.php";
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $name = trim($row['c_name']);
            $services = trim($row['c_services']);
            $type = trim($row['c_type']);
            $image = trim($row['c_image']);
            $address = trim($row['c_address']);
            $district = trim($row['c_district']);
            $latitude = trim($row['c_latitude']);
            $longitude = trim($row['c_longitude']);
            $rating = trim($row['c_rating']);
            $reviews = trim($row['c_num_reviews']);
            $phone= trim($row['c_phone']);
            $email= trim($row['c_email']);
            $website= trim($row['c_website']);
            $starttime = trim($row['c_starttime']);
            $closetime = trim($row['c_closetime']);

        }
    }
    else if($_GET['type']=="restaurant"){
        include "config/get_restaurants.php";
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $name = trim($row['r_name']);
            $services = trim($row['r_services']);
            $type = trim($row['r_type']);
            $image = trim($row['r_image']);
            $address = trim($row['r_address']);
            $district = trim($row['r_district']);
            $latitude = trim($row['r_latitude']);
            $longitude = trim($row['r_longitude']);
            $rating = trim($row['r_rating']);
            $reviews = trim($row['r_num_reviews']);
            $phone= trim($row['r_phone']);
            $email= trim($row['r_email']);
            $website= trim($row['r_website']);
            $starttime = trim($row['r_starttime']);
            $closetime = trim($row['r_closetime']);
        }
    }
} 
?>