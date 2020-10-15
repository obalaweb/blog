<?php
session_start();
include("server.php");

$alert = "";
 
if (isset($_POST['login'])) {
  $name = $_POST["uname"];
  $pass = $_POST["upass"];
  
  if (empty($_POST["uname"]) || empty($_POST["upass"])) {
    header("location:login.php?Empty=Please fill in the blanks");
  }else {
    $sql = "SELECT uname, upass FROM login";
    $result = $db->query($sql);
  
  if ($result->num_rows > 0) {
   if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    if ($name !== $row["uname"] && $pass !== $row["upass"]) {
        header("location:login.php?Invalid=Please enter valid credentials");
    } else {
      
      $_SESSION["favcolor"] = "green";
      header("location:index.php");
    }
    }
} else {
    echo "0 results";
}
  }
  
  }
  
}


if (isset($_POST["add_post"])) {
  
  $target_dir = "../blog-img/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
  
  
  
  if (empty($_POST["title"])) {
    $error = "Please add post title";
  }
  if (empty($_POST["post"])) {
    $error = "Post can't be blank";
  } else {
    $post = $_POST["post"];
    $title = $_POST["title"];
    $img = $_FILES["img"]['name'];
    $tag = $_POST["tag"];
    
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

    $sql = "INSERT INTO Article (a_title, a_tag, a_author, a_date, a_text, a_img)
VALUES ('$title', '', '".date("d/m/Y")."', '$tag', '$post', 'blog-img/$img')";

if ($db->query($sql) === TRUE) {
  echo $img;
    //header("location: view.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
  }
}









if (isset($_POST["update_post"])) {
  $id = $_GET['Id'];
  $post = $_POST["post"];
    $title = $_POST["title"];
    
  $sql = "SELECT a_img FROM Article WHERE id='$id'";
$result = $db->query($sql);
echo $id;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    if ($_FILES['img']['name'] == $row['a_img']) {
    $img = $row['a_img'];
    print("test from database = id");
    echo $row['a_img'];
    }
    
 else {
    $img = $row['a_img'];
  //echo$_FILES['img']['name'];
    echo $img;
    print("test from form input");
}
    }
}
    
    
    
    $tag = $_POST["tag"];
    $date = date("d/m/Y");
    
  
  
  
  $sql = "UPDATE Article SET a_title='$title', a_tag='$tag', a_author='', a_date='$date', a_text='$post', a_img='$img' WHERE id='$id'";

if ($db->query($sql) === TRUE) {
    //header("location:edit.php?Id=$id && Err=alert-success && Alert=Post updated successfully");
    echo $img;
    echo $row['a_img'];
    print("test from last database query");
} else {
    echo "Error updating record: " . $db->error;
}

$db->close();
}


 ?>
 <?php 
 /* $target_dirs = "../blog-img/";
$target_files = $target_dirs . basename($_FILES["imgUp"]["name"]);
$uploadsOk = 1;
$imageFileTypes = pathinfo($target_files,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
  
if (isset($_POST["update_post"])) {
  if (empty($_POST["title"])) {
    $error = "Please add post title";
  }
  if (empty($_POST["post"])) {
    $error = "Post can't be blank";
  } else {
    $post = $_POST["post"];
    $title = $_POST["title"];
    
    $img = $_FILES['imgUp']['name'];
    $tag = $_POST["tag"];
    $date = date("d/m/Y");
    $id = mysqli_real_escape_string($db, $_GET['Id']);
   
    
 /* $sql = "SELECT a_title, a_text FROM Article";
    $result = $db->query($sql);
  
  if ($result->num_rows > 0) {
   if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if ($title == $row["a_title"]) {
        
      
      }
    }
   }
  }


if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadsOk = 0;
    }
    // Check if file already exists
if (file_exists($target_files)) {
    echo "Sorry, file already exists.";
    $uploadsOk = 0;
}
// Check file size
if ($_FILES["imgUp"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadsOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileTypes != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadsOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadsOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imgUp"]["tmp_name"], $target_files)) {
      $alert = "The file ". basename( $_FILES["imgUp"]["name"]). " has been uploaded.";
    } else {
        $alert = "Sorry, there was an error uploading your file.";
    }
}

$sql = "UPDATE Article SET a_title='$title', a_tag='$tag', a_author='', a_date='$date', a_text='$post', a_img='$img' WHERE id='$id'";

if (mysqli_query($db, $sql)) {
   $alert = "Post updated successfully";
    header("location: edit.php?Id=$id && Alert=$alert && Err=alert-success");
} else {
    $alert = "Error updating Post";
    header("location: edit.php?Id=$id && Alert=$alert && Err=alert-waining");
}

mysqli_close($db);

}


}
*/
 ?>