<?php
/*
Module: login.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
include("utilities.php");
$loggedIn = checkLogin();
?>

<html>
<head>
   <title>Login Page</title>
</head>
<body>

<?php if($loggedIn) :?>
You are already logged in.<br>

<?php else : ?>
<form action="loginProcess.php" method="post">
username:</td><td><input type="text" name="username"><br><br>
password:</td><td><input type="password" name="credential"><br><br>
<input type="submit"><br><br>
New here? You can <a href="registration.php"> register here!</a>
</form>

<?php endif; ?>

</body>
</html>
