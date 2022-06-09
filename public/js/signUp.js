
// inputs :
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("Password");
const cPassword = document.getElementById("cPassword");

// Empty divs :
const userError = document.getElementById("usernameError");
const emailError = document.getElementById("emaiError");
const passwordError = document.getElementById("passwordError");
const cPasswordError = document.getElementById("confirmPerror");
const submitError = document.getElementById("submitError");

// Creating two icons and adding to them some classes and one attribute
let eyeCp = document.createElement('i');
let eyeMaskCp = document.createElement('i');

// onload event , focuses on username input
window.onload = function () {
  username.focus();
};

function validateUserName() {
  // input value :
  let usernameV = username.value;

  if (usernameV.length === 0) {
    userError.innerText = "Username is required";
    username.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  if (!usernameV.match(/^[a-zA-Z\s]{3,20}$/)) {
    userError.innerText =
      "Only letters between 3 and 20";
    username.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  username.setAttribute("style","border-bottom : 2px solid black");
  userError.innerText = "";
  return true;
}

function validateEmail() {
    // input value :
    let emailV = email.value;
  
    if (emailV.length === 0) {
      emailError.innerText = "Email is required";
      email.setAttribute("style", "border-bottom : 2px solid red");
      return false;
    }
    if (!emailV.match(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z]+$/)) {
      emailError.innerText =
        "Try something like letters between 3 and 20";
      email.setAttribute("style", "border-bottom : 2px solid red");
      return false;
    }
    email.setAttribute("style","border-bottom : 2px solid black");
    emailError.innerText = "";
    return true;
  }

function validatePassword() {
  // input value :
  let passwordV = password.value;


  if (passwordV.length === 0) {
    passwordError.innerText = "Password is required";
    password.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  if (passwordV.length < 6) {
    passwordError.innerText = "At least 6 Chars";
    password.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  if (passwordV.length > 30) {
    passwordError.innerText = "Must be less than 30 Chars";
    password.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  passwordError.innerText = "";
  return true;
}

function validateCPassword() {
  // inputs values :
  let passwordV = password.value;
  let cPasswordV = cPassword.value;

  if (cPasswordV.length === 0 || passwordV !== cPasswordV) {
    cPasswordError.innerText = "Should Match Password Value";
    cPassword.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  cPasswordError.innerText = "";
  return true;
}

function validateForm() {
  if (!validateUserName() || !validatePassword() || !validateCPassword()) {
    submitError.innerText = "Please Fix Error To Submit";
    setTimeout(function () {
      submitError.style.display = "none";
    }, 2500);
    return false;
  } else {
    return true;
  }
}

eyeCp.classList.add('bi','bi-eye','passw-eye');
eyeCp.setAttribute("onclick","toogleEyePassword()");
eyeMaskCp.classList.add('bi','bi-eye-slash','passw-mask-eye');
eyeMaskCp.setAttribute("onclick","toogleEyePassword()");

//First value in state is false :
let state = false ;
    function toogleEyePassword(){
            if(state){
                document.getElementById('Password').setAttribute("type","password");
                document.getElementById('cPassword').setAttribute("type","password");
                 document.querySelector('.passw-eye').remove();
                 document.getElementById('CopasswordContaSignUp').append(eyeMaskCp);
                state = false ;
            }else{
                document.getElementById('Password').setAttribute("type","text");
                document.getElementById('cPassword').setAttribute("type","text");
                document.querySelector('.passw-mask-eye').remove();
                document.getElementById('CopasswordContaSignUp').append(eyeCp);
                state = true;
            }
    }