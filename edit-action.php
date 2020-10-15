<?php
    require('connect.php');
    
$success = "";
$error = "";
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
//$date = date_time_set();

if (isset($_POST['submit'])) {
  // code...
$sql = "INSERT INTO editor_comment (a_name, a_email, a_comment, cur_date)
VALUES ('$name', '$email', '$comment', NOW())";

if ($conn->query($sql) === TRUE) {
    $success = "Comment added";
} else {
    $error = "Failed posting";
}

}