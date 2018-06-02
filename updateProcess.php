<?php
/*
Module: updateProcess.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   die("Not allowed to be here");
 }
include("utilities.php");
include("dbUtilities.php");
?>

<html>
<head>
<title>
Update Page
</title>
</head>
<body>

<?php
$username = getUser();
$conn = DB_connect();
$regCustid = DB_getAnchor($username, $conn);

// Update customer table.
$customerInputArray = array(
   "firstname" => $_POST["firstname"],
   "lastname" => $_POST["lastname"],
   "username" => $username,
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_UPD ($customerInputArray, $username, "customer", $conn);

// Update customer_address table.
$customer_addressInputArray = array(
   "street_line1" =>$_POST["street_line1"],
   "street_line2" =>$_POST["street_line2"],
   "city" => $_POST["city"],
   "region" => $_POST["region"],
   "postal" => $_POST["postal"],
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_UPD($customer_addressInputArray, $username, "customer_address", $conn);

// Update customer customer_contact table.
$customer_contactInputArray = array(
   "contact" => $_POST["contact"],
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_UPD($customer_contactInputArray, $username, "customer_contact", $conn);
?>

<H3>Update successful.</H3>

<?php
renderMenu();
?>

</body>
</html>
