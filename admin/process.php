<?php
session_start();
include("server.php");
if (isset($_SESSION['loggedIn']) && isset($_SESSION['name'])) {
    $loggedIn = true;
}



$alert = "";
if (isset($_POST['login'])) {
    $email = $db->real_escape_string($_POST['uemail']);
    $password = $db->real_escape_string($_POST['upass']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $db->query("SELECT id, upass, uname FROM login WHERE uemail='$email'");
        if ($sql->num_rows == 0)
            exit('failed');
        else {
            $data = $sql->fetch_assoc();
            $passwordHash = $data['upass'];

            if (password_verify($password, $passwordHash)) {
                $_SESSION['loggedIn'] = 1;
                $_SESSION['name'] = $data['uname'];
                $_SESSION['email'] = $email;
                $_SESSION['userID'] = $data['id'];

                header("location:index.php");
            } else
                exit('failed first');
        }
    } else
        exit('failed second');
}


if (isset($_POST['register'])) {
    $name = $db->real_escape_string($_POST['uname']);
    $email = $db->real_escape_string($_POST['uemail']);
    $password = $db->real_escape_string($_POST['upass']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $db->query("SELECT id FROM login WHERE uemail='$email'");
        if ($sql->num_rows > 0)
            exit('failedUserExists');
        else {
            $ePassword = password_hash($password, PASSWORD_BCRYPT);
            $db->query("INSERT INTO login (uname,uemail,upass,createdOn) VALUES ('$name', '$email', '$ePassword', NOW())");

            $sql = $db->query("SELECT id FROM login ORDER BY id DESC LIMIT 1");
            $data = $sql->fetch_assoc();

            $_SESSION['loggedIn'] = 1;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['userID'] = $data['id'];

            exit('success');
        }
    } else
    exit("hey you run into errors");
        //exit('failedEmail')
        
        
}
 
/*if (isset($_POST['login'])) {
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
  
}*/


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
VALUES ('$title', '$tag', '', NOW(), '$post', 'blog-img/$img')";

if ($db->query($sql) === TRUE) {
  $id = $db->insert_id;
  
  //$id = $db->query("SELECT id FROM Article WHERE a_title == $title");
    header("location:edit.php?Id=$id && Err=alert-success && Alert=Post added successfully!");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
  }
}



if (isset($_POST['newDate'])) {
  $id = $_GET['Id'];
  $date = $_POST['newDate'];
  
  $sql = "UPDATE Article SET a_date='$date' WHERE id='$id'";

if ($db->query($sql) === TRUE) {
    //echo "successfully updated";
    echo $id;

} else {
    echo "Error updating record: " . $db->error;
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

    }
    
 else {
    $img = $row['a_img'];
  //echo$_FILES['img']['name'];
  
}
    }
}
    
    
    
    $tag = $_POST["tag"];
    
  
  
  
  $sql = "UPDATE Article SET a_title='$title', a_tag='$tag', a_author='', a_text='$post', a_img='$img' WHERE id='$id'";

if ($db->query($sql) === TRUE) {
    header("location:edit.php?Id=$id && Err=alert-success && Alert=Post updated successfully");

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