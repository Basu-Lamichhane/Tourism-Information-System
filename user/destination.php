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
    if($destination=="place") $destination_desc=$destination_record[$first_char.'_desc'];
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



include "/include/star_rating.inc.php";
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
            <section class="destination-title-container">
                <div class="destination-title">
                    <?php echo $destination_name; ?> 
                </div>
                <div class="destination-share-like-container">
                    <div class="like-btn">
                        <button>
                        <svg viewBox="0 0 24 24" width="20px" height="20px"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.798 5.786A5.769 5.769 0 017.72 4.25c1.455 0 2.857.548 3.922 1.536l.005.005.341.322.332-.317a5.769 5.769 0 013.928-1.54c1.458 0 2.862.55 3.928 1.54l.004.004c1.093 1.032 1.599 2.324 1.569 3.662-.03 1.323-.578 2.643-1.5 3.785-.884 1.096-2.85 2.943-4.547 4.478a183.566 183.566 0 01-3.153 2.785l-.069.059-.489-.569.49.569-.486.416-.488-.412a101.98 101.98 0 01-7.75-7.288l-.021-.021-.02-.023c-1.725-2.115-2.203-5.32.08-7.453l.002-.002zm8.19 13.226a174.415 174.415 0 002.708-2.4c1.72-1.556 3.59-3.32 4.385-4.306.757-.939 1.148-1.948 1.168-2.877.02-.912-.313-1.795-1.097-2.536a4.269 4.269 0 00-2.904-1.138 4.269 4.269 0 00-2.903 1.136l-1.35 1.292-1.375-1.3a4.269 4.269 0 00-2.9-1.133 4.269 4.269 0 00-2.901 1.135c-1.507 1.408-1.353 3.659.042 5.385a100.45 100.45 0 007.127 6.742z"></path></svg>
                        </button>
                    </div>
                    <div class="share-btn">
                        <button>
                        <svg viewBox="0 0 24 24" width="20px" height="20px"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 .94l4.102 4.101-1.06 1.06-2.292-2.29V12.5h-1.5V3.81L8.959 6.103l-1.061-1.06L12 .938zM4.043 8.301C4.505 7.73 5.2 7.25 6.003 7.25H8v1.5H6.004c-.196 0-.503.134-.793.494-.28.347-.461.81-.461 1.256v7.956c0 1.17.72 1.794 1.254 1.794h11.992c.538 0 1.254-.628 1.254-1.794V10.5c0-.448-.18-.91-.46-1.257-.289-.359-.595-.493-.794-.493H16v-1.5h1.996c.806 0 1.501.48 1.963 1.052.47.585.791 1.372.791 2.198v7.956c0 1.638-1.072 3.294-2.754 3.294H6.004c-1.674 0-2.754-1.645-2.754-3.294V10.5c0-.826.322-1.614.793-2.198z"></path></svg>
                        </button>
                    </div>
                </div>
            </section>
            <section class="destination-desc-image-container">
                <div class="destination-desc-image">
                    <div class="destination-image-container">
                        <img src="<?php echo $destination_image?>" alt="This is <?php echo $destination_name?>'s picture." >
                    </div>
                    <div class="destination-desc-container">
                        <div class="desc-title">
                            About <?php echo $destination_name; ?>
                        </div>
                        <?php if($destination=="place") echo('<div class="desc-text">'.$destination_desc.'</div>'); ?>
                    </div>
                </div>
            </section>
            <section class="destination-information-container">
                <div class="dest-type-container">
                    <div class="dest-info-title">TYPE OF DESTINATION:</div>
                    <div class="dest-type"><?php echo $destination_type; ?></div>
                </div>
                <div class="dest-address-container"><div class="dest-info-title">ADDRESS OF DESTINATION:</div>
                    <div class="dest-type"><?php echo $destination_address; ?></div></div>
                <div class="dest-rating-container"><div class="dest-info-title">RATING OF DESTINATION:</div>
                    <div class="dest-type"><?php star_ratings($destination_rating); ?></div></div>
            </section>
        </div>

        
        <?php //displaying the feeds section differently for each destination pages
        if ($destination == 'accommodation') {
        include "include/feeds/accommodation_feed.inc.php";
        include "include/feeds/place_feed.inc.php";
        include "include/feeds/restaurant_feed.inc.php";
        include "include/feeds/cafe_feed.inc.php";
    } elseif ($destination == 'restaurant') {
        include "include/feeds/restaurant_feed.inc.php";
        include "include/feeds/place_feed.inc.php";
        include "include/feeds/accommodation_feed.inc.php";
        include "include/feeds/cafe_feed.inc.php";
    } elseif ($destination == 'cafe') {
        include "include/feeds/cafe_feed.inc.php";
        include "include/feeds/place_feed.inc.php";
        include "include/feeds/accommodation_feed.inc.php";
        include "include/feeds/restaurant_feed.inc.php";
    } else {
        include "include/feeds/place_feed.inc.php";
        include "include/feeds/accommodation_feed.inc.php";
        include "include/feeds/restaurant_feed.inc.php";
        include "include/feeds/cafe_feed.inc.php";
    }
        include "include/feeds/district_feed.inc.php"; ?>

    </main>
    <!-- main -->


    <!-- javascripts -->
    <script src="./script/reload_animation.js"></script>
    <script>
        function scrollContent(scrollAmount,action) {
            const scrollContainer = document.querySelector('#container-'+action);
            const scrollContent = document.querySelector('#content-'+action);
            const scrollPosition = scrollContainer.scrollLeft;
            const scrollStep = scrollContent.clientWidth / 3;

            scrollContainer.scrollBy({
                left: scrollStep * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
    <!-- javascripts -->
</body>
</html>