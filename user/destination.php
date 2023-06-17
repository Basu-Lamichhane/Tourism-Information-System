<?php

require "/include/dbconn.inc.php";

if (isset($_GET['district']) && isset($_GET['destination']) && isset($_GET['dest_id'])) {
    $district=$_GET['district'];
    $destination=$_GET['destination'];
    $destination_id=$_GET['dest_id'];
    $first_char = substr($destination, 0, 1);
    $destination_record_exec=$con->query("SELECT * FROM tbl_".$destination." WHERE ".$first_char."_id = '".$destination_id."' AND ".$first_char."_district = '".$district."'");
    $destination_record=$destination_record_exec->fetch_assoc();

    $destination_name=$destination_record[$first_char.'_name'];
    $destination_desc=$destination_record[$first_char.'_desc'];
    $destination_image=$destination_record[$first_char.'_image'];
    $destination_address=$destination_record[$first_char.'_address'];
    $destination_image=$destination_record[$first_char.'_image'];
    $destination_latitude=$destination_record[$first_char.'_latitude'];
    $destination_longitude=$destination_record[$first_char.'_longitude'];
    $destination_type=$destination_record[$first_char.'_type'];
    $destination_rating=$destination_record[$first_char.'_rating'];
    $destination_num_reviews=$destination_record[$first_char.'_num_reviews'];

    // print_r($destination_record);

}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $destination_name." | ".$district."  Traverse Nepal";?></title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/reload_animation_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <link rel="stylesheet" href="style/destination_style.css">
    <link rel="stylesheet" href="style/feed_container_style.css">
</head>

<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="./img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->

    <!-- header -->
    <header>
        <?php include"/include/header.inc.php"; ?>
    </header>
    <!-- header -->

    <!-- main -->
    <main>
        <div class="breadcrumb-container">
            <div class="breadcrumb-trails">
                <div class="breadcrumbs">
                    <a href="#"><div class="crumb">Nepal&nbsp;></div></a>
                    <a href="#"><?php if(isset($_GET['district'])) echo '<div class="crumb">&nbsp;'.$district.'&nbsp;></div>'?></a> 
                    <a href="#"><div class="crumb">&nbsp;<?php echo " ".ucfirst($destination)."s&nbsp;>"?></div></a> 
                    <a href="#"><?php if(isset($_GET['dest_id'])) echo '<div class="crumb">&nbsp;'.$destination_name.'</div>'?></a> 
                </div>
            </div>
        </div>


        <div class="destination-container">
            <section class="destination-desc-image-container">
                <div class="destination-desc-image">
                    <div class="destination-image-container">
                        <img src="<?php echo $destination_image?>" alt="This is <?php echo $destination_name?>'s picture." >
                    </div>
                    <div class="destination-desc-container">
                        <div class="desc-title">
                            About <?php echo $destination_name; ?>
                        </div>
                        <div class="desc-text"><?php echo $destination_desc; ?></div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- main -->


    <!-- javascripts -->
    <script src="./script/reload_animation.js"></script>
    <!-- javascripts -->
</body>
</html>