<?php

function outputDefault($pageTitle){ //Outputs favicon, title for each page and has the stylesheet that is used across all pages
  echo '<!DOCTYPE html>';
  echo '<html>';
  echo '<head>';
  echo '<title>' . $pageTitle . '</title>'; //Title of the pages (seen when looking at the tab)
  echo '<link rel="stylesheet" type="text/css" href="CSS/style.css">';//the CSS stylesheet that changes the way the page looks like
  echo '<button type="button" id="signOut" onclick="logOut()">Sign Out</button>';
  echo '</head>';
  echo '<body>';
}

 function outputNav($pageName){ 
  echo '<div class="banner" href="assets/banner.png> </div>'; //banner doesn't actually show, without this line the nav bar becomes messed up
       echo '<div class=" nav">';

  //Array of pages to link 
  $navName= array("Home", "Login", "Register","Leaderboard");
  $navLink = array("index.php", "loginPage.php", "registerPage.php", "leaderPage.php");

  //loops the navigation
  for($i = 0; $i < count($navName); $i++){
      echo '<a ';
      if($navName[$i] == $pageName){
          echo 'class="nav " ';

      }
      echo ' href="' . $navLink[$i] . '">' . $navName[$i] . '</a>';
  } 
}
    function outputFooter(){ //outputs the footer
       echo '
       <footer>
       <div class = "foot">
       <p>
         E-Mail: game@gamedev.com Tel: 01234 54321
       </p>
      </div>
     </footer>
       ';
    }
    
  

?>