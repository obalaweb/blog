<?php  
$error = "";

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "blog_trial";

$conn = mysqli_connect("$server", "$user", "$pass", $dbname);

if (!$conn) {
      $error = "Connection Failed Obala:".mysqli_connect_error();
      
}
else {
  $error = "connected successfully";
}








