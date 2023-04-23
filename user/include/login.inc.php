<div class="container">
      <div class="login-page">
        <div class="login-opt">
          <p class="opt" id="opt-login" onclick="login()">Login</p>
          <p class="opt" id="opt-reg" onclick="register();">Register</p>
        </div>
        <!-- This is login Section -->
        <form action="" class="login-form">
          <div id="login" class="form-style">
            <label for="email" class="lbl">Email</label>
            <input
              type="email"
              placeholder="Enter your Email"
              id="login-email"
              class="text"
            />
            <label for="password" class="lbl">Password</label>
            <input
              type="password"
              placeholder="Enter your password"
              id="login-password"
              class="text password"
              onkeyup="passvalid();"
            />
            <div id="tick">
              <input
                type="checkbox"
                name="save"
                class="condition"
                id="save-password"
              /><label id="lbl-check">Remember password for next time</label>
            </div>
            <input type="submit" value="Login" id="login-btn" class="btn" onclick="loginvalid();" />
          </div>