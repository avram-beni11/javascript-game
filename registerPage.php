<!DOCTYPE html>
<html>
<head>
<style>
#signOut {
  cursor: pointer;
text-align: center;
position: relative;
left: 1px;
top: 55px;
padding: 17px;
}
</style>
<?php
   include 'common.php';//calls the common.php file
   outputDefault("Register Page");//call specific functions within common.php (Title of page)
   outputNav("Register");//calls function (specifies with name in the array is being used)
?>
</head>

<body>

  <form onsubmit= "return storeUser()">
  <div class="regBox">
  <img src="assets/logo.png" alt="Brick Run Logo" class="logo"> <!--Adding, temporary, logo -->
<div class = "name">
        <input type="text" placeholder="Enter Username" id="uname" required>
    </div>
    <div class = "confName">
        <input type="text" placeholder="Confirm Usernsme" id="conName" required>
    </div>
    <div class = "pass">
      <input type="password" placeholder="Enter Password" id="pass" required>
    </div>
    <div class = "Confpass">
      <input  type="password" placeholder="Confirm Password" id="conpass" required>
    </div>
    <div class = "scoreB">
    <input type="hidden" id="topScore" value="0">
    </div>
    <div class = "btn">
        <button  id="btn" onclick="storeUser()">Create Account</button>
    </div>
</div>
</form>
<p id="RegFail" style="color:red" fontsize: 40px></p>
<p id="RegSuccess" style="color:green" fontsize: 40px></p>


<script>
 function storeUser(){
    if(document.getElementById("uname").value != document.getElementById("conName").value 
    || document.getElementById("uname").value == " " || document.getElementById("conName").value == " ") {
     document.getElementById("RegFail").innerHTML = "Username do not match. Please try again";
   return false;

    } else if (document.getElementById("pass").value != document.getElementById("conpass").value 
    || document.getElementById("pass").value == " " || document.getElementById("conpass").value == " ") {
     document.getElementById("RegFail").innerHTML = "Passwords do not match. Please try again";
     return false;

    }else {
        true;
        document.getElementById("RegSuccess").innerHTML = "Registered Seccessfully";
        //alert("Success!");
    }

    var usrObject = {};
    
    usrObject.uname = document.getElementById("uname").value;
    usrObject.conName = document.getElementById("conName").value;
    usrObject.pass= document.getElementById("pass").value;
    usrObject.conpass = document.getElementById("conpass").value;
    usrObject.topScore = document.getElementById("topScore").value;

    localStorage[usrObject.uname] = JSON.stringify(usrObject);
 }//end function 
 function logOut() {
    sessionStorage.clear();
    location.reload();
}
 
</script>

<?php outputFooter()?> 

</body>
</html>
