<?php
session_start();
require("server.php");
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
   <div class="content-wrapper pt-3">
     <div class="container">
       <div class="title">
         <h3 class="text-left">Add Post</h3>
       </div>
       <div class="main-content">
              <div class="alert
              alert-warnng"><?php echo $error; ?></div>
          <div class="container">
            <form method="post" action="process.php" enctype="multipart/form-data">
              <input type="text" placeholder="Title" name="title" class="form-control">
              <br>
                <textarea name="post" class="form-control textarea mb-3" rows="10" cols="28" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit."> </textarea>
              
            
                  
          </div>
          <div class="img-area">
            <h6>Upload Post Image</h6>
            <input id="img" name="img" class="form-control" type="file">
          </div>
          
       </div>
     </div>
   <div class="ml-5"> 
     <a href="#"><input type="submit" name="add_post" value="Update" class="btn btn-rounded btn-primary btn-md"></a>
     <br>
    </div>
   </div>
   </form>
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
          SCRIPTS
===============================
===============================
----> 
    <script src="Asset/jQuery.js"></script>
   <script src="styles/bootstrap.min.js"></script>
    <script src="Asset/ckeditor2/ckeditor.js"></script>
   <script>
     CKEDITOR.replace('post');
   </script>
   <script>
     const bars = document.querySelector("#bars");
     const sidebar = document.querySelector("#sidebar");
     bars.addEventListener("click", function () {
       $("#sidebar").toggleClass("sidebar")
     });
   </script>
  </body>
</html>
<?php
}