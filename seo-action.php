<?php
    require('connect.php');
    
$success = "";
$error = "";
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$id = $_POST['id'];
//$date = date_time_set();

if (isset($_POST['submit'])) {
  // code...
$sql = "INSERT INTO seo_comment (a_name, a_email, a_comment, cur_date, post_id)
VALUES ('$name', '$email', '$comment', NOW(), '$id')";

if ($conn->query($sql) === TRUE) {
    $success = "Comment added";
} else {
    $error = "Failed posting";
}

}