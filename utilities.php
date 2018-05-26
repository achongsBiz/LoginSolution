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
   $username = $_COOKIE["testApp"];
   setcookie("testApp", $username, time()-300);
}

/**********
Function checks if referrer is from a valid source.
**********/
function checkRef($source)
{

   echo $_SERVER['HTTP_REFERER'];
   if ($_SERVER['HTTP_REFERER'] != $source)
   {
      die("You have reached an invalid page");
   }
}
?>
