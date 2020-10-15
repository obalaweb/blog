<?php
$msg = "";
    //upload button is clicked
    if (isset($_POST['upload'])) {
      $target = "web/".basename($_FILES['image']['name']);
      //connect to database
      
      $db = mysqli_connect('localhost','root','','blog_trial');
      
//get all submitted data from form
$image = $_FILES['image']['name'];
$text = $_POST['text'];
$sql = "INSERT INTO test(a_image, a_text) VALUES ('$image','$text')";

mysqli_query($db, $sql);//stores the submited data

//moving file to the folder
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  $msg = "<div style='color:green'> photo uploaded successfully</div>";
}else {
  
  $msg = "<div style='color:red'>Error uploading the file</div>";
}
   }
?>



<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css"/>
        <title>photo upload</title>
    </head>
    <body>
        <div id="content">
         <?php
 $db = mysqli_connect('localhost','root','','blog_trial');
            $sql = "SELECT * FROM test";
           
          $result = mysqli_query($db, $sql);//stores the submited data

            while ($row=mysqli_fetch_array($result)) {
              echo "<div style='color:red' class='shit'>";
              echo "<img class='img' src='web".$row['image']."' >";
              echo "<p>".$row['text']."</p>";
              
              echo '</div>';
            }
            
            
            
          ?>
          <div class="warning warning-error"><?=$msg;?></div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <!--<input type="hidden" name="size" value="10000">-->
                <div>
                <input type="file" name="image">
                </div>
                <textarea name="text"></textarea>
                <input type="submit" name="upload" value="Upload">
             </form>           
        </div>
        
