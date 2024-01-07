function storeUser(){
    if(document.getElementById("uname").value != document.getElementById("conName").value) {
     document.getElementById("RegFail").innerHTML = "Username do not match. Please try again";
   return false;

    } else if (document.getElementById("pass").value != document.getElementById("conpass").value) {
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

    localStorage[usrObject.uname] = JSON.stringify(usrObject);
 }//end function