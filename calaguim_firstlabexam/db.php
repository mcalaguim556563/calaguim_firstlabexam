<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "calaguim_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
  die("Connection failed");
}
?>