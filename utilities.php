<?php
/*
Module: utilities.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
?>

<?php
/**********
Function verifies if user is logged in by checking cookie.
**********/
function checkLogin() {

   $cookie_name = "testApp";
   $loggedIn = false;
   if(isset($_COOKIE[$cookie_name])) {
      $loggedIn = true;
   }
   return $loggedIn;
}

/**********
Function returns the username from the cookie.
**********/
function getUser() {
   $cookie_name = "testApp";
   $username = $_COOKIE[$cookie_name];
   return $username;
}

/**********
Function expires cookie.
**********/
function zeroCookie() {

   $check = isset($_COOKIE["testApp"]);
   if ($check) {
      $username = $_COOKIE["testApp"];
      setcookie("testApp", $username, time()-300);
   }
}

/**********
Function renders navigation menu.
**********/
function renderMenu()
{
   echo "<ul>Here is what you can do now:"
   . "<ul>"
   . "<li><a href=\"update.php\">Update your info.</a></li>"
   . "<li><a href=\"logout.php\">Logout.</a></li>"
   . "</ul>";
}

?>
