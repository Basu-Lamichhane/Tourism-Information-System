<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style/login_style.css">
</head>
<body>
    <nav class="nav_admin">
         <img src="./img/logo.png" alt="">
    </nav>
    <div class="login_container">
      <div class="label"><h1>Admin Login</h1></div>
  <form action="include/check_db.php">
    <div id="login" class="form_style">
      <label for="email" class="lbl">Enter Admin Username</label>
      <input type="email" placeholder="Username" id="login_email" class="text" />
      <label for="password" class="lbl">Enter Admin Password</label>
      <input type="password" placeholder="Password" id="login_password" class="text password" />

      <input type="submit" value="Login" id="login_btn" class="login_btn" onClick="loginvalid();" />
      <!-- <p>
        Don't have an account?
        <a href="./register.php" style="text-decoration:underline;">Register</a> yourself
      </p> -->

    </div>
  </form>
  </div>
</body>
</html>