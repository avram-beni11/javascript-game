<!DOCTYPE html>
<html>
<head>
<?php 
   include 'common.php';//calls the common.php file
   outputDefault("Leader Board");//call specific functions within common.php (Title of page)
   outputNav("Leaderboard");//calls function (specifies with name in the array is being used)
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
</style>
</head>



<body onload="loadRank()">

<input type="text" placeholder="Enter Score" id="scoreN" required>
<button class="buttonSc" onclick="updateScore()"><b>Submit Score</b></button>
  <div id="rankTable"></div> 
<script src="JS/leader.js">

function logOut() {
    sessionStorage.clear();
    location.reload();
}

</script>
<?php outputFooter() ?>
</body>
</html>
