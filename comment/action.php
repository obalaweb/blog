<?php
    require('config.php');
$success = "";
$error = "";
$name = $_POST['name'];
$comment = $_POST['comment'];
//$date = date_time_set();

if (isset($_POST['submit'])) {
  // code...
$sql = "INSERT INTO comment_table (a_name, a_comment)
VALUES ('$name', '$comment')";

if ($conn->query($sql) === TRUE) {
    $success = "comment posted successfully";
} else {
    $error = "Failed posting";
}

}