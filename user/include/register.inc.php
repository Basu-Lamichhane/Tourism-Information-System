<fieldset >
  <legend>Register</legend>
<form action="">
          <div id="register" class="form_style">
            <label for="name" class="lbl">Enter Your Name :</label>
            <input type="text" id="name" class="text" placeholder="Enter your name" onkeyup="namevalid();">
            <!-- <p id="name_err" class="error_style"></p> -->
            <label for="email" class="lbl">Enter Your Email :</label>
            <input
              type="email"
              placeholder="Enter your Email"
              id="reg_email"
              class="text"
            />
            <label for="password" class="lbl">Enter a Password :</label>
            <input
              type="password"
              placeholder="Enter your password"
              id="reg_password"
              class="text password"
            />
            <label for="cpassword" class="lbl">Confirm Password :</label>
            <input
              type="password"
              placeholder="Confirm Password"
              id="reg_cpassword"
              class="text password"
              onkeyup="cpassvalid();"
            />
            
            <label for="address">Address :</label>
            <input
              type="text"
              placeholder="Enter your address"
              id="address"
              class="text"
            />

            <div class="gender">
            <label>Choose Your Gender :</label>
            <div class="gender_options">
            <i><input type="radio" name="gender" id="reg_gender" value="Male"><span>Male</span></i>
            <i><input type="radio" name="gender" id="reg_gender" value="Female"><span>Female</span></i>
            </div>
            </div>
            <div class="reg_dob">
              <label>Date of Birth :</label>
              <input type="date" name="reg_date" id="reg_date">
            </div>
            <div id="tick">
              <input
                type="checkbox"
                name="terms"
                id="agree"
                class="condition"
              /><label class="reg_terms" id="lbl_check">Do you Agree?</label>
            </div>
            <input type="submit" value="Register" id="reg_btn" class="register_btn" onClick="registervalid();" />
            <p>

              Have an Account already? Login in <a href="./login.php" style="text-decoration:underline;">here</a>
            </p>
            
          </div>
        </form>
        </fieldset>
      </div>
    </div>