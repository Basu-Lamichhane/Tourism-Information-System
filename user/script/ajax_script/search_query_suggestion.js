const SearchBar = document.getElementById('search');


const suggestionDiv = document.getElementById('suggestions_container');

SearchBar.addEventListener('focusin', function() {
  suggestionDiv.style.display = (suggestionDiv.style.display === 'none') ? 'block' : 'none';
});
SearchBar.addEventListener('focusout', function() {
  suggestionDiv.style.display = (suggestionDiv.style.display === 'none') ? 'block' : 'none';
});



function load_search_result(search_query) {
    var no_of_results = document.getElementById("no-of-results");
    var search_results=document.getElementById("changing_suggestions");
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
                
                var html='<div class="suggestions">';
                if (response.length > 0) {
                        for (let count = 0; count < response.length; count++) {
                            html+='<hr><a href="#" class="suggestion_container"><div class="suggestion-logo"><svg viewBox="0 0 24 24" width="24px" height="24px"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.497 4.612a.85.85 0 011.08 1.072l-5.055 15.29c-.254.769-1.337.781-1.608.019l-2.487-6.988-7.068-2.673c-.746-.282-.728-1.344.028-1.6l15.11-5.12zm-.754 1.84L6.586 10.57l5.653 2.138a.85.85 0 01.5.51l1.953 5.487L18.743 6.45z"></path></svg></div><div class="suggestion_details"><div class="suggestion-name">'+Object.values(response[count])[0]+'</div><div class="suggestion-address">'+Object.values(response[count])[1]+'</div></div></a>';
                        }
                    }
                else {
                            // html += "<a href=# class='list-result' disabled> No data found </a>";
                            html += "<a href=# class='suggestion_container'><div class='suggestion_name'> No data found </div></a>";
                    }
                    html+= '</div>';
                    search_results.innerHTML=html;
                    // console.log(search_results.innerHTML);
                // var html = "<div class='list-results'>";
                // html += "<table class='table-results'>";
                // html += "<thead><tr><th>S.N</th><th>Destination Name</th><th>Address</th><th>District</th><th>Types</th></tr></thead><tbody>";
                // if (response.length > 0) {
                //     for (let count = 0; count < response.length; count++) {
                //         html += "<tr><td>" + (count + 1) + "</td><td><a href=# class='list-result' disabled>" + Object.values(response[count])[0] + "</a></td><td>" + Object.values(response[count])[1] + "</td><td>" + Object.values(response[count])[2] + "</td><td>" + Object.values(response[count])[3] + "</td></tr>";
                //     }
                // }
                // else {
                //     html += "<a href=# class='list-result' disabled> No data found </a>";
                // }
                // html += "</tbody></table></div><br>";

                // document.getElementById("search_results").innerHTML = html;
            }
        }
    }
    else{
        no_of_results.innerHTML = 0;
        // document.getElementById("search_results").innerHTML = "";
        search_results.innerHTML="";
    }
    console.log(search_results.innerHTML);
}

