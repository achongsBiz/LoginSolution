<?php
/*
Module: registrationProcess.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   die("Not allowed to be here.");
}
include("dbUtilities.php");
include("utilities.php");
?>

<html>
<head>
   <title>Registration Page</title>
</head>
<body>

<?php
$conn = DB_connect();

// Check if username exists.
$rowCheck = DB_rowCheck($conn, $_POST["username"]);
if ($rowCheck == true )
{
   die("User name already exists.");
}

// Populate customer table.
$customerInputArray = array(
   "username" => $_POST["username"],
   "firstname" => $_POST["firstname"],
   "lastname" => $_POST["lastname"],
   "credential" => password_hash($_POST["credential"], PASSWORD_DEFAULT),
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_INS ($customerInputArray, "customer", $conn);

$regCustid = DB_getAnchor($_POST["username"], $conn);

// Populate customer_address table.
$customer_addressInputArray = array(
   "custid" => $regCustid,
   "address_type" => 1,
   "street_line1" =>$_POST["street_line1"],
   "street_line2" =>$_POST["street_line2"],
   "city" => $_POST["city"],
   "region" => $_POST["region"],
   "postal" => $_POST["postal"],
   "country" => $_POST["country"],
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_INS ($customer_addressInputArray, "customer_address", $conn);

// Populate customer customer_contact table.
$customer_addressInputArray = array(
   "custid" => $regCustid,
   "contact_type" => 1,
   "contact" => $_POST["email"],
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_INS ($customer_addressInputArray, "customer_contact", $conn);

mysqli_close($conn);
?>

Registration successful. You can now login.<br>
<a href="login.php">Log In</a>

</body>
</html>
