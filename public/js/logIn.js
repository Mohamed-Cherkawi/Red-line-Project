  // Form Resubmission
  if(window.history.replaceState) {
    window.history.replaceState(null , null ,window.location.href);
  }
// inputs :
const email = document.getElementById("email");
const password = document.getElementById("password");

// Empty divs :
const emailError = document.getElementById("emaiError");
const passwordError = document.getElementById("passwordError");
const submitError = document.getElementById("submitError");

// onload event , focuses on username input
window.onload = function () {
  email.focus();
};


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
        "Unvalaible Emai Syntax";
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
    passwordError.innerText = "At least 6 Chars !?";
    password.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  if (passwordV.length > 50) {
    passwordError.innerText = "Must be less than 50 !?";
    password.setAttribute("style", "border-bottom : 2px solid red");
    return false;
  }
  passwordError.innerText = "";
  return true;
}


function validateForm() {
  if (!validatePassword() || !validateEmail()) {
    submitError.innerText = "Please Fix Error To Submit";
    setTimeout(function () {
      submitError.style.display = "none";
    }, 2500);
    return false;
  } else {
    return true;
  }
}