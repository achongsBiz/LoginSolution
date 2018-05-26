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

<?php

$username = getUser();
$conn = DB_connect();
$regCustid = DB_getAnchor($username, $conn);

$customerInputArray = array(
   "firstname" => $_POST["firstname"],
   "lastname" => $_POST["lastname"],
   "username" => $username,
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_UPD ($customerInputArray, $username, "customer", $conn);

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

$customer_contactInputArray = array(
   "contact" => $_POST["contact"],
   "lstupdt_usr" => "sys",
   "lstupdt_ts" => date("Y-m-d H:i:s")
);
DB_UPD($customer_contactInputArray, $username, "customer_contact", $conn);
?>
