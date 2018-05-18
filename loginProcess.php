<html>
<head>
<title>
Login Page
</title>
</head>
<body>

<?php
include("dbUtilities.php");

$conn = DB_connect();

$username = $_POST["username"];
$credential = $_POST["credential"];
$loggedIn = false;

$sql = "SELECT credential FROM customer where username = " . "\"" . $username . "\"";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
      $hash = $row["credential"];
 }

$verify_hash =  password_verify ($credential, $hash);

if ($verify_hash == 1) {
   $loggedIn = true;
}
?>

<?php if($loggedIn) : ?>
login successful!<br>

<?php else : ?>
login failed. Please try again.<br>
<form action="loginProcess.php" method="post">
username:</td><td><input type="text" name="username"><br>
password:</td><td><input type="password" name="credential"><br>
<input type="submit">
</form>
<?php endif; ?>

</body>
</html>
