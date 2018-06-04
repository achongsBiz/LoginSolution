<?php
/*
Module: registration.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
?>

<html>
<head>
   <title>Registration Page</title>
   <script type="text/javascript" src="clientSide.js"></script>
</head>
<body>

Please fill out the following form to register.<br><br>
<form  method="post" action="registrationProcess.php" onsubmit="return validateRegInput();">

<table>
<tr><td>username:</td><td><input type="text" name="username" id="userName"></td></tr>
<tr><td>password:</td><td><input type="password" name="credential" id="credential"></td></tr><br>
<tr><td>first name:</td><td> <input type="text" name="firstname" id="firstName"><br>
<tr><td>last name:</td><td> <input type="text" name="lastname" id="lastName"><br>
<tr><td>Street Address first line:</td><td> <input type="text" name="street_line1" id="streetLine1"></td></tr>
<tr><td>Street Address second line:</td><td> <input type="text" name="street_line2" id="streetLine2"></td></tr>
<tr><td>City:</td><td> <input type="text" name="city" id="city"></td></tr>
<tr><td>Region:</td><td> <input type="text" name="region" id="region"></td></tr>
<tr><td>Postal Code:</td><td> <input type="text" name="postal" id="postalCode"></td></tr>
<tr><td>Country:</td><td> <input type="text" name="country" id="country"></td></tr>
<tr><td>Email:</td><td>  <input type="text" name="email" id="email"></td></tr>
</table>

<input type="submit">
</form>
<p id="validationResults"></p>
</body>
</html>
