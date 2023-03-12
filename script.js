let loginButton = document.getElementById("header_login_button");
let loginFormToSignupFormToggle = document.getElementById('login-form-button-to-signup');
let signupFormToLoginFormToggle = document.getElementById('signup-form-button-to-login');


let loginForm = document.getElementById('login-form');
let signupForm = document.getElementById('signup-form');

let image_loader = document.getElementById('load_new_images');
let image_cont = document.getElementById('images-container');

let logout = document.getElementById('header_logout_button');

if(loginButton != undefined)
{
    loginButton.onclick = function() {
        loginForm.style.visibility = "visible";
    }   
}
loginFormToSignupFormToggle.onclick = function() {
    loginForm.style.visibility = "hidden";
    signupForm.style.visibility = "visible";
}

signupFormToLoginFormToggle.onclick = function() {
    signupForm.style.visibility = "hidden";
    loginForm.style.visibility = "visible";
}

loginForm.addEventListener('submit', login_submit);
function login_submit(event) {
  let registerForm = new FormData(loginForm);
    fetch('auth.php', {
     method: 'POST',
     body: registerForm
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {
  }
})
.catch(error => console.log(error));
}

signupForm.addEventListener('submit', signup_submit);
function signup_submit(event) {
  let registerForm = new FormData(signupForm);
    fetch('registry.php', {
     method: 'POST',
     body: registerForm
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {
  }
})
.catch(error => console.log(error));
}

logout.onclick = function() {
    fetch('logout.php', {
     method: 'POST',
  }
)
.then(response => response.json())
.then((result) => {
  if (result.errors) {
     alert(result.errors);
  } else {
  }
})
.catch(error => console.log(error));
    location.reload();
    return false;
}

image_loader.onclick = function() {
  let offset = parseInt(image_loader.getAttribute("offset"));
  let url = "load_images.php?offset=" + offset;
  offset+=2;
  fetch(url)
    .then((response) => response.text())
    .then((result) => {
      image_cont.insertAdjacentHTML("beforeend", result);
      image_loader.setAttribute("offset", offset.toString());
    })

}