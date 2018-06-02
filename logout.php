<?php
/*
Module: logout.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
include("utilities.php");
?>

<html>
<title>
Logout Page
</title>
<body>

<?php
   // Execute logout script.
   zeroCookie();
?>

You have logged out.<br><br>
<a href="login.php">Log In</a>
</body>
</html>
