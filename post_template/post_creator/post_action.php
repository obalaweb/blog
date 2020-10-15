<?php
require "connect.php";
$error = "";
$success = "";



if (isset($_POST['post'])) {
  if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['img_post']) || empty($_POST['post_content'])) {
    $error = "Fill in all the blanks!";
  }
  elseif ($_POST['title'] == $row["a_title"]) {
    $error = "Post with the same title already exist!";
  }

}