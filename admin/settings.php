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
   <div class="content-wrapper pt-3">
     <div id="append" class="container">
       <div class="title">
         <p class="text-left"><a style="color: #751aff !important; font-size:18px !important; font-weight:bolder !important;" href="#" onclick="backB()">SETTINGS</a><span style="font-weight:bolder;" id="innerTab"></span></p>
       </div>
       <div class="easeout">
       <div class="main-content">
          <div class="container">
              <button onclick="openGen()" class="btn px-3 btn-default btn-md">General</button>
              <button onclick="openApp()" class="btn px-3 m-2 btn-default btn-md">Appearance</button>
              <button onclick="openMul()" class="btn px-3 btn-default btn-md">Multimedia</button>
              
              <button onclick="openOpt()" class="btn px-3 btn-default btn-md">Optimisations</button>
          </div>
          
          
       </div>
       </div>
       <div class="options" id="removed">
       <div class="general">
         <div class="container">  
         <div class="innerbox">
           <h2>General</h2>
           <img src="../blog-img/search1.jpg" class="img-fluid" />
         </div>
         </div>
 
</div>
       <div class="appear">
         <div class="container">  
         <div class="innerbox">
           <h2>Appearance</h2>
           <img src="../blog-img/search1.jpg" class="img-fluid" />
         </div>
         </div>
 
</div>
       <div class="multi">
         <div class="container">  
         <div class="innerbox">
           <h2>Multimedia</h2>
           <img src="../blog-img/search1.jpg" class="img-fluid" />
         </div>
         </div>
 
</div>
       <div class="optimise">
         <div class="container">  
         <div class="innerbox">
           <h2>Optimisations</h2>
           <img src="../blog-img/search1.jpg" class="img-fluid" />
         </div>
         </div>
 
</div>
</div>
     </div>
   </div>
   
   
    <!-- 
===============================
===============================
        MAIN CONTENT
===============================
===============================
----
<div class="main-container">
  <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit inventore porro ipsa beatae officia. Aspernatur quod fugit culpa voluptatem eveniet distinctio quam, maiores cumque atque vel, quo veniam facilis minus?</h2>
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
       <a href="index.php"><i class="fa fa-home"></i>Dashboard</a>
       <a href="posts.php"><i class="fa fa-home"></i>Posts</a>
       <a href="comments.php"><i class="fa fa-snapchat"></i>Comments</a>
       <a class="active" href="settings.php"><i class="fa fa-tools"></i>Setting</a>
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
   
   function backB() {
       $(".main-content").css("display", "block");
       $("#innerTab").text("");
       $("#removed").css("display", "none");
   }
     function openGen() {
       $(".main-content").css("display", "none");
       $("#innerTab").text("/General");
       $(".general").css("display", "block");
       $(".options").css("display", "block");
     }
     
     function openApp() {
       $(".main-content").css("display", "none");
       $("#innerTab").text("/Appearance");
       $(".appear").css("display", "block");
       $(".options").css("display", "block");
     }
     function openMul() {
       $(".main-content").css("display", "none");
       $("#innerTab").text("/Multimedia");
       $(".multi").css("display", "block");
       $(".options").css("display", "block");
     }
     function openOpt() {
       $(".main-content").css("display", "none");
       $("#innerTab").text("/Optimisations");
       $(".optimise").css("display", "block");
       $(".options").css("display", "block");
     }
   </script>
  </body>
</html>
<?php
}