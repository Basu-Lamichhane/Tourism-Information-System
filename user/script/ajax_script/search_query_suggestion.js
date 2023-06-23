


function load_search_result(search_query) {
    var no_of_results = document.getElementById("no-of-results");
    var search_results = document.getElementById("changing_suggestions");
    if (search_query.length > 0) {

        var dest_selected = document.getElementById("destination").value;
        var dist_selected = document.getElementById("district").value;
        var type_selected = document.getElementById("type").value;

        if (type_selected == "Types") {
            type_selected = "";
        }

        console.log(type_selected);

        var form_data = new FormData();
        form_data.append("query", search_query);
        form_data.append("destination", dest_selected);
        form_data.append("district", dist_selected);
        form_data.append("type", type_selected);
        // console.log(form_data);


        var ajax_request = new XMLHttpRequest();
        ajax_request.open("POST", "./ajax_processing/process_search_query.php");
        // console.log(form_data);
        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function () {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                console.log(ajax_request.responseText);
                // var response = ajax_request.responseText;
                var response = JSON.parse(ajax_request.responseText);


                var count = Object.keys(response).length;
                if (count > 0) {
                    no_of_results.innerHTML = count;
                }

                console.log(response);

                var place_logo = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24px" height="24px"><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm306.7 69.1L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"></path></svg>';

                var accommodation_logo = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 512 512"><path d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z"></path></svg>';

                var restaurant_logo = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 448 512"><path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"></path></svg>';

                var cafe_logo = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 640 512"><path d="M96 64c0-17.7 14.3-32 32-32H448h64c70.7 0 128 57.3 128 128s-57.3 128-128 128H480c0 53-43 96-96 96H192c-53 0-96-43-96-96V64zM480 224h32c35.3 0 64-28.7 64-64s-28.7-64-64-64H480V224zM32 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path></svg>';

                var html = '<div class="suggestions">';


                var destination_logo;
                if (response.length > 0) {
                    for (let count = 0; count < response.length; count++) {
                        //channging the logo according to the destination
                        console.log(Object.values(response[count])[4]);
                        switch(Object.values(response[count])[4]){
                            case "place":
                                destination_logo=place_logo;
                                break;
                            case "accommodation":
                                destination_logo=accommodation_logo;
                                break;
                            case "restaurant":
                                destination_logo=restaurant_logo;
                                break;
                            case "cafe":
                                destination_logo=cafe_logo;
                                break;
                            default:
                                console.log("destination logo error in search.php");
                        }
                        // 
                        html += '<hr><a href="#" class="suggestion_container"><div class="suggestion-logo">' + destination_logo + '</div><div class="suggestion_details"><div class="suggestion-name">' + Object.values(response[count])[0] + '</div><div class="suggestion-address">' + Object.values(response[count])[1] + '</div></div></a>';
                    }
                }
                else {
                    // html += "<a href=# class='list-result' disabled> No data found </a>";
                    html += "<a href=# class='suggestion_container'><div class='suggestion_name'> No data found </div></a>";
                }
                html += '</div>';
                search_results.innerHTML = html;
            }
        }
    }
    else {
        no_of_results.innerHTML = 0;
        // document.getElementById("search_results").innerHTML = "";
        search_results.innerHTML = "";
    }
    console.log(search_results.innerHTML);
}

