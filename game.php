<!DOCTYPE html>
<html>
<head>
<?php
include ('common.php'); //calls the common.php file
  outputDefault("Game"); //call specific functions within common.php (Title of page)
  outputNav("Home");//calls function (specifies with name in the array is being used)
?>
<style>
  #signOut {
  cursor: pointer;
text-align: center;
position: relative;
left: 1px;
top: 55px;
padding: 17px;
}
   #canvas1 {
    border: 2px solid black;
    width: 800px;
    height: 500px;
    margin-left: 350px;
    top: 100px;
    background: url('assets/background.jpeg');
}
.resBtn {
  cursor: pointer;
  text-align: center;
  position: relative;
  left: 400px;
  margin-top: 30px;
  width: 400px;
  padding: 15px;
  border-radius: 12px;
}

</style>
</head>

<body onload="startGame()">

<a href="game.php"><button class="resBtn"><b>Restart</b></button></a>
    <canvas id="canvas1"></canvas>
    <script src="JS/script.js"> </script>
    <script src="JS/signOut.js"></script>
<?php outputFooter()?> <!--Output the footer onto page-->
</body>
</html>
