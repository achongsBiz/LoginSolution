<?php

function connect() {

   $servername = "localhost";
   $username = "";
   $password = "";
   $dbname = "test";

   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   else {
      echo "connected to database.<br>";
   }

}

function DB_INS ($input, $table) {

   $sql  = "INSERT INTO " . $table;
   $sql .= "(". implode(", ", array_keys($customerInputArray )). ")";
   $sql .= "VALUES ('" . implode("','", $customerInputArray ) . "')";
   $result = mysqli_query($conn, $sql);
}

?>
