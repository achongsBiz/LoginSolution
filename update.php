<?php
/*
Module: update.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
include("utilities.php");
include("dbUtilities.php");
$loggedIn = checkLogin();
?>

<html>
<title>
Registration Page
</title>
<body>
<h1>You can update your information</h1>
<form action="updateProcess.php" method="post">
<table>

<?php if ($loggedIn) :

$username = getUser();
$conn = DB_connect();

$currentValues = DB_SEL($username, "username", "customer", $conn);
while ($row = mysqli_fetch_assoc($currentValues)) {

   echo "<form><table>"
   . "<tr><td>First Name:</td><td><input type=\"text\" name=\"firstname\" value=" . $row["firstname"] ."></td></tr>"
   . "<tr><td>Last Name:</td><td><input type=\"text\" name=\"lastname\" value=" . $row["lastname"] ."></td></tr>"
   . "<tr><td>Street Address Line 1:</td><td><input type=\"text\" name=\"street_line1\" value=" . $row["street_line1"] ."></td></tr>"
   . "<tr><td>Street Address Line 2:</td><td><input type=\"text\" name=\"street_line2\" value=" . $row["street_line1"] ."></td></tr>"
   . "<tr><td>City:</td><td><input type=\"text\" name=\"city\" value=" . $row["city"] ."></td></tr>"
   . "<tr><td>Region:</td><td><input type=\"text\" name=\"region\" value=" . $row["region"] ."></td></tr>"
   . "<tr><td>Postal:</td><td><input type=\"text\" name=\"postal\" value=" . $row["postal"] ."></td></tr>"
   . "<tr><td>Contact:</td><td><input type=\"text\" name=\"contact\" value=" . $row["contact"] ."></td></tr>"
   . "</table>"
   . "<input type=\"submit\" value=\"Update\">"
   . "</form>";
}
?>

<?php else:?>
You are not logged in.

<?php endif;?>

</table>
</form>
</body>
</html>
