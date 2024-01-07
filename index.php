<!DOCTYPE html>
<html>
<head>
<?php
include ('common.php'); //calls the common.php file
  outputDefault("Home Page"); //call specific functions within common.php (Title of page)
  outputNav("Home");//calls function (specifies with name in the array is being used)
?>
</head>
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
<!--Outputs the button that leads user onto the page where they play the game-->
<a href="game.php"><button class="playBtn"><b>Play</b></button></a>

<body>
  
  <div class="rule">
    <table>
    <tr> <!-- Table explaing the rules of the game -->
      <td><u>Rules</u> <br><br>a. Press UP arrow to <br>avoid the obstacles
      <br>b. Dodge the mysterious red squares
      <br> to accumulate points
      <br>c. Score the most points to be <br> at the top of the score board
      <br>d. Have Fun!</td>
    </tr>
  </table>
  </div>
  <div class="gif">
    <img src="assets/run.gif">
    <script>
      function logOut() {
    sessionStorage.clear();
    location.reload();
}
    </script>
</div>
<?php outputFooter()?> <!--Output the footer onto page-->
</body>
</html>
