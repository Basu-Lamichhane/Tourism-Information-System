<?php
require "include/check_db.php";
?>

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
    <!-- <div class="label">
      <h1>Admin Login</h1>
    </div> -->
    <?php if (isset($_GET['err'])) {
      echo "<p class='error_text'>Please Login First</p>";
    } ?>
    <fieldset>
    <legend><h1>Admin Login</h1></legend>
      <form action="include/check_db.php">
        <div id="login" class="form_style">
          <label for="username" class="lbl">Enter Admin Username</label>
          <input type="text" placeholder="Username" id="login_email" class="text" name="email" />
          <label for="password" class="lbl">Enter Admin Password</label>
          <input type="password" placeholder="Password" id="login_password" class="text password" name="pass" />

          <input type="submit" value="Login" id="login_btn" class="login_btn" onClick="loginvalid();" />
          <!-- <p>
              Don't have an account?
              <a href="./register.php" style="text-decoration:underline;">Register</a> yourself
            </p> -->
    </fieldset>

  </div>
  </form>
  </div>
</body>

</html>