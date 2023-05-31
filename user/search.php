<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="style/nav_style.css">
    <link rel="stylesheet" href="style/search.css">
</head>

<body>
    <?php include "include/nav.inc.php" ?>
    <div class="s010">
        <form>
            <div class="inner-form">
                <div class="basic-search">
                    <div class="input-field">
                        <input id="search" type="text" placeholder="Type Keywords"  onkeyup="javascript:(load_search_result(this.value))"/>
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
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">District</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Color</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Color</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Color</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Size</option>
                                    <option>Subject b</option>
                                    <option>Subject c</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <div class="result-count">
                                <span>108 </span>results
                            </div>
                            <div class="group-btn">
                                <button class="btn-delete" id="delete">RESET</button>
                                <button class="btn-search">SEARCH</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div id="search_result" class="search-suggestion"></div>
    </div>
    <script src="./script/search_query_suggestion.js"></script>
    <script>
        const customSelects = document.querySelectorAll("select");
        const deleteBtn = document.getElementById('delete')
        for (let i = 0; i < customSelects.length; i++) {
            customSelects[i].addEventListener('addItem', function (event) {
                if (event.detail.value) {
                    let parent = this.parentNode.parentNode
                    parent.classList.add('valid')
                    parent.classList.remove('invalid')
                }
                else {
                    let parent = this.parentNode.parentNode
                    parent.classList.add('invalid')
                    parent.classList.remove('valid')
                }
            }, false);
        }
        deleteBtn.addEventListener("click", function (e) {
            e.preventDefault()
            const deleteAll = document.querySelectorAll('.choices__button')
            for (let i = 0; i < deleteAll.length; i++) {
                deleteAll[i].click();
            }
        });

    </script>