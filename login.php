<?php 
	include 'include/function.php';


     if (isLoggedIn()) {
     header('location: productstore.php');
     exit;
     }


	include 'include/header.php';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFGElite.</title>
	  <link rel="icon" type="image/x-icon" href="Picture/14.png">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">											   
</head>	
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">LOGIN</span>
				            <form method="post"  action="login.php">
                    <div class="input-field">
                        <input type="text" autocomplete="off" placeholder="Enter your Username" name="username" id="username" >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                       <p class="text-danger"><?php if(isset($errors['username'])) echo $errors['username'];?></p>
                       <p class="text-danger"><?php if(isset($errors['failed'])) echo $errors['failed'];?></p>
                    <div class="input-field">
                        <input type="password" autocomplete="off" class="password" placeholder="Enter your password" name="password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                      <p class="text-danger"><?php if(isset($errors['password'])) echo $errors['password'];?></p>
                      <p class="text-danger"><?php if(isset($errors['failed'])) echo $errors['failed'];?></p>
                    <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input  type="checkbox" value="rememberme" id="rememberMe">
                        <label for="logCheck" class="text" >Remember me</label>
                    </div>
                        <a href="forgot.php" class="text" style="color:black;">Forgot password?</a>
                    </div>
                    <div class="input-field buttons">
                        <input value="Login" type="submit" class="btn" name="login_btn" onclick="lsRememberMe()">>
                    </div>
                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="verify.php" class="text signup-link">Sign Up</a>
                    </span>
                </div>
				   </form>
          </div>
    </div>
<script>
const rmCheck = document.getElementById("rememberMe"),
      username = document.getElementById("username");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  username.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  username.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && username.value !== "") {
    localStorage.username = username.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");


    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })
</script>
</body>
</html>