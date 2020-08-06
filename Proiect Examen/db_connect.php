<?php
// https://www.w3schools.com/php/php_mysql_connect.asp
$servername = "localhost";
$usernamedb = "root";
$passworddb = "";
$database = "exam_db";

// Create connection
$conn = mysqli_connect($servername, $usernamedb, $passworddb, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
