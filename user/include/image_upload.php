<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
} else {
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
}

if (isset($_FILES['pp-upload'])) {

    require "dbconn.inc.php";

    $user_image_exec = $con->query("SELECT u_image,u_name FROM tbl_user WHERE u_email = '$user_email';");
    $row = $user_image_exec->fetch_assoc();
    $user_image = $row['u_image'];
    $user_name = $row['u_name'];

    if ($user_image == "") { // checking if image already exists or not
        //if it doesn't exist then adding new image
        $image = $_FILES['pp-upload']['tmp_name']; // Temporary location of the uploaded image

        $fileType = $_FILES['pp-upload']['type']; //getting file extension

        // Allowed image MIME types
        $allowedMimeTypes = array("image/jpeg", "image/jpg", "image/png", "image/gif");

        if (in_array($fileType, $allowedMimeTypes)) {

            // Get the file extension using explode()
            $fileNameParts = explode(".", $_FILES['pp-upload']["name"]);
            $fileExtension = end($fileNameParts);
            $imageName = $user_name . "." . $fileExtension; //name of the uploaded image

            // Directory to save the uploaded images
            $uploadDirectory = '../../image/user_images/'; // Directory

            // Move the uploaded file to the specified directory
            $targetPath = $uploadDirectory . $imageName;
            move_uploaded_file($image, $targetPath);
            $db_image_path = "./image/user_images/" . $imageName;
            //if it doesn't exist then inserting a new image
            $user_img_insert = $con->query("UPDATE tbl_user SET u_image='$db_image_path' WHERE u_email='" . $user_email . "';");
            $_SESSION['action'] = "Congrats " . $user_name . ", <br> Your profile picture has been updated successfully";
            header("Location:../../profile.php");

        } else {
            $_SESSION['action'] = "Invalid file format. Allowed formats: JPG, JPEG, PNG, GIF.";
            header("Location:../../profile.php");
        }
    } else {
        //if it already exists then updating the image
        $user_old_image = $row['u_image'];
        unlink('../.' . $user_old_image);

        $image = $_FILES['pp-upload']['tmp_name']; // Temporary location of the uploaded image

        $fileType = $_FILES['pp-upload']['type']; //getting file extension

        // Allowed image MIME types
        $allowedMimeTypes = array("image/jpeg", "image/jpg", "image/png", "image/gif");

        if (in_array($fileType, $allowedMimeTypes)) {
            // Get the file extension using explode()
            $fileNameParts = explode(".", $_FILES['pp-upload']["name"]);
            $fileExtension = end($fileNameParts);
            $imageName = $user_name . "." . $fileExtension; //name of the uploaded image

            // Directory to save the uploaded images
            $uploadDirectory = '../../image/user_images/'; // Directory

            // Move the uploaded file to the specified directory
            $targetPath = $uploadDirectory . $imageName;
            move_uploaded_file($image, $targetPath);
            $db_image_path = "./image/user_images/" . $imageName;
            $user_img_insert = $con->query("UPDATE tbl_user SET u_image='$db_image_path' WHERE u_email='" . $user_email . "';");
            $_SESSION['action'] = "Congrats " . $user_name . ", <br> Your profile picture has been updated successfully";
            header("Location:../../profile.php");
        } else {
            $_SESSION['action'] = "Invalid file format. Allowed formats: JPG, JPEG, PNG, GIF.";
            header("Location:../../profile.php");
        }
    }

}
?>