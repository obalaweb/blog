<?php
    require('connect.php');
    
$message = "";
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$id = $_POST['post_id'];

if (isset($_POST['submit'])) {
  // code...
$sql = "INSERT INTO seo_comment (a_name, a_email, a_comment, cur_date, post_id)
VALUES ('$name', '$email', '$comment', NOW(), '$id')";

if ($conn->query($sql) === TRUE) {
    $message = "Comment added";
    $alert = "success";
} else {
    $message = "Failed posting";
    $alert = "warning";
}

}