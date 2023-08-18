<?php
function clearInput($input)
{
    return htmlspecialchars(trim($input));
}

session_start();
require "dbconn.inc.php";
if (isset($_POST['return'])) {
    header('Location:admin.php');
} else if (isset($_POST['submit'])) {
    $destination = $_POST['destination'];
    if ($destination == "place") {
        $name = clearInput($_POST['name']);
        $district = $_POST['district'];

        $district_query = $con->query("SELECT * FROM tbl_district WHERE d_name = '$district';");
        $district_row = $district_query->fetch_assoc();
        $district_id = $district_row['d_id'];

        $check_exists = $con->query("SELECT * FROM tbl_place INNER JOIN tbl_district ON p_district=d_id WHERE p_name='" . $name . "' AND d_name='" . $district . "';");

        if ($check_exists->num_rows > 0) {
            echo '<script>alert("Sorry, a place with that name already exists in this district!")</script>';
            echo "<script>window.location.href='../add_destination.php?type=place'</script>";
        } else {
            $desc = clearInput($_POST['desc']);
            $type = clearInput($_POST['type']);
            $rating = $_POST['rating'];
            $review = $_POST['review'];

            $image = $_FILES['image'];
            $fileName = $image["name"];
            $fileTmpPath = $image["tmp_name"];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            $imgpath = "../../image/place_images/" . $name . "." . $extension;
            $check_file = move_uploaded_file($fileTmpPath, $imgpath);
            $db_image = "./image/place_images/" . $name . "." . $extension;

            $address = clearInput($_POST['address']);
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $qry = "INSERT INTO `tbl_place` (`p_name`, `p_desc`, `p_image`, `p_address`, `p_district`, `p_latitude`, `p_longitude`, `p_type`, `p_rating`, `p_num_reviews`) VALUES ('$name', '$desc', '$db_image', '$address', '$district_id', '$latitude', '$longitude', '$type', '$rating', '$review')";
            $result = $con->query($qry);
            if ($result == TRUE) {
                ;
                echo '<script>alert("Place added successfully!")</script>';
                echo "<script>window.location.href='../admin.php?type=place'</script>";
            } else {
                echo '<script>alert("Sorry, Some error occured!")</script>';
                echo "<script>window.location.href='../add_destination.php?type=place'</script>";
            }
        }

    } else if ($destination == "cafe") {
        $name = clearInput($_POST['name']);
        $district = $_POST['district'];

        $district_query = $con->query("SELECT * FROM tbl_district WHERE d_name = '$district';");
        $district_row = $district_query->fetch_assoc();
        $district_id = $district_row['d_id'];

        $check_exists = $con->query("SELECT * FROM tbl_cafe INNER JOIN tbl_district ON c_district=d_id WHERE c_name='" . $name . "' AND d_name='" . $district . "';");

        if ($check_exists->num_rows > 0) {
            echo '<script>alert("Sorry, a cafe with that name already exists in this district!")</script>';
            echo "<script>window.location.href='../add_destination.php?type=cafe'</script>";
        } else {
            $image = $_FILES['image'];
            $fileName = $image["name"];
            $fileTmpPath = $image["tmp_name"];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            $imgpath = "../../image/cafe_images/" . $name . "." . $extension;
            $check_file = move_uploaded_file($fileTmpPath, $imgpath);
            $db_image = "./image/cafe_images/" . $name . "." . $extension;

            $services = clearInput($_POST['services']);
            $type = clearInput($_POST['type']);
            $address = clearInput($_POST['address']);
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $web = $_POST['website'];
            $rating = $_POST['rating'];
            $review = $_POST['review'];
            $start = $_POST['start'];
            $close = $_POST['close'];

            $qry = "INSERT INTO `tbl_cafe` (`c_name`, `c_image`, `c_address`, `c_district`, `c_latitude`, `c_longitude`, `c_type`, `c_services`, `c_rating`, `c_num_reviews`, `c_phone`, `c_email`, `c_website`, `c_starttime`, `c_closetime`) VALUES ('$name', '$db_image', '$address', '$district_id', '$latitude', '$longitude', '$type', '$services', '$rating', '$review', '$phone', '$email', '$web', '$start', '$close')";
            $result = $con->query($qry);
            if ($result == TRUE) {
                echo '<script>alert("Cafe added successfully!")</script>';
                echo "<script>window.location.href='../admin.php?type=cafe'</script>";
            } else {
                echo '<script>alert("Sorry, Some error occured!")</script>';
                echo "<script>window.location.href='../add_destination.php?type=cafe'</script>";
            }
        }

    } else if ($destination == "accommodation") {
        $name = clearInput($_POST['name']);
        $district = $_POST['district'];

        $district_query = $con->query("SELECT * FROM tbl_district WHERE d_name = '$district';");
        $district_row = $district_query->fetch_assoc();
        $district_id = $district_row['d_id'];

        $check_exists = $con->query("SELECT * FROM tbl_accommodation INNER JOIN tbl_district ON a_district=d_id WHERE a_name='" . $name . "' AND d_name='" . $district . "';");

        if ($check_exists->num_rows > 0) {
            echo '<script>alert("Sorry, an accommodation with that name already exists in this district!")</script>';
            echo "<script>window.location.href='../add_destination.php?type=accommodation'</script>";
        } else {

            $image = $_FILES['image'];
            $fileName = $image["name"];
            $fileTmpPath = $image["tmp_name"];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            $imgpath = "../../image/accommodation_images/" . $name . "." . $extension;
            $check_file = move_uploaded_file($fileTmpPath, $imgpath);
            $db_image = "./image/accommodation_images/" . $name . "." . $extension;

            $services = clearInput($_POST['services']);
            $type = clearInput($_POST['type']);
            $rooms = $_POST['rooms'];
            $rate = $_POST['room_rate'];
            $address = clearInput($_POST['address']);
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $web = $_POST['website'];
            $rating = $_POST['rating'];
            $review = $_POST['review'];

            $qry = "INSERT INTO `tbl_accommodation` (`a_name`, `a_image`, `a_type`, `a_services`, `a_address`, `a_district`, `a_latitude`, `a_longitude`, `a_rating`, `a_num_reviews`, `a_no_of_rooms`, `a_room_rate`, `a_phone`, `a_email`, `a_website`) VALUES ('$name', '$db_image', '$type', '$services', '$address', '$district_id', '$latitude', '$longitude', '$rating', '$review', '$rooms', '$rate', '$phone', '$email', '$web')";
            $result = $con->query($qry);
            if ($result == TRUE) {
                ;
                echo '<script>alert("Accommodation added successfully!")</script>';
                echo "<script>window.location.href='../admin.php?type=accommodation'</script>";
            } else {
                echo '<script>alert("Sorry, Some error occured!")</script>';
                echo "<script>window.location.href='../add_destination.php?type=accommodation'</script>";
            }
        }
    } else if ($destination == "restaurant") {
        $name = clearInput($_POST['name']);
        $district = $_POST['district'];

        $district_query = $con->query("SELECT * FROM tbl_district WHERE d_name = '$district';");
        $district_row = $district_query->fetch_assoc();
        $district_id = $district_row['d_id'];

        $check_exists = $con->query("SELECT * FROM tbl_restaurant INNER JOIN tbl_district ON r_district=d_id WHERE r_name='" . $name . "' AND d_name='" . $district . "';");

        if ($check_exists->num_rows > 0) {
            echo '<script>alert("Sorry, a restaurant with that name already exists in this district!")</script>';
            echo "<script>window.location.href='../add_destination.php?type=restaurant'</script>";
        } else {

            $image = $_FILES['image'];
            $fileName = $image["name"];
            $fileTmpPath = $image["tmp_name"];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            $imgpath = "../../image/restaurant_images/" . $name . "." . $extension;
            $check_file = move_uploaded_file($fileTmpPath, $imgpath);
            $db_image = "./image/restaurant_images/" . $name . "." . $extension;


            $services = clearInput($_POST['services']);
            $type = clearInput($_POST['type']);
            $address = clearInput($_POST['address']);
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $web = $_POST['website'];
            $rating = $_POST['rating'];
            $review = $_POST['review'];
            $start = $_POST['start'];
            $close = $_POST['close'];

            $qry = "INSERT INTO `tbl_restaurant` (`r_name`, `r_image`, `r_address`, `r_district`, `r_latitude`, `r_longitude`, `r_type`, `r_services`, `r_rating`, `r_num_reviews`, `r_phone`, `r_website`, `r_email`, `r_starttime`, `r_closetime`) VALUES ('$name', '$db_image', '$address', '$district_id', '$latitude', '$longitude', '$type', '$services', '$rating', '$review', '$phone', '$web', '$email', '$start', '$close')";
            $result = $con->query($qry);
            if ($result == TRUE) {
                echo '<script>alert("Restaurant added successfully!")</script>';
                echo "<script>window.location.href='../admin.php?type=restaurant'</script>";
            } else {
                echo '<script>alert("Sorry, Some error occured!")</script>';
                echo "<script>window.location.href='../add_destination.php?type=restaurant'</script>";
            }
        }
    } elseif ($destination == "district") {
        $name = ucfirst($_POST['name']);
        $desc = $_POST['desc'];
        $type = $_POST['type'];
        $image = $_FILES['image'];
        $fileName = $name;
        $fileTmpPath = $image["tmp_name"];

        // Get the file extension using explode()
        $fileNameParts = explode(".", $image["name"]);
        $fileExtension = end($fileNameParts);
        $fileName = $name . "." . $fileExtension; //name of the uploaded image

        $imgpath = "../../image/district_images/" . $fileName;
        $check_file = move_uploaded_file($fileTmpPath, $imgpath);
        $db_image = "./image/district_images/" . $fileName;

        $check_exist = $con->query("SELECT * FROM tbl_district WHERE d_name='" . $name . "';");
        if ($check_exist->num_rows > 0) {
            echo "<script>alert('District already exists! Plz add a different district.')</script>";
            echo "<script>window.location.href='../add_destination.php?type=district'</script>";
        } else {
            $qry = "INSERT INTO `tbl_district` (`d_name`, `d_desc`, `d_image`, `d_type`) VALUES ('$name', '$desc', '$db_image','$type')";
            $result = $con->query($qry);
            if ($result == TRUE) {
                echo "<script>alert('District added successfully!')</script>";
                echo "<script>window.location.href='../admin.php?type=district'</script>";
            }
        }

    }

} else {
    echo "error";
}
?>