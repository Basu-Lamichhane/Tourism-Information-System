<?php
require "dbconn.inc.php";

if (isset($_GET['name'])) {
    $district_name = $_GET['name'];
    $result1 = $con->query("SELECT * FROM tbl_district where d_name='{$district_name}';");
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        $district_image = $row['d_image'];
        $district_desc = trim($row["d_desc"]);
        $district_type = $row["d_type"];
    } else {
        echo '<script>alert("Sorry the couldnot fetch the data of the district!")</script>';
        echo '<script>window.location.href="../admin.php?type=district"</script>';
    }
    if (isset($_POST['submit-update'])) {
        $new_district_name = $_POST['name'];
        $new_district_desc = $_POST['desc'];
        $new_district_type = $_POST['type'];
        $image_name = $new_district_name;
        $old_district_image = $district_image;
        $new_district_image = $_FILES['image'];

        unlink("../." . $old_district_image);

        $temp_new_image = $new_district_image['tmp_name']; // Temporary location of the uploaded image
        // Get the file extension using explode()
        $fileNameParts = explode(".", $new_district_image["name"]);
        $fileExtension = end($fileNameParts);
        $imageName = $new_district_name . "." . $fileExtension; //name of the uploaded image

        // Directory to save the uploaded images
        $uploadDirectory = '../../image/district_images/'; // Directory

        // Move the uploaded file to the specified directory
        $targetPath = $uploadDirectory . $imageName;
        move_uploaded_file($temp_new_image, $targetPath);
        $db_image_path = "./image/district_images/" . $imageName;

        $result2 = $con->query("UPDATE `tbl_district` SET `d_name`='{$new_district_name}',`d_desc`='{$new_district_desc}',`d_image`='{$db_image_path}',`d_type`='{$new_district_type}' WHERE `d_name`='{$district_name}';");

        // echo "UPDATE `tbl_district` SET `d_name`='{$new_district_name}',`d_desc`='{$new_district_desc}',`d_image`='{$db_image_path}',`d_type`='{$new_district_type}' WHERE `d_name`='{$district_name}';";
        if ($result2){
            echo ("<script>alert('The datas for {$district_name} is updated');</script>");
            echo '<script>window.location.href="../admin.php?type=district"</script>';
        }else{
            echo ("<script>alert('Sorry, the datas for {$district_name} is cannot be updated');</script>");
        }

    }
} else {
    echo '<script>alert("Sorry the couldnot fetch the name of the district!")</script>';
    echo '<script>window.location.href="../admin.php?type=district"</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update District | Traverse Nepal</title>
    <link rel="stylesheet" href="../assets/style/update_district.css">
</head>

<body>
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <fieldset id="field-set">
                <legend>Update District Details</legend>
                <div class="image form">
                    <label for="dimage">Image of the district : </label>
                    <div class="image-form-container">
                        <img src="../.<?php echo $district_image; ?>" id="show-image"
                            alt="This is the image of <?php echo $district_name; ?>">
                        <input type="file" value="<?php echo $district_image; ?>" name="image" id="dimage"
                            accept="image/jpeg, image/png, image/gif" required>
                    </div>
                </div>
                <br>
                <div class="name form text">
                    <label for="dname">Name of the district : </label>
                    <input type="text" name="name" id="dname" value="<?php echo $district_name; ?>" pattern="[a-zA-Z]+"
                        required>
                </div>
                <br>
                <div class="desc form text">
                    <label for="ddesc">Description of the district : </label>
                    <textarea name="desc" id="ddesc" rows="8" cols="90" minlength="5" maxlength="1000"
                        style="resize: none" pattern="[a-zA-Z\s]+"
                        placeholder="Enter the description for the destination (Max characters : 1000"
                        required><?php echo $district_desc; ?></textarea>
                </div>
                <br>
                <div class="type form text">
                    <label for="dtype">Type of the district : </label>
                    <input type="text" name="type" id="dtype" value="<?php echo $district_type; ?>"
                        pattern="[a-zA-Z\s]+" required>
                </div>
                <div class="submit form">
                    <button type="submit" name="submit-update" id="update-submit" disabled>Update</button>
                    <button type="button" id="return"
                        onclick="window.location.href='../admin.php?type=district'">return</button>
                </div>
            </fieldset>
        </form>
    </div>
    <script>
        console.log(document.getElementById('dimage').value);
        // For form validations
        const inputElements = document.querySelectorAll('input[type="text"],textarea');
        const submitBtn = document.getElementById('update-submit');
        inputElements.forEach(function (inputElement) {
            inputElement.addEventListener('change', function () {
                var inputValue = inputElement.value;
                if ((inputValue.toString().trim()) === "")
                    submitBtn.disabled = true;
                else
                    submitBtn.disabled = false;
            });
        });
        const imageInput = document.getElementById('dimage');
        imageInput.addEventListener('change', function () {
            submitBtn.disabled = false;
        });
        // For form validations

        // For image preview
        const previewImage = document.getElementById('show-image');

        imageInput.addEventListener('change', function () {
            const selectedImage = imageInput.files[0];
            if (selectedImage) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    previewImage.src = event.target.result;
                };

                reader.readAsDataURL(selectedImage);
            } else {
                previewImage.src = ''; // Clear the preview if no image is selected
            }
        });
    </script>
</body>

</html>