<?php
/*
Module: loginProcess.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   die("Not allowed to be here");
}
include("utilities.php");
include("dbUtilities.php");
$loggedIn = checkLogin();
?>

<html>
<head>
<title>
Login Page
</title>
</head>
<body>

<?php if ($loggedIn) :?>
You are already logged in.

<?php else :
$conn = DB_connect();

// Obtain hashed credential from the database.
$username = $_POST["username"];
$credential = $_POST["credential"];
$loggedIn = false;
$sql = "SELECT credential FROM customer where username = " . "\"" . $username . "\"";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
      $hash = $row["credential"];
 }

// If credential matches unhashed value, then set the login
// flag to true and create a cookie.
$verify_hash =  password_verify ($credential, $hash);
if ($verify_hash == 1) {
   $loggedIn = true;
   setcookie("testApp", $username, time()+300);
}
?>
You have logged in.

<?php endif; ?>

</body>
</html>
