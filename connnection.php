<?php  


$server = "sql306.byetcluster.com";
$user = "25229671_2";
$pass = "S26[ONp!K4";
$dbname = "epiz_25229671_blog_trial";

$conn = mysqli_connect("$server", "$user", "$pass", $dbname);

if (!$conn) {
      $error = "Connection Failed Obala:".mysqli_connect_error();
}else {
  $error = "Connected to the database successfully ";
}



