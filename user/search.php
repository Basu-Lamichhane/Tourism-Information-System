<?php
require "include/dbconn.inc.php";
$district = "";
$district = $place_selected = $accommodation_selected = $restaurant_selected = $cafe_selected = "";

if (isset($_GET['district'])) {
    $district = $_GET['district'];


    $district_query = "select * from tbl_district where d_name!='" . $district . "';";
    $district_result = $con->query($district_query);

    $place_query = "select * from tbl_place where p_district='" . $district . "';";
    $place_result = $con->query($place_query);

    $accommodation_query = "select * from tbl_accommodation where a_district='" . $district . "';";
    $accommodation_result = $con->query($accommodation_query);

    $restaurant_query = "select * from tbl_restaurant where r_district='" . $district . "';";
    $restaurant_result = $con->query($restaurant_query);

    $cafe_query = "select * from tbl_cafe where c_district='" . $district . "';";
    $cafe_result = $con->query($cafe_query);
} else {

    // for district feed updates
    $district_query = "select * from tbl_district;";
    $district_result = $con->query($district_query);

    $place_query = "select * from tbl_place;";
    $place_result = $con->query($place_query);

    $accommodation_query = "select * from tbl_accommodation;";
    $accommodation_result = $con->query($accommodation_query);

    $restaurant_query = "select * from tbl_restaurant;";
    $restaurant_result = $con->query($restaurant_query);

    $cafe_query = "select * from tbl_cafe;";
    $cafe_result = $con->query($cafe_query);
}
include "/include/star_rating.inc.php";
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Traverse Nepal</title>
    <link rel="icon" href="../image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/nav_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <!-- <link rel="stylesheet" href="style/district_page_style.css"> -->
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <link rel="stylesheet" href="style/feed_container_style.css">
    <link rel="stylesheet" href="style/reload_animation_style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

<body onload="javascript:(district_dropdown_options())">
    <!-- Reload Animation -->
    <div id="loader-overlay">
        <img src="./img/TN-reload-page-animation.gif" alt="Loading...">
    </div>
    <!-- Reload Animation -->

    <header>
        <div class="header-container">
            <nav class="nav-container">
                <a class="logo-container" href="./search.php">
                    <picture>
                        <img src="./img/logo.png" alt="Traverse Nepal" class="logo">
                    </picture>
                </a>

                <div class="navbar-container">
                    <div class="nav-menus">
                        <a href="#" class="nav-menu">
                            <svg viewBox="0 0 24 24" width="24px" height="24px">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.798 5.786A5.769 5.769 0 017.72 4.25c1.455 0 2.857.548 3.922 1.536l.005.005.341.322.332-.317a5.769 5.769 0 013.928-1.54c1.458 0 2.862.55 3.928 1.54l.004.004c1.093 1.032 1.599 2.324 1.569 3.662-.03 1.323-.578 2.643-1.5 3.785-.884 1.096-2.85 2.943-4.547 4.478a183.566 183.566 0 01-3.153 2.785l-.069.059-.489-.569.49.569-.486.416-.488-.412a101.98 101.98 0 01-7.75-7.288l-.021-.021-.02-.023c-1.725-2.115-2.203-5.32.08-7.453l.002-.002zm8.19 13.226a174.415 174.415 0 002.708-2.4c1.72-1.556 3.59-3.32 4.385-4.306.757-.939 1.148-1.948 1.168-2.877.02-.912-.313-1.795-1.097-2.536a4.269 4.269 0 00-2.904-1.138 4.269 4.269 0 00-2.903 1.136l-1.35 1.292-1.375-1.3a4.269 4.269 0 00-2.9-1.133 4.269 4.269 0 00-2.901 1.135c-1.507 1.408-1.353 3.659.042 5.385a100.45 100.45 0 007.127 6.742z">
                                </path>
                            </svg>
                            <span class="menu-name">
                                Trips
                            </span>
                        </a>
                        <a href="#" class="nav-menu">
                            <svg viewBox="0 0 24 24" width="24px" height="24px">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2.25a.75.75 0 01.75.75v1.283c1.865.168 3.412.964 4.529 2.218 1.254 1.409 1.922 3.343 1.956 5.487.013.811.015 4.106.015 5.762H21v1.5h-5.336c-.063.31-.172.694-.368 1.085-.232.464-.592.951-1.146 1.32-.558.372-1.269.595-2.15.595s-1.592-.223-2.15-.595a3.382 3.382 0 01-1.146-1.32 4.378 4.378 0 01-.368-1.085H3v-1.5h1.75c0-1.651.002-4.932.015-5.755C4.76 9.843 5.43 7.907 6.694 6.5 7.82 5.245 9.384 4.45 11.25 4.283V3a.75.75 0 01.75-.75zm-5.75 15.5h11.5c0-1.657-.002-4.94-.015-5.738-.03-1.856-.604-3.422-1.576-4.513C15.196 6.418 13.799 5.75 12 5.75c-1.8 0-3.218.67-4.19 1.751-.98 1.09-1.552 2.651-1.545 4.496v.015a748.17 748.17 0 00-.015 5.738zm3.632 1.5c.04.135.094.276.164.415.143.286.346.549.636.742.285.19.7.343 1.318.343.619 0 1.033-.152 1.318-.343.29-.193.493-.456.636-.742a2.7 2.7 0 00.164-.415H9.883z">
                                </path>
                            </svg>
                            <span class="menu-name">
                                Review
                            </span>
                        </a>

                        <div class="profile-container">
                            <a href="#">
                                <picture class="profile-pic">
                                    <img src="https://media-cdn.tripadvisor.com/media/photo-l/1a/f6/f1/b8/default-avatar-2020-22.jpg"
                                        alt="Profile pic">
                                </picture>
                            </a>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>

        <div class="search-container" id="sticky-div">

            <div class="title" id="menu-title">
                <i class="title-text" id="discover">Discover</i>,&nbsp;
                <i class="title-text" id="explore">Explore</i>,&nbsp;
                <i class="title-text" id="experience">Experience</i>&nbsp;!!!
            </div>
            <span>

                <div class="menu">
                    <div class="menu-container">
                        <div class="menu-box">
                            <a href="#" class="menu-content"
                                onclick="SearchBar.focus(),destination_option.options[1].selected = true;">
                                <span class="name">Attractions/Places</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        width="24px"
                                        height="24px"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm306.7 69.1L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                                    </svg></span>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="#" class="menu-content"
                                onclick="SearchBar.focus(),destination_option.options[2].selected = true;">
                                <span class="name">Accommodation</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        width="24px"
                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z" />
                                    </svg></span>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="#" class="menu-content"
                                onclick="SearchBar.focus(),destination_option.options[3].selected = true;">
                                <span class="name">Restaurants</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        width="24px"
                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                                    </svg></span>
                            </a>
                        </div>
                        <div class="menu-box">
                            <a href="#" class="menu-content"
                                onclick="SearchBar.focus(),destination_option.options[4].selected = true;">
                                <span class="name">cafes</span>
                                <span class="blank"></span>
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        width="24px"
                                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M96 64c0-17.7 14.3-32 32-32H448h64c70.7 0 128 57.3 128 128s-57.3 128-128 128H480c0 53-43 96-96 96H192c-53 0-96-43-96-96V64zM480 224h32c35.3 0 64-28.7 64-64s-28.7-64-64-64H480V224zM32 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                    </svg></span>
                            </a>
                        </div>

                    </div>
                </div>
        </div>
        </div>
        </span>
        </div>

        <div class="s010">
            <form id="search-form">
                <div class="inner-form">
                    <div class="basic-search">
                        <div class="input-field">
                            <input id="search" type="text" placeholder="Type Keywords"
                                onkeyup="javascript:(load_search_result(this.value))" />
                            <div class="icon-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="advance-search">
                        <span class="desc">ADVANCED SEARCH</span>
                        <div class="row">
                            <div class="input-field">
                                <div class="input-select">
                                    <select name="district" id="district" class="options"
                                        onchange="javascript:(load_search_result(SearchBar.value))">
                                        <option disabled selected value="">District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-select">
                                    <select name="destination" id="destination" class="options"
                                        onchange="javascript:(type_dropdown_options(this.value),load_search_result(SearchBar.value))">
                                        <option disabled selected value="">Destinations</option>
                                        <option value="place" id="place">Places</option>
                                        <option value="accommodation" id="accommodation">Accommodations</option>
                                        <option value="restaurant" id="restaurant">Restaurants</option>
                                        <option value="cafe" id="cafe">Cafes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-select">
                                    <select name="type" id="type" class="options"
                                        onchange="javascript:(load_search_result(SearchBar.value))">
                                        <option disabled selected value="">Types</option>
                                        <!-- <option disabled selected value="">Types</option> -->
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="input-field">
                            <div class="input-select">
                                <select name="price" id="price">
                                <option disabled selected>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                </select>
                            </div>
                        </div> -->
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <div class="result-count">
                                    <span id="no-of-results">0</span>results
                                </div>
                                <div class="group-btn">
                                    <button class="btn-delete search-page-btn" id="reset"
                                        onclick="javascript:resetBtn(); return false;">RESET</button>
                                    <button class="btn-search search-page-btn" onclick="window.location.href='/attractions_list.php';
                                    console.log('basu');">SEARCH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
        </div>

        <div class="typeahead_suggestions_container" id="suggestions_container" style="display: none;">

            <div class="nearby_search">
                <a href="?nearby=True" class="suggestion_container" id="location-link";>
                    <div class="suggestion-logo">
                        <svg viewBox="0 0 24 24" width="24px" height="24px">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.497 4.612a.85.85 0 011.08 1.072l-5.055 15.29c-.254.769-1.337.781-1.608.019l-2.487-6.988-7.068-2.673c-.746-.282-.728-1.344.028-1.6l15.11-5.12zm-.754 1.84L6.586 10.57l5.653 2.138a.85.85 0 01.5.51l1.953 5.487L18.743 6.45z">
                            </path>
                        </svg>
                    </div>
                    <div class="suggestion_details">
                        <div class="suggestion-name">
                            Nearby
                        </div>
                        <div class="suggestion-address">
                            <?php echo "Current Address"; ?>
                        </div>
                    </div>
                </a>
            </div>

            <div class="search_suggestions_container" id="changing_suggestions">


            </div>


        </div>

        <div id="search_results" class="search-suggestion"></div>

        <div class="picture-container">
            <div class="picture-box">
                <img class="picture"
                    src="https://res.klook.com/image/upload/q_85/c_fill,w_750/v1595073504/blog/dmida4bcnbnrejsq7lyw.jpg"
                    alt="This is my picture" />
            </div>
        </div>


        <div class="info-container">
            <div class="info-grid">
                <div class="geo-desc">
                    <div class="info-about">About Nepal</div>
                    <div class="info-desc">Nepal, located in South Asia, is a land of diverse landscapes, rich cultural
                        heritage, and breathtaking natural beauty. It is known for its majestic Himalayan mountain
                        range, including the world's highest peak, Mount Everest. Nepal offers a captivating blend of
                        adventure, spirituality, and serenity, making it a popular destination for travelers from around
                        the globe.</div>
                </div>
            </div>
        </div>

        <?php $district_url = "attractions_list.php?destination=district"; ?>
        <?php $place_url = "attractions_list.php?destination=place"; ?>
        <?php $accommodation_url = "attractions_list.php?destination=accommodation"; ?>
        <?php $restaurant_url = "attractions_list.php?destination=restaurant"; ?>
        <?php $cafe_url = "attractions_list.php?destination=cafe"; ?>

        <?php include "include/feeds/district_feed.inc.php" ?>
        <?php include "include/feeds/place_feed.inc.php" ?>
        <?php include "include/feeds/accommodation_feed.inc.php" ?>
        <?php include "include/feeds/restaurant_feed.inc.php" ?>
        <?php include "include/feeds/cafe_feed.inc.php" ?>
    </main>

    <!-- including footer.inc.php -->
    <footer>
        <?php include 'include/footer.inc.php'; ?>
    </footer>

    <script src="./script/jquery.js"></script>
    <script src="./script/reload_animation.js"></script>
    <script src="./script/ajax_script/search_query_suggestion.js"></script>
    <script src="./script/ajax_script/select_options.js"></script>
    <script src="./script/search.js"></script>
    <script>
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
        // Feature detection using 'navigator.geolocation'
        // if ('geolocation' in navigator) {
        //     // Geolocation API is supported, you can use it here

        //     const locationLink = document.getElementById('location-link');
        //     console.log('obtained');
        //     locationLink.addEventListener('click', getLocation);

        //     function getLocation(event) {
        //         event.preventDefault();  

        //         var cords=navigator.geolocation.getCurrentPosition(showPosition);
        //         console.log('basu');
        //         console.log(cords);
        //     }
            
        //     function showPosition(position) {
        //         const latitude = position.coords.latitude;
        //         const longitude = position.coords.longitude;
                
        //         console.log('Latitude: ' + latitude);
        //         console.log('Longitude: ' + longitude);
        //         return(latitude, longitude);

        //         // You can perform additional actions with the location data, such as sending it to a server or updating the webpage.
        //     }
        // } else {
        //     // Geolocation API is not supported, handle the absence of this feature
        //         console.log('Geolocation API is not supported');
        //     // You can provide an alternative experience or fallback here, such as displaying a message or using a different method to obtain location information.
        // }

    </script>
</body>

</html>