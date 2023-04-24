<fieldset>
  <legend>Login</legend>
  <form action="">
    <div id="login" class="form_style">

      <!-- <p id="name_err" class="error_style"></p> -->
      <label for="email" class="lbl">Enter Your Email</label>
      <input type="email" placeholder="Enter your Email" id="login_email" class="text" />
      <label for="password" class="lbl">Enter your Password</label>
      <input type="password" placeholder="Enter your password" id="login_password" class="text password" />

      <input type="submit" value="Login" id="login_btn" class="login_btn" onClick="loginvalid();" />
      <p>
        Don't have an account?
        <a href="./register.php" style="text-decoration:underline;">Register</a> yourself
      </p>

    </div>
  </form>
</fieldset>
</div>
</div>