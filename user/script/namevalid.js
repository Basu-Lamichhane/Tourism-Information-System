function namevalid() {
  let name = document.getElementById("name");
  // let name_err = document.getElementById("name_err");
  let err = document.getElementById("error-text");
  let str = "Name";
  if (!name.value) {
    name.classList.add("error-box");
    err.innerHTML = str + " cannot be empty";
    name.insertAdjacentElement("afterend", err);
  } else {
    if (/\d/.test(name.value)) {
      name.classList.add("error-box");
      err.innerHTML = str + " is not valid";
      name.insertAdjacentElement("afterend", err);
      // name_err.innerHTML = "Enter a valid name";
    } else {
      name.classList.remove("error-box");
      err.innerHTML = "";
    }
  }
}

function passvalid() {
  let str = "Password";
  let err = document.getElementById("error-text");
  let pass = document.getElementById("login-password");
  if (!pass.value) {
    pass.classList.add("error-box");
    err.innerHTML = str + " is empty";
    pass.insertAdjacentElement("afterend", err);
  } else {
    if (pass.value.length < 8) {
      pass.classList.add("error-box");
      err.innerHTML = str + " is less than 8 character";
      pass.insertAdjacentElement("afterend", err);
    } else {
      if (/[" "]/.test(pass.value)) {
        pass.classList.add("error-box");
        err.innerHTML = "Space is not allowed";
        pass.insertAdjacentElement("afterend", err);
      } else {
        pass.classList.remove("error-box");
        err.innerHTML = "";
      }
    }
  }
}

function cpassvalid() {
  let pass = document.getElementById("reg-password");
  let cpass = document.getElementById("cpassword");
  let err = document.getElementById("error-text");
  if (cpass.value != pass.value) {
    cpass.classList.add("error-box");
    err.innerHTML = " Password doesn't match";
    cpass.insertAdjacentElement("afterend", err);
  } else {
    cpass.classList.remove("error-box");
    err.innerHTML = "";
  }
}

function routevalid() {
  let err = document.getElementById("error-text");
  let pass = document.getElementById("login-password");
  let email = document.getElementById("login-email");
  if (!pass.value && !email.value) {
    alert("Email and password is empty");
  } else if (!pass.value) {
    alert("Password is empty");
  } else {
    alert("Email is empty");
  }
}
