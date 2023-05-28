let e_name,e_email,e_pass,e_cpass,e_city,e_district;

function namevalid() {
    let e_name=0;
    console.log(e_name);
    var name = document.getElementById("name").value;
    name_regex = /^[a-zA-Z\s]+$/;
    if (!name_regex.test(name)) {
        document.getElementById("name_err").innerHTML = "**Invalid Name <br> (Your name must contains a-z, A-Z only)";
        let e_name=1;
    }
    else
        document.getElementById("name_err").innerHTML = " ";
}

function emailvalid() {
    let e_email=0;
    var email = document.getElementById("reg_email").value;
    email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email_regex.test(email)) {
        document.getElementById("email_err").innerHTML = "**Invalid email <br> (Email must be in format of \"email@example.com\").";
        let e_email=1;
    }
    else
        document.getElementById("email_err").innerHTML = " ";
}

function passvalid() {
    let e_pass=0;
    var pass = document.getElementById("reg_password").value;
    var pass_regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]+$/;
    if (/\s+/g.test(pass)) {
        document.getElementById("pass_err").innerHTML = "**Invalid password format <br> (Password shouldn't contain whitespaces)";
        let e_pass=1;
    }
    else if (!pass_regex.test(pass)) {
        document.getElementById("pass_err").innerHTML = "**Invalid password format <br> (Password should contain atleast one number <br> and one special character)";
        let e_pass=1;
    }
    else {
        if (pass.length < 8){
            document.getElementById("pass_err").innerHTML = "**Invalid password format <br> (Password must be atleast 8 characters)";
            let e_pass=1;
        }
        else if (pass.length > 16){
            document.getElementById("pass_err").innerHTML = "**Invalid password format <br> (Password must be atmost 16 characters)";
            let e_pass=1;
        }
        else
            document.getElementById("pass_err").innerHTML = " ";
    }
}

function cpassvalid() {
    let e_cpass=0;
    var pass = document.getElementById("reg_password").value;
    console.log(pass);
    var cpass = document.getElementById("reg_cpassword").value;
    console.log(cpass);
    if (!(cpass == pass)) {
        document.getElementById("cpass_err").innerHTML = "Invalid password <br> (Password must match.)";
        let e_cpass=1;
    }
    else {
        document.getElementById("cpass_err").innerHTML = " ";
    }
}

function dobvalid(){
    var current_date = new Date();
    
    var current_day = current_date.getDate();
    var current_month = current_date.getMonth() + 1;//month starts with 0
    var current_year = current_date.getFullYear();
    
    // console.log(current_year+"-"+current_month+"-"+current_day);
    document.getElementById("reg_date").value=dateFormat(current_day,current_month,(current_year-18));
    document.getElementById("reg_date").max=dateFormat(current_day,current_month,(current_year-18));
    document.getElementById("reg_date").min=dateFormat(current_day,current_month,(current_year-100));

    function dateFormat(current_day,current_month,current_year) {
        return[
            current_year,
            current_month.toString().padStart(2, '0'),//The padTo2Digits function takes care of adding a leading zero if 
            current_day.toString().padStart(2, '0'),// the values for the month or day of the month are a single digit (are less than 10).
        ].join('-');
    }
}


function city_addressvalid() {
    let e_city=0;
    var city=document.getElementById("address_city").value;
    city_regex=/^[A-Za-z0-9'\.\-\s\,]+$/g;
    if (!city_regex.test(city)) {
        document.getElementById("address_err").innerHTML="**Invalid city address format <br>(City address only contains [a-z,A-Z,0-9,'.','-',',']";
        let e_city=1;
    }
    else{
        document.getElementById("address_err").innerHTML=" ";
    }
}
function district_addressvalid() {
    let e_district=0;
    var district=document.getElementById("address_district").value;
    district_regex=/^[A-Za-z\s]+$/g;
    if (!district_regex.test(district)) {
        document.getElementById("address_err").innerHTML="**Invalid district address format <br>(District address only contains [a-z,A-Z])";
        let e_district=1;
    }
    else{
        document.getElementById("address_err").innerHTML=" ";
    }
}