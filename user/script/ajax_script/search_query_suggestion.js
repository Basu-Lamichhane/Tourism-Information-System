function load_search_result(search_query){
    if(search_query.length > 2)
    {

        var dest_selected=document.getElementById("destination").value;
        var dist_selected=document.getElementById("district").value;
        var type_selected=document.getElementById("type").value;

        // console.log(dest_selected,dist_selected,type_selected);


        var form_data= new FormData();
        form_data.append("query",search_query);
        form_data.append("destination",dest_selected);
        form_data.append("district",dist_selected);
        form_data.append("type",type_selected);
        // console.log(form_data);


        var ajax_request =new XMLHttpRequest();
        ajax_request.open("POST","./ajax_processing/process_search_query.php");
        // console.log(form_data);
        ajax_request.send(form_data);

        ajax_request.onreadystatechange =function()
        {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                console.log(ajax_request.responseText);
                var response =JSON.parse(ajax_request.responseText);

                console.log(response);
                var html = "<div class='list-results'>";
                html+= "<table class='table-results'>";
                html+= "<thead><tr><th>S.N</th><th>Destination Name</th><th>address</th><th>district</th><th>type</th></tr></thead><tbody>";
                if(response.length > 0)
                    {
                        for (let count = 0; count < response.length; count++) {
                            html += "<tr><td>"+(count+1)+"</td><td><a href=# class='list-result' disabled>"+response[count].p_name+"</a></td><td>"+response[count].p_address+"</td><td>"+response[count].p_district+"</td><td>"+response[count].p_type+"</td></tr>";
                        }
                    }
                    else
                    {
                        html += "<a href=# class='list-result' disabled> No data found </a>";
                    }
                html+="</tbody></table></div><br>"; 

                document.getElementById("search_results").innerHTML=html;
            }   
        }
    }
    else
    {
        document.getElementById("search_results").innerHTML="";
    }
}

