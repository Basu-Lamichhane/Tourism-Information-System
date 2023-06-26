<?php

session_start();
if(!isset($_SESSION['email'])){
    $_SESSION['not_signed']="Plz, Log in first";
    header('location:login.php');
}

require "include/dbconn.inc.php";
// $district="";
$district;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $district = $_GET["district"];
}

$selected_district_query = "select * from tbl_district where d_name='" . $district . "';";
$selected_district_result = $con->query($selected_district_query);
$selected_district_data_row = $selected_district_result->fetch_assoc();


include "/include/star_rating.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $selected_district_data_row['d_name'] ?> | Traverse Nepal
    </title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/reload_animation_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/district_page_style.css">
    <link rel="stylesheet" href="style/feed_container_style.css">
</head>

<body>
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="./img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->
    <header>
        <?php include "include/header.inc.php"; ?>
    </header>

    <main id="district_page">

        <div class="container" id="sticky-div">

            <div class="title" id="menu-title">
                <i class="title-text" id="discover">Discover</i>,&nbsp;
                <i class="title-text" id="explore">Explore</i>,&nbsp;
                <i class="title-text" id="experience">Experience</i>&nbsp;!!!
            </div>
            <span>

                <div class="menu">
                    <div class="menu-container">
                        <div class="menu-box">
                            <a href="attractions_list.php?district=<?php echo $selected_district_data_row['d_name']; ?>&&destination=place"
                                class="menu-content" target="_blank">
                                <span class="name">Attractions/Places</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        width="24px" height="24px">
                                        <path
                                            d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm306.7 69.1L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                                    </svg></span>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="attractions_list.php?district=<?php echo $selected_district_data_row['d_name']; ?>&&destination=accommodation"
                                class="menu-content" target="_blank">
                                <span class="name">Accommodation</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        width="24px" viewBox="0 0 512 512">
                                        <path
                                            d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z" />
                                    </svg></span>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="attractions_list.php?district=<?php echo $selected_district_data_row['d_name']; ?>&&destination=restaurant"
                                class="menu-content" target="_blank">
                                <span class="name">Restaurants</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        width="24px" viewBox="0 0 448 512">
                                        <path
                                            d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                                    </svg></span>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="attractions_list.php?district=<?php echo $selected_district_data_row['d_name']; ?>&&destination=cafe"
                                class="menu-content" target="_blank">
                                <span class="name">cafes</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        width="24px" viewBox="0 0 640 512">
                                        <path
                                            d="M96 64c0-17.7 14.3-32 32-32H448h64c70.7 0 128 57.3 128 128s-57.3 128-128 128H480c0 53-43 96-96 96H192c-53 0-96-43-96-96V64zM480 224h32c35.3 0 64-28.7 64-64s-28.7-64-64-64H480V224zM32 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                    </svg></span>
                            </a>
                        </div>


                        <div class="menu-box">
                            <div class="menu-position">
                                <button href="" class="menu-content" onclick="javascript:toggleMenu();">
                                    <span class="name" id="more-btn">More</span>
                                    <span class="blank"></span>
                                    <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 320 512" width="24px" height="24px">
                                            <path
                                                d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                                        </svg></span>
                                </button>

                                <div class="more" data-menu="true" id="more-menu">
                                    <ul role="menu" tabindex="-1" class="more-ul">
                                        <li role="none">
                                            <a href="#" tabindex="-1" class="more-options" id="add-destination"
                                                role="menu-items">Add a Destination</a>
                                        </li>
                                        <li role="none">
                                            <a href="#" tabindex="-1" class="more-options" id="add-feedback"
                                                role="menu-items">Give us Feedbacks</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </span>
        </div>

        <!-- <div class="path-container" id="path_container">
            <div class="path-contents">
                <a href="#">Nepal</a> ><a href="#"> <?php echo $district; ?></a>>
            </div>
        </div> -->

        <div class="picture-container">
            <div class="picture-box">
                <img class="picture" src="<?php echo $selected_district_data_row['d_image'] ?>"
                    alt="This is <?php echo $selected_district_data_row['d_name'] ?> district's picture" />
            </div>
        </div>



        <div class="info-container">
            <div class="info-grid">
                <div class="geo-desc">
                    <div class="info-about">About
                        <?php echo $selected_district_data_row['d_name'] ?>
                    </div>
                    <div class="info-desc">
                        <?php echo $selected_district_data_row['d_desc'] ?>
                    </div>
                </div>
            </div>
        </div>

        <?php $district_url = "attractions_list.php?destination=district"; ?>
        <?php $place_url = "attractions_list.php?district=" . $selected_district_data_row['d_name'] . "&&destination=place"; ?>
        <?php $accommodation_url = "attractions_list.php?district=" . $selected_district_data_row['d_name'] . "&&destination=accommodation"; ?>
        <?php $restaurant_url = "attractions_list.php?district=" . $selected_district_data_row['d_name'] . "&&destination=restaurant"; ?>
        <?php $cafe_url = "attractions_list.php?district=" . $selected_district_data_row['d_name'] . "&&destination=cafe"; ?>
        <?php //include "include/feed_container.inc.php" ?>
        <?php include "include/feeds/district_feed.inc.php" ?>
        <?php include "include/feeds/place_feed.inc.php" ?>
        <?php include "include/feeds/accommodation_feed.inc.php" ?>
        <?php include "include/feeds/restaurant_feed.inc.php" ?>
        <?php include "include/feeds/cafe_feed.inc.php" ?>
    </main>

    <footer>
        <?php include "include/footer.inc.php"; ?>
    </footer>

    <script src="./script/reload_animation.js"></script>

    <script>
        function toggleMenu() {
            var x = document.getElementById("more-menu");
            console.log(x.style.display);
            if (x.style.display === "none" || x.style.display === "") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function scrollContent(scrollAmount, action) {
            const scrollContainer = document.querySelector('#container-' + action);
            const scrollContent = document.querySelector('#content-' + action);
            const scrollPosition = scrollContainer.scrollLeft;
            const scrollStep = scrollContent.clientWidth / 3;

            scrollContainer.scrollBy({
                left: scrollStep * scrollAmount,
                behavior: 'smooth'
            });
        }

    </script>
    <script src="./script/ajax_script/like_update.js"></script>
    <?php include "include/like_update_reload.inc.php"; ?>
</body>

</html>