<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="style/nav_style.css">
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="style/footer_style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

<body onload="javascript:(district_dropdown_options())">
    <header>
        <?php include "include/nav.inc.php" ?>
    </header>
    <main>

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
                            <a href="#" class="menu-content" onclick="SearchBar.focus(),destination_option.options[1].selected = true;">
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
                            <a href="#" class="menu-content" onclick="SearchBar.focus(),destination_option.options[2].selected = true;">
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
                            <a href="#" class="menu-content" onclick="SearchBar.focus(),destination_option.options[3].selected = true;">
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
                            <a href="" class="menu-content" onclick="SearchBar.focus(),destination_option.options[4].selected = true;">
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
                                    <select name="district" id="district" class="options" onchange="javascript:(load_search_result(SearchBar.value))">
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
                                    <select name="type" id="type" class="options" onchange="javascript:(load_search_result(SearchBar.value))">
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
                                    <button class="btn-delete" id="reset" onclick="javascript:resetBtn(); return false;">RESET</button>
                                    <button class="btn-search">SEARCH</button>
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
                <a href="#" class="suggestion_container">
                    <div class="suggestion-logo">
                        <svg viewBox="0 0 24 24" width="24px" height="24px"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.497 4.612a.85.85 0 011.08 1.072l-5.055 15.29c-.254.769-1.337.781-1.608.019l-2.487-6.988-7.068-2.673c-.746-.282-.728-1.344.028-1.6l15.11-5.12zm-.754 1.84L6.586 10.57l5.653 2.138a.85.85 0 01.5.51l1.953 5.487L18.743 6.45z"></path></svg>
                    </div>
                    <div class="suggestion_details">
                        <div class="suggestion-name">
                            Nearby
                        </div>
                        <div class="suggestion-address">
                            <?php echo "Current Address";?>    
                        </div>
                    </div>
                </a>
            </div>

            <div class="search_suggestions_container" id="changing_suggestions">


            </div>

            <div></div>
            
            <hr>
        </div>

        <div id="search_results" class="search-suggestion"></div>
    </main>

    <!-- including footer.inc.php -->
    <footer>
        <?php include 'include/footer.inc.php'; ?>
    </footer>

    <script src="./script/jquery.js"></script>
    <script src="./script/ajax_script/search_query_suggestion.js"></script>
    <script src="./script/ajax_script/select_options.js"></script>
    <script src="./script/search.js"></script>
</body>

</html>