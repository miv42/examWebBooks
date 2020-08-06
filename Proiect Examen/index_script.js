function login_redirect() {
  location.href = "./login_page.html";
}

function home_redirect() {
  location.href = "./index.html";
}

function register_redirect(){
  location.href = "./register_page.html";
}

function post_signup(){
  document.getElementById("signup-wrapper").innerHTML = "<span font-family: Yu Gothic, sans-serif;> You have successfully registered! A verification email has been sent to you :D </span>";
}
