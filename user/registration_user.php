<?php
$re = "Checking....";
$con = new mysqli('localhost', 'root', '', 'TIS');
if ($con->connect_error) {
    die("Connection Error");
} else {
    if (isset($_POST['insertbtn'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $qry = "insert into user_ac(user_name,user_dob,user_gender,user_address,user_email,user_password,user_phone) values('$name','$dob','$gender','$address','$email','$password','$phone')";
        $result = $con->query($qry);
        if ($result) {
            $re = "Data Inserted Sucessfully";
        } else {
            $re = "Data insertion failed";
        }
    }

}
?>
<html>

<head>
    <title>Insert</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        html {
            font-size: 90%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            flex-direction: column;
            width: 100vw;
            height: 100vh;

        }

        .form_container {
            width: 290px;
            height: 800px;
            padding: 0 1rem;
            border-radius: 3 px;
            border: 1px solid;
            display: flex;
            align-items: center;
            flex-direction: column;
            margin: auto;
            position: relative;
            overflow: hidden;
        }

        label {
            display: block;
            font-size: 13px;
        }

        input {
            border: none;
            outline: none;
        } */
    </style>
</head>

<body>
    <div class="form_container">
        <div class="overlay">
            <!-- This will have no content -->
        </div>
        <div class="titleDiv">
            <h1 class="title">Hello There...</h1>
            <span class="subTitle">Register yourself</span>
        </div>
        <form method="POST">
            <div class="row">
                <label for="name">Name: </label>
                <input type="text" name="name" placeholder="Insert your name here" required>
                <br>
                <br>
            </div>

            <div class="row">
                <label for="gender" class="gender">Gender:</label>
                <input type="radio" name="gender" value="male" required>
                <label for="male" class="gender">Male</label>
                <input type="radio" name="gender" value="female" required>
                <label for="female" class="gender">Female</label>
                <br>
                <br>
            </div>

            <div class="row">
                <label for="dob">DOB:</label>
                <input type="date" name="dob" required>
                <br>
                <br>
            </div>


            <div class="row">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" placeholder="Insert your phone no. here" required>
                <br>
                <br>
            </div>

            <div class="row">
                <label for="address">Address:</label>
                <input type="text" name="address" placeholder="Insert your address here" required>
                <br>
                <br>
            </div>


            <div class="row">
                <label for="email">email:</label>
                <input type="email" name="email" placeholder="Insert your email here" required>
                <br>
                <br>
            </div>


            <div class="row">
                <label for="password">Password:</label>
                <input type="password" name="password" required placeholder="Enter your password here">
                <br>
                <br>
            </div>

            <div class="row">
                <input type="submit" name="insertbtn" value="register">
                <br>
                <br>
                <br>
            </div>

            <span class="loginlink">
                Had an account already?
                <br>
                <a href="login1.php">Login here</a>
            </span>


        </form>
    </div>
    <br>
    <p>
        <?php echo $re; ?>
    </p>
</body>

</html>