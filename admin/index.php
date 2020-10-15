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
    <title>Admin Dashboard</title>
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

   <div class="content-wrapper pt-3">
     <div class="container">
       <div class="title">
         <h3 class="text-left">Dashboard</h3>
       </div>
                          <?php

$sql = "SELECT * FROM Article";
      $result = mysqli_query($db, $sql);
      $queryResult = mysqli_num_rows($result);
    
 ?>
       

                <?php
                if ($queryResult > 0) {  
      while ($row = mysqli_fetch_assoc($result)) {
        echo " <div class='container'><div class='main-content'>
          <div class='container'>
          <img src='../".$row['a_img']."' alt='".$row['a_tag']."' class='img-fluid'>
          <h5> ". $row['a_title']." </h5><p>".substr($row['a_text'], 0, 60)."...</p> <a href='edit.php?Id=".$row['id']."'><input type='button' value='Edit' class='btn btn-rounded btn-success btn-sm'></a>             
          <a href='view.php?Del=".$row['id']."'><input type='button' value='Delete' class='btn btn-rounded btn-danger btn-sm'></a>             
          </div>
       </div>
     </div>";
      }
    }
                ?>

   </div>
   </div>
  <!-- 
===============================
===============================
          SIDEBAR
===============================
===============================
----> 
    <section id="sidebar" class="sidebar">
     <div class="side-nav">
       <a class="active" href="index.php"><i class="fa fa-home"></i>Dashboard</a>
       <div class="dropdown">
         <span><i class="fa fa-home"></i>Posts</span>
       <div class="visit-site">
         <a href="add.php">Add Post</a>
         <a href="add.php">Add Post</a>
       </div>
       </div>
       
       <a class="inactive" href="comments.php"><i class="fa fa-snapchat"></i>Comments</a>
       <a class="inactive" href="#"><i class="fa fa-snapchat"></i>Howdy</a>
       <a href="settings.php"><i class="fa fa-tools"></i>Setting</a>
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
   <script>
     const bars = document.querySelector("#bars");
     const sidebar = document.querySelector("#sidebar");
     bars.addEventListener("click", function () {
       $("#sidebar").toggleClass("sidebar")
     });
   </script>
   <script>
   const logout = document.querySelector("#logout");
   logout.addEventListener("click", function() {
     var r = confirm("Logout?");
     if (r == true) {
  window.location.assign('logout.php');
    
}
   })
     

   </script>
  </body>
</html>
<?php
}