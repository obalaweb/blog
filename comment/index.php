<?php
    require('action.php');
    
    $sqlNumComments = $conn->query("SELECT id FROM comments");
$numComments = $sqlNumComments->num_rows;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="stylesheet" href="styles/bootstrap.css">
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <title>commenting system</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body class='bg-dark'>
       <div class="container">
           <div class="row justify-content-center">
              <div class="col-lg-4 bg-light rounded mt-2">
               <h4 class="text-center mt-2">Post Comment</h4>
               <form action="index.php" method="post" class="p-2">
                 <div class="form-group">
                       <input type="name" name="name" required="" placeholder="Name" class="form-control rounded">
                   </div>
                   <div class="form-group">
                   <textarea class="form-control mt-3" required="" cols="8" rows="6" type="text" placeholder="write your comment" name="comment"></textarea>
                   </div>
                   
                   <div class="form-group">
                       <input type="submit" name="submit" value="Post comment" class="btn btn-primary">
                        
                       <h5 class="float-right p-2 text-success"><?= $success; ?></h5>  <h5 class="float-right p-2 text-danger"><?= $error; ?></h5>
                   </div>
                   </div>
               </form>
           </div>
           <div class="mt-2 row justify-content-center">
             <div class="col-lg-5 bg-light rounded p-3">
               <h4 class="text-center"><?php echo $numComments; ?>9Comments</h4>
               <?php
              
        $sql = "SELECT a_name, a_comment, a_prof FROM comment_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='card bg-light'><div class='card-body'><h5>" . $row["a_name"]. "</h5> <p class='card-text'>" . $row["a_comment"]. "</p></div><div class='card-footer'><img src='../".$row["a_prof"]."' class='img-fluid'></div></div>";
    }
} else {
    echo "No Comment";
}


    
               ?>
             </div>
             
           </div>
       </div>
        <script src="scripts/bootstrap.min.js"></script>
        <script src="scripts/jquery.min.js"></script>
        
        <script>
          var isReply = false, commentID = 0, max = <?php echo $numComments ?>;
        </script>
    </body>
</html>
