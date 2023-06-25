<?php

session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['not_signed'] = "Plz, Log in first";
    header('location:login.php');
}

require "include/dbconn.inc.php";

if (isset($_GET['destination']) && (!isset($_GET['district']))) {
    $destination = $_GET['destination'];
    $first_char = substr($destination, 0, 1);
    $records = $con->query("SELECT * FROM tbl_" . $destination . ";");
    $no_of_rows = $records->num_rows;
    $title_text = "Popular " . ucfirst($destination) . "s in Nepal right now";
} else if (isset($_GET['destination']) && isset($_GET['district'])) {
    $destination = $_GET['destination'];
    $district = $_GET['district'];
    $first_char = substr($destination, 0, 1);
    $records = $con->query("SELECT * FROM tbl_" . $destination . " where " . $first_char . "_district='" . $district . "';");
    $no_of_rows = $records->num_rows;
    $title_text = "Popular " . ucfirst($destination) . "s in " . $district . " right now";
}
$start = 0;
$contents_per_page = 12;
//calculating no of pages
$pages = ceil($no_of_rows / $contents_per_page);

//if the user clicks on a page no we set new start point
if (isset($_GET['page'])) {
    $page = $_GET['page'] - 1;
    $start = $page * $contents_per_page;
}

$pagination_query_execute = $con->query("SELECT * FROM tbl_" . $destination . " LIMIT " . $start . "," . $contents_per_page . ";");
if (isset($_GET['destination']) && isset($_GET['district'])) {
    $pagination_query_execute = $con->query("SELECT * FROM tbl_" . $destination . " where " . $first_char . "_district='" . $district . "' ORDER BY " . $first_char . "_rating DESC LIMIT " . $start . "," . $contents_per_page . ";");
}


include "/include/star_rating.inc.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo ucfirst($destination) . "s | ";
        if (isset($_GET['district']))
            echo $district;
        echo " Traverse Nepal"; ?>
    </title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/reload_animation_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <link rel="stylesheet" href="style/attraction_list_style.css">
    <link rel="stylesheet" href="style/feed_container_style.css">
    <link rel="stylesheet" href="style/pagination_style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- <script src="https://kit.fontawesome.com/ed931f650e.js" crossorigin="anonymous"></script> -->
</head>

<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="./img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->
    <header>
        <?php include "include/header.inc.php" ?>
    </header>

    <main>
        <div class="attractions-list-container">

            <div class="attractions-container">

                <div class="attractions-list-title">
                    <div class="list-title">
                        <?php echo $title_text ?>
                    </div>
                </div>

                <ul class="attractions-list-body">
                    <!-- php code here -->
                    <?php while ($pagination_result = $pagination_query_execute->fetch_assoc()) {
                        $start++; ?>
                        <!-- php code here -->
                        <li class="attraction-content" id="<?php echo $pagination_result[$first_char . '_name']; ?>">
                            <a href="#">
                                <div class="attraction-image-container">
                                    <img src="<?php echo $pagination_result[$first_char . '_image']; ?>"
                                        alt="This is <?php echo $pagination_result[$first_char . '_name']; ?>'s picture.">
                                </div>

                                <div class="bottom-content">
                                    <div class="attraction-name">
                                        <?php echo $start . ". " . $pagination_result[$first_char . '_name']; ?>
                                    </div>
                                    <div class="attraction-rating-review">
                                        <div class="attraction-rating">
                                            <svg viewBox="0 0 128 24" width="68" height="12" aria-label="">
                                                <path
                                                    d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z"
                                                    transform=""></path>
                                                <path
                                                    d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z"
                                                    transform="translate(26 0)"></path>
                                                <path
                                                    d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z"
                                                    transform="translate(52 0)"></path>
                                                <path
                                                    d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12z"
                                                    transform="translate(78 0)"></path>
                                                <path
                                                    d="M 12 0C5.388 0 0 5.388 0 12s5.388 12 12 12 12-5.38 12-12c0-6.612-5.38-12-12-12zm0 2a9.983 9.983 0 019.995 10 10 10 0 01-10 10A10 10 0 012 12 10 10 0 0112 2z"
                                                    transform="translate(104 0)"></path>
                                            </svg>
                                        </div>

                                        <div class="attraction-review">
                                            <?php if ($destination != "district") {
                                                echo $pagination_result[$first_char . '_num_reviews'];
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="attraction-type">
                                        <?php echo $pagination_result[$first_char . '_type']; ?>
                                    </div>
                                </div>

                            </a>
                            <div class="rating-icon-circle">
                                <button class="like-btn" data-liked="no" data-destination-type="<?php echo $destination; ?>"
                                    data-destination-id=" <?php echo $pagination_result[$first_char . '_id']; ?>">
                                    <svg viewBox="0 0 24 24" width="24px" height="24px"><!--haven't applied css-->
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.798 5.786A5.769 5.769 0 017.72 4.25c1.455 0 2.857.548 3.922 1.536l.005.005.341.322.332-.317a5.769 5.769 0 013.928-1.54c1.458 0 2.862.55 3.928 1.54l.004.004c1.093 1.032 1.599 2.324 1.569 3.662-.03 1.323-.578 2.643-1.5 3.785-.884 1.096-2.85 2.943-4.547 4.478a183.566 183.566 0 01-3.153 2.785l-.069.059-.489-.569.49.569-.486.416-.488-.412a101.98 101.98 0 01-7.75-7.288l-.021-.021-.02-.023c-1.725-2.115-2.203-5.32.08-7.453l.002-.002zm8.19 13.226a174.415 174.415 0 002.708-2.4c1.72-1.556 3.59-3.32 4.385-4.306.757-.939 1.148-1.948 1.168-2.877.02-.912-.313-1.795-1.097-2.536a4.269 4.269 0 00-2.904-1.138 4.269 4.269 0 00-2.903 1.136l-1.35 1.292-1.375-1.3a4.269 4.269 0 00-2.9-1.133 4.269 4.269 0 00-2.901 1.135c-1.507 1.408-1.353 3.659.042 5.385a100.45 100.45 0 007.127 6.742z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </li>

                        <!-- php code here -->
                    <?php } ?>
                    <!-- php code here -->
                </ul>

            </div>
        </div>

        <!-- including pagination -->

        <?php if ($pages > 1)
            include "include/pagination.inc.php"; ?>
        <!-- including pagination -->

        <footer>
            <?php include "include/footer.inc.php" ?>
        </footer>
    </main>
    <script src="./script/reload_animation.js"></script>
    <script src="./script/ajax_script/like_update.js"></script>
    <?php include "./include/like_update_reload.inc.php"; ?>
</body>

</html>