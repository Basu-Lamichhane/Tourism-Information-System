function load_search_result(search_query){
    if(search_query.length > 2)
    {
        var form_data= new FormData();

        form_data.append("query",search_query);
        var ajax_request =new XMLHttpRequest();
        ajax_request.open("POST","./ajax_processing/process_search_query.php");
        ajax_request.send(form_data);

        ajax_request.onreadystatechange =function()
        {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                console.log(ajax_request.responseText);
                var response =JSON.parse(ajax_request.responseText);

                var html = "<div class='list-results'>";

                if(response.length > 0)
                    {
                        for (let count = 0; count < response.length; count++) {
                            html += "<a href=# class='list-results' disabled>"+response[count].p_name+"</a>";
                            
                        }
                    }
                    else
                    {
                        html += "<a href=# class='list-results' disabled> No data found </a>";
                    }
                html+="</div>";

                document.getElementById("search_result").innerHTML=html;
            }   
        }
    }
    else
    {
        document.getElementById("search_result").innerHTML="";
    }
}

