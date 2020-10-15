<?php
session_start();
require("server.php");
//require("process.php");
if ($_SESSION["favcolor"] != "green") {
  
      header("location:login.php?Invalid = Please Login");
} else {
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin section</title>
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="Asset/font/css/all.min.css">
  </head>
  <body>
    <!-- 
===============================
===============================
          TOP NAVIGATION
===============================
===============================
----> 
   <div class="admin-navbar">
     <header>
       <nav class="top py-1">   
       <h4 class="pl-2 float-left"><i id="bars" class="fa fa-bars"></i></h4> 
      <a href="../../"><i id="home" class="fa fa-home mx-4"></i></a>
           <a class="btn btn-warning mr-2 float-right" href="logout.php">Logout</a>
       </nav>
     </header>
   </div>
   
    <!-- 
===============================
===============================
        MAIN CONTENT
===============================
===============================
----> 
<?php

$id = mysqli_real_escape_string($db, $_GET['Id']);
$sql = "SELECT * FROM Article WHERE id='$id'";
    
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        

?>


   <div class="content-wrapper pt-3">
     
     <div class="container">
       <div class="title">
         <h3 class="text-left">Edit Post</h3>
       </div>
       <div class="main-content">
         <?php if (!$_GET['Alert']){
           
         }else {
           ?>
              <div class="alert
              <?php echo $_GET['Err']; ?>"><?php
              echo $_GET['Alert'];
              ?>
            
              </div>
          <?php } ?>
          <div class="container">
            <form method="post" action="process.php?Id=<?php echo $id; ?>" enctype="multipart/form-data" class="edit">
              Post Title
              <input type="text" placeholder="Title" value="<?php echo $row['a_title'] ?>" id="title" name="title" class="form-control">
              
              Topic
              <input value="<?php echo $row["a_tag"];  ?>" type="text" placeholder="Topic" id="tag" name="tag" class="form-control">
              <br>
               
                <textarea value="<?php
                 echo $row["a_text"];
                ?>" id="editor" name="post" class="form-control textarea mb-3" rows="10" cols="28">
                                   <?php echo $row['a_text']; ?>
               </textarea>
              
            <br />
                  
          </div>
          <div class="img-area">
       <div class="overlay">
            <?php if (!$row['a_img']) {
            ?>
            <h6>Upload Post Image</h6>
            <input id="img" name="img" value="" class="form-control" type="file">
            <?php } else {
echo "<img src='../".$row['a_img']."' class='img-fluid' id='img-rep'>";
            ?>
 <input type="file" name="img" id="hidden" value="<?php echo $row['a_img']; ?>">
    <button data-toggle="modal" data-target="#myModal" id="btn-rem" type="button" class="inner"> 
    Replace Image
    </button>
    
    <?php } ?>
  </div>
          </div>
          
       </div>
     </div>
   <div class="ml-5"> 
     
       <input id="update_post" type="submit" name="update_post" value="Update" class="btn btn-rounded btn-primary btn-md">
     <br>

    </div>
   </div>
   </form>
   <?php 
    }
}

   ?>
  <!-- 
===============================
===============================
          SIDEBAR
===============================
===============================
----> 
   <section id="sidebar" class="sidebar">
     <div class="side-nav">
       <a href="index.php"><i class="fa fa-home"></i>Dashboard</a>
       <a href="posts.php"><i class="fa fa-home"></i>Posts</a>
       <a class="active" href="comments.php"><i class="fa fa-home"></i>Comments</a>
       <a href="settings.php"><i class="fa fa-home"></i>Setting</a>
       <a href="logout.php"><i class="fa fa-home"></i>Logout</a>
     </div>
   </section>
   
   
     <!-- 
===============================
===============================
        FOOTER
===============================
===============================
----> 
    <section class="footer-areas">
      <footer>
        <div class="footers">
          
        </div>
      </footer>
    </section>
    
    
      <!-- 
===============================
===============================
        Image Modal
===============================
===============================
----> 

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"><div class="header"><h4 class="modal-title">Select Image</h4>
                   
        <ul class="tab">
  <li><button class="btn" onclick="openCity('London')">Upload Image</button></li>
  <li><button class="btn" onclick="openCity('Tokyo')">Media Library</button></li>
</ul>
        </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
   <div class="modal-body">
     
    <div class="container">

    <div class="rows">
      <div id="Tokyo" class="city">
    <?php
$sql = "SELECT * FROM Article";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       ?>
           
     
 <!-- <div class="col-xs-6 col-sm-4 col-lg-3 col-xl-3">
    <img src="../<?php echo $row['a_img']; ?>" alt="" class="img-thumbnail">
  </div>--i
            <article class="">
            <div class="col-xs-3">
               <a href="../<?php echo $row['a_img']; ?>" class="thumbnail"> <img alt="" src="../<?php echo $row['a_img']; ?>" class="img-fluid"> </a>
               </div>
    
          </article>
-->
  <div class="cols-6 main">
  <?php
  echo "<img src='../".$row['a_img']."' class='img-fluid'>";
  ?></div>



       <?php
    }
} else {
    echo "0 results";
}
$db->close();
?>
</div>
<div id="London" class="city">
  <h2>Upload Image</h2>
 <input type="file" class="btn btn-default hidden" value="Upload">
</div>
</div>
 </div>
      <div class="modal-footer">
        
       
        
        <button type="hidden" class="btn btn-default" data-dismiss="modals">Select Image</button>
      </div>
    </div>
  </div>
</div>




      <!-- 
===============================
===============================
          SCRIPTS
===============================
===============================
----> 
    <script src="Asset/jQuery.js"></script>
   <script src="styles/bootstrap.min.js"></script>
   <script src="Asset/ckeditor/ckeditor.js"></script>
   <script>
     ClassicEditor
		.create( document.querySelector( '#editor' ), {
toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
   </script>
   
   <script>
     const bars = document.querySelector("#bars");
     const sidebar = document.querySelector("#sidebar");
     bars.addEventListener("click", function () {
       $("#sidebar").toggleClass("sidebar")
     });
  
     
     const ReplaceImg = document.querySelector(".inner");
     const InpImg = document.querySelector("#hidden");
     ReplaceImg.addEventListener("click", function() {
       InpImg.style.display = "block";
       InpImg.focus();
       $("#btn-rem").remove();
       $("#img-rep").remove();
     });
     
     
     
   </script>
   <script>
     openCity("Tokyo");

function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      
    }
    document.getElementById(cityName).style.display = "block";
}
   </script>
   <script>
   document.querySelector(".alert-success").setTimeout(fadeOut, 3000)
     function fadeOut() {
       alert('Hello');
     }
   </script>
  </body>
</html>
<?php }