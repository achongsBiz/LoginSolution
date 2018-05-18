<?php

function DB_connect()
{

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

function DB_INS ($input, $table, $conn) {

   $sql  = "INSERT INTO " . $table;
   $sql .= "(". implode(", ", array_keys($input )). ")";
   $sql .= "VALUES ('" . implode("','", $input ) . "')";
   $result = mysqli_query($conn, $sql);
}

function DB_getAnchor ($anchorField, $conn) {

   $sql = "SELECT custid FROM customer where username = " . "\"" . $anchorField . "\"";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)) {
      $anchor = $row["custid"];
   }

   return $anchor;

}

?>
