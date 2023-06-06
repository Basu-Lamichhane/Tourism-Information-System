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
        <div class="s010">
            <form>
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
                                    <select name="district" id="district" class="options">
                                        <option disabled selected value="">District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-select">
                                    <select name="destination" id="destination" class="options"
                                        onchange="javascript:(type_dropdown_options(this.value))">
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
                                    <select name="type" id="type" class="options">
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
                                    <button class="btn-delete" id="reset">RESET</button>
                                    <button class="btn-search">SEARCH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
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