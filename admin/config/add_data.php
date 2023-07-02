<?php
session_start();
require "dbconn.inc.php";
if(isset($_POST['return'])){
    header('Location:admin.php');
}
else if(isset($_POST['submit'])){
    $destination = $_POST['destination'];
    if($destination=="place"){
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $type = $_POST['type'];
        $image = $_FILES['image'];
        $fileName = $image["name"];
        $fileTmpPath = $image["tmp_name"];
        $fileSize = $image["size"];
        $fileType = $image["type"];
        $imgpath = "C:/xampp/htdocs/TIS/image/place_images/" . $fileName;
        move_uploaded_file($fileTmpPath, $imgpath);
        $db_image = ".image/place_images/" . $fileName;


        $address = $_POST['address'];
        $district = $_POST['district'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $qry = "INSERT INTO `tbl_place` (`p_name`, `p_desc`, `p_image`, `p_address`, `p_district`, `p_latitude`, `p_longitude`, `p_type`, `p_rating`, `p_num_reviews`) VALUES ('$name', '$desc', '$db_image', '$address', '$district', '$latitude', '$longitude', '$type', '0', '0')" ;
        $result = $con->query($qry);
        if($result==TRUE){
            header("Location:../add_destination.php");
            $_SESSION['action'] = "Data Added Sucessfully";
        }

    }
    else if($destination=="cafe"){
        $name = $_POST['name'];
        $services = $_POST['services'];
        $type = $_POST['type'];

        $image = $_FILES['image'];
        $fileName = $image["name"];
        $fileTmpPath = $image["tmp_name"];
        $fileSize = $image["size"];
        $fileType = $image["type"];
        $imgpath = "C:/xampp/htdocs/TIS/image/place_images/" . $fileName;
        move_uploaded_file($fileTmpPath, $imgpath);
        $db_image = ".image/place_images/" . $fileName;

        $address = $_POST['address'];
        $district = $_POST['district'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $web = $_POST['web'];

        $qry = "INSERT INTO `tbl_place` (`c_name`, `c_services`, `c_image`, `c_address`, `c_district`, `c_latitude`, `c_longitude`, `p_type`, `p_rating`, `p_num_reviews`) VALUES ('$name', '$services', '$db_image', '$address', '$district', '$latitude', '$longitude', '$type', '0', '0')" ;
        $result = $con->query($qry);
        if($result==TRUE){
            header("Location:../add_destination.php");
            $_SESSION['action'] = "Data Added Sucessfully";
        }

    }
    else if($destination=="accommodation"){
        $name = $_POST['name'];
        $services = $_POST['services'];
        $type = $_POST['type'];

        $image = $_FILES['image'];
        $fileName = $image["name"];
        $fileTmpPath = $image["tmp_name"];
        $fileSize = $image["size"];
        $fileType = $image["type"];
        $imgpath = "C:/xampp/htdocs/TIS/image/place_images/" . $fileName;
        move_uploaded_file($fileTmpPath, $imgpath);
        $db_image = ".image/place_images/" . $fileName;

        $rooms = $_POST['rooms'];
        $rate = $_POST['room_rate'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $web = $_POST['web'];

        $qry = "INSERT INTO `tbl_place` (`p_name`, `p_desc`, `p_image`, `p_address`, `p_district`, `p_latitude`, `p_longitude`, `p_type`, `p_rating`, `p_num_reviews`) VALUES ('$name', '$desc', '$db_image', '$address', '$district', '$latitude', '$longitude', '$type', '0', '0')" ;
        $result = $con->query($qry);
        if($result==TRUE){
            header("Location:../add_destination.php");
            $_SESSION['action'] = "Data Added Sucessfully";
        }
    }
    else if($destination=="restaurant"){
        $name = $_POST['name'];
        $services = $_POST['services'];
        $type = $_POST['type'];

        $image = $_FILES['image'];
        $fileName = $image["name"];
        $fileTmpPath = $image["tmp_name"];
        $fileSize = $image["size"];
        $fileType = $image["type"];
        $imgpath = "C:/xampp/htdocs/TIS/image/place_images/" . $fileName;
        move_uploaded_file($fileTmpPath, $imgpath);
        $db_image = ".image/place_images/" . $fileName;

        $address = $_POST['address'];
        $district = $_POST['district'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $web = $_POST['web'];

        $qry = "INSERT INTO `tbl_place` (`p_name`, `p_desc`, `p_image`, `p_address`, `p_district`, `p_latitude`, `p_longitude`, `p_type`, `p_rating`, `p_num_reviews`) VALUES ('$name', '$desc', '$db_image', '$address', '$district', '$latitude', '$longitude', '$type', '0', '0')" ;
        $result = $con->query($qry);
        if($result==TRUE){
            header("Location:../add_destination.php");
            $_SESSION['action'] = "Data Added Sucessfully";
        }
    }

}
else{
    echo "error";
}
?>