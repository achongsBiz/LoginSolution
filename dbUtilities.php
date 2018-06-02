<?php
/*
Module: dbUtilities.php
Project: Login Solution
Log:
20180515 - Initial Revision.
*/
?>

<?php
/**********
Function returns a database connection.
**********/
function DB_connect()
{

   //**Obviously in a real environment this should be secured**.
   $servername = "localhost";
   $username = "";
   $password = "";
   $dbname = "test";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   return $conn;
}

/**********
Function creates an INSERT SQL against the database.
**********/
function DB_INS ($input, $table, $conn) {

   $sql  = "INSERT INTO " . $table;
   $sql .= "(". implode(", ", array_keys($input )). ")";
   $sql .= "VALUES ('" . implode("','", $input ) . "')";
   $result = mysqli_query($conn, $sql);
}


/**********
Function creates an UPDATE SQL against the database.
**********/
function DB_UPD ($input, $username, $table, $conn) {

   $preSql = "UPDATE " . $table . " SET ";
   $anchor = DB_getAnchor($username, $conn);

   foreach ($input as $output) {
      $preSql .= key($input) . "= \"" . $output . "\"" . ",";
      next($input);
   }

   $sql = substr($preSql, 0, -1) . "WHERE custid = " . $anchor;

   $result = mysqli_query($conn, $sql);
}

/**********
Function creates a SELECT SQL against the database.
* Case specific, not as modular as the UPD & INS functions.
**********/
function DB_SEL($user, $anchorField, $table, $conn) {

   $anchor = DB_getAnchor($user, $conn);

   $sql = "SELECT A.custid ,A.firstname ,A.lastname ,B.street_line1 ,B.street_line2 ,B.city ,B.region ,B.postal ,B.country ,C.contact FROM customer A , customer_address B , customer_contact C WHERE A.custid = B.custid AND A.custid = C.custid";
   $sql .= " AND A.custid = " . $anchor;
   $result = mysqli_query($conn, $sql);

   return $result;
}

/**********
Function returns a customer ID. Used to ensure proper key distribution
into all normalized tables.
**********/
function DB_getAnchor ($anchorField, $conn) {

   $sql = "SELECT custid FROM customer where username = " . "\"" . $anchorField . "\"";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)) {
      $anchor = $row["custid"];
   }

   return $anchor;
}
?>
