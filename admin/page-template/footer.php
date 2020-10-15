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