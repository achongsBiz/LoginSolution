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

// Evaluate if username exists.
$rowCount = mysqli_num_rows($result);
if ($rowCount != 1) {
   die("You have entered an incorrect username or password. <a href=\"login.php\">Please Try Again.</a>");
}

// Evaluate if password matches.
while($row = mysqli_fetch_assoc($result)) {
      $hash = $row["credential"];
}
$verify_hash =  password_verify ($credential, $hash);
if ($verify_hash == 1) {
   $loggedIn = true;
   setcookie("testApp", $username, time()+300);
}
else {
   die("You have entered an incorrect username or password. <a href=\"login.php\">Please Try Again.</a>");
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
