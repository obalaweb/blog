<?php
session_start();
require("server.php");
$loggedIn = false;
require("process.php");



if (!$loggedIn) {
  header("location:login.php?Invalid=please login first");
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
       <div class="dropdown">
      <span><i id="home" class="fa fa-home mx-4"></i></span>
      <div class="visit-site"> 
      <a class="btn" href="../../">Visit Site</a>
      </div>
      </div>
           <button class="btn btn-warning mr-2 float-right" id="logout">Logout</button>
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
   <div class="content-wrapper pt-3 ml-3">
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
              <br />
              <input type="text" placeholder="Post Tag" name="tag" class="form-control">
              <br>
                <textarea name="post" class="form-control textarea mb-3" rows="10" cols="48" id="editor"> </textarea>
              
            
                  
          </div>
          <div class="img-area mt-3">
            <h6>Upload Post Image</h6>
            <input id="img" name="img" class="form-control" type="file">
          </div>
          
       </div>
     </div>
   <div class="ml-5"> 
     <input style="color:#fff" type="submit" name="add_post" value="Update" class="btn btn-rounded btn-primary btn-md">
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
    <script src="Asset/ckeditor/ckeditor.js"></script>
   <script>
       ClassicEditor
		.create( document.querySelector( '#editor' ), {
toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'image']
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
   </script>
  </body>
</html>
<?php
}