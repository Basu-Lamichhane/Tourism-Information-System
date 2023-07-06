<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="image/TN_favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="user/style/header_style.css">
    <link rel="stylesheet" href="user/style/reload_animation_style.css">
    <link rel="stylesheet" href="user/style/home_style.css">
    <title>Traverse Nepal - Discover, Explore, Experience !!!</title>
  </head>
  <body>
    <!-- Reload Animation -->
  <div id="loader-overlay">
        <img src="user/img/TN-reload-page-animation.gif" alt="Loading...">
    </div>

    <?php include "user/include/header.inc.php";?>

    <section class="home_page">
      <div class="home_left">
        <div class="home_left_content">
          <h1><span>J</span>oin Now</h1>
          <h4>To get your next destination planned...!</h4>
          <div class="home_left_buttons">
          <button id="home_login_btn"><a href="./login.php">Login</a></button>
          <div class="slash"></div>
          <button id="home_register_btn"><a href="./register.php">Register</a></button>
        </div>
        </div>
      </div>
      <div class="home_right">

        </div>
      </section>
      
      <script src="user/script/accountscript.js"></script>
      <script src="user/script/reload_animation.js"></script>
      <script src="user/script/home.js"></script>
      <script src="user/script/valid.js"></script>
  </body>
</html>
