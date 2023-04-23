 <form action="" class="login-form">
          <div id="register" class="form-style">

            <label for="name" class="lbl">Name</label>
            <input type="text" id="name" class="text" placeholder="Enter your name" onkeyup="namevalid();">
            <!-- <p id="name_err" class="error_style"></p> -->
            <label for="email" class="lbl">Email</label>
            <input
              type="email"
              placeholder="Enter your Email"
              id="reg-email"
              class="text"
            />
            <label for="email" class="lbl">Confirm-Email</label>
            <input
              type="email"
              placeholder="Enter your Email"
              id="cemail"
              class="text"
            />
            <label for="password" class="lbl">Password</label>
            <input
              type="password"
              placeholder="Enter your password"
              id="reg-password"
              class="text password"
            />
            <label for="cpassword" class="lbl">Confirm-Password</label>
            <input
              type="password"
              placeholder="Enter your password"
              id="cpassword"
              class="text password"
              onkeyup="cpassvalid();"
            />
            <div id="tick">
              <input
                type="checkbox"
                name="terms"
                id="agree"
                class="condition"
              /><label id="lbl-check">Do you Agree</label>
            </div>
            <input type="submit" value="Register" id="reg-btn" class="btn" onClick="registervalid();" />
          </div>
        </form>
      </div>
    </div>