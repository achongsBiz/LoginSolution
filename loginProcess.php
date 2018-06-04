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

$rowCount = mysqli_num_rows($result);

if ($rowCount != 1) {
   die("You have entered an incorrect username or password. <a href=\"login.php\">Please Try Again.</a>");
}

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

mysqli_close($conn);
?>

You have logged in.<br>

<?php
renderMenu();
?>

<?php endif; ?>

</body>
</html>
