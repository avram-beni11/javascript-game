<!DOCTYPE html>
<html>
<head>
<?php
   include 'common.php';//calls the common.php file
   outputDefault("Login Page");//call specific functions within common.php (Title of page)
   outputNav("Login");//calls function (specifies with name in the array is being used)
?>
<style>
   #loginPara {
  text-align: center;
  margin-top: 50px;
  font-size: 60px;
}
#signOut {
  cursor: pointer;
text-align: center;
position: relative;
left: 1px;
top: 55px;
padding: 17px;
}
</style>
</head>

<body>

    <form id="loginPara">
<div class="logBox">
 <img src="assets/logo.png" alt="Brick Run Logo" class="logo"> <!--Adding, temporary, logo -->
<div class = "logname">
      <input type="text" placeholder="Enter Username" id="uname" required>
  </div>
  <div class = "logpass">
      <input type="password" placeholder="Enter Password" id="pass" required>
  </div>
  <div class = "logbtn">
      <button type="submit" id="btn" onclick="login()">Log In</button>
  </div>
</div>
</form>

<p id="loginFailure" style="color:red;"></p>
<script>
  window.onload = checkLogin;//Check to see if user is logged in already

function checkLogin(){
    if(sessionStorage.uname !== undefined){
        //Extract details of logged in user
        let usrObj = JSON.parse(localStorage[sessionStorage.uname]);
        
        //Say hello to logged in user
        document.getElementById("loginPara").innerHTML = usrObj.uname + " logged in. Welcome!";
    }
}

let cookies = document.cookie;

function login(){
    //Get email address
    let uname = document.getElementById("uname").value;
    
    //User does not have an account
    if(localStorage[uname] === undefined ){
        //Inform user that they do not have an account
        document.getElementById("loginFailure").innerHTML = "Username not recognized. Do you have an account?";
        return; //Do nothing else
    }
    else{//User has an account
        let usrObj = JSON.parse(localStorage[uname]);//Convert to object
        let pass = document.getElementById("pass").value;
        if(pass === usrObj.pass){//Successful login
            document.getElementById("loginPara").innerHTML = usrObj.uname + " logged in successfully.";
            document.getElementById("loginFailure").innerHTML = "";//Clear any login failures
            sessionStorage.uname = usrObj.uname;
        }
        else{
            document.getElementById("loginFailure").innerHTML = "Password not correct. Please try again.";
        }
    }
}

function logOut() {
    sessionStorage.clear();
    location.reload();
}
</script>

 <?php outputFooter()?>
</body>
</html>
