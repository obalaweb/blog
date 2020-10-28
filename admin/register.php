<?php
require("server.php");

?>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="styles/style.css"/>
        <title>Login Mr. Admin!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if ($_GET["Empty"] == true || $_GET["Invalid"] == true) {
  ?>
  <script>
    document.querySelector(".errorMsg").style.display = "block";
  </script>
  <?php
}
        ?>
    </head>
    <body>
       <div class="container">
           <header>Admin Login</header>
          <form action="process.php" method="post">
           <div class="errorMsg">
                          <?php
              if ($_GET["Invalid"] == true) {
              
              ?>
              
              <div class="alert-warning py-2">
                <h5 class="text-center">
              <?php echo($_GET["Invalid"]); ?></h5>
              </div>
              <?php
              }
              ?>
                          <?php
              if ($_GET["Empty"] == true) {
              
              ?>
              
              <div class="alert-warning py-2">
                <h5 class="text-center">
              <?php echo($_GET["Empty"]); ?></h5>
              </div>
              <?php
              }
              ?>
           </div>
               
                   <div class="field">
                       <input id="name" name="uname" type="text" onkeyup="active()" placeholder="Username">
                   </div>
                   <div class="field">
                       <input id="email" name="uemail" type="email" onkeyup="active()" placeholder="User Email">
                   </div>
                   <div class="field">
                       <input id="passwrd" name="upass" onkeyup="active_2" type="password" placeholder="Enter Password">
                   <div class="show">
                       Show
                   </div>
                    </div>
                       <button  type="submit" name="register">Signup</button>
           </form>
        </div>
        
      
       
    </body>
</html>





