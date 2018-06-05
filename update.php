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
<head>
   <title>Registration Page</title>
   <script type="text/javascript" src="clientSide.js"></script>
</head>
<body>
You can update your information here.<br><br>
<form action="updateProcess.php" method="post" onsubmit="return validateUpdInput();">

<?php if ($loggedIn) :

$username = getUser();
$conn = DB_connect();

//Retrieve and populate the user's data.
$currentValues = DB_SEL($username, "username", "customer", $conn);
while ($row = mysqli_fetch_assoc($currentValues)) {

   echo "<table>"
   . "<tr><td>First Name:</td><td><input maxlength=\"30\" type=\"text\" id=\"firstName\" name=\"firstname\" value=\"" . $row["firstname"] ."\"></td></tr>"
   . "<tr><td>Last Name:</td><td><input  maxlength=\"30\" type=\"text\" id=\"lastName\" name=\"lastname\" value=\"" . $row["lastname"] ."\"></td></tr>"
   . "<tr><td>Street Address Line 1:</td><td><input maxlength=\"30\" type=\"text\" id=\"streetLine1\" name=\"street_line1\"  value=\"" . $row["street_line1"] ."\"></td></tr>"
   . "<tr><td>Street Address Line 2:</td><td><input maxlength=\"30\" type=\"text\" id=\"streetLine2\"  name=\"street_line2\" value=\"" . $row["street_line2"] ."\"></td></tr>"
   . "<tr><td>City:</td><td><input maxlength=\"30\" type=\"text\" id=\"city\" name=\"city\" value=" . $row["city"] ."></td></tr>"
   . "<tr><td>Region:</td><td><input maxlength=\"30\" type=\"text\" id=\"region\" name=\"region\" value=\"" . $row["region"] ."\"></td></tr>"
   . "<tr><td>Postal:</td><td><input maxlength=\"30\" type=\"text\" id=\"postalCode\" name=\"postal\" value=\"" . $row["postal"] ."\"></td></tr>"
   . "<tr><td>Contact:</td><td><input maxlength=\"30\" type=\"text\" id=\"email\" name=\"contact\" value=\"" . $row["contact"] ."\"></td></tr>"
   . "</table>"
   . "<input type=\"submit\" value=\"Update\">"
   . "</form>"
   . "<p id=\"validationResults\"></p>";
}
?>

<?php else:?>
You are not logged in.

<?php endif;?>

</table>
</form>
</body>
</html>
