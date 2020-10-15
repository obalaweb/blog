<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Blog posts | Obala Joseph Ivan</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">

</head>

<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="index.php">Obala</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#work">Work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/IMG_ld2j38.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Code Editors</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Library</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  
  
  
  <!--/ post body /--->
<?php
   include "post_body.php";
?>
  <!--/ post body /--->   
          <!--- comment form ---->
  
      <div class="form-comments">
            <div class="title-box-2">
              <h3 class="title-left">
                Leave a Reply
              </h3>
              </div>
<form action="editor.php#suus" method="post" class="form-mf">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="name" class="form-control input-mf" name="name" id="inputNme" placeholder="Name *" required>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control input-mf" id="inptEmail1" placeholder="Email *" required>
                  </div>
                </div>
                
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <textarea id="textMessge" class="form-control input-mf" placeholder="Comment *" name="comment"
                      cols="45" rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="button button-a button-big button-rouded" name="submit">Comment!</button>
                    <h5 id="suus" class="float-right p-2 text-success"><?= $success; ?></h5>  <h5 class="float-right p-2 text-danger"><?= $error; ?></h5>
                </div>
              </div>
            </form>
          </div>
        </div>
        
        
        
          <!-- getting Comments from database --->
      
  <?php
        
        require('../connect.php');
        
        $sql = "SELECT * FROM editor_comment";
$result = $conn->query($sql);

$queryResult = mysqli_num_rows($result);
?>
        <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments (<?php
              if ($queryResult > 0) {
              
              ?><span class='text-success'><?php echo $queryResult;?></span><?php
              
              }else {
                echo("<span class='text-danger'>0</span>");
              }
              
              ?>)</h4>
            </div>
            
 <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<ul class='list-comments'><li><div class='comment-avatar'><img src='" . $row["a_img"]. "'></div> <div class='comment-details'><h4 class='comment-author'>" . $row["a_name"]. "</h4><span>".$row["cur_date"]."</span><p>".$row['a_comment']."</p><a href='#'>Reply</a> </div><li></ul>";
    }
} else {
    echo "<h4 class='text-danger'>No Comment</h4></div>";
}



    
  ?>
            
            </div>
            </div>
        
        
        
        <div class="col-md-4">
          <div class="widget-sidebar sidebar-search">
            <h5 class="sidebar-title">Search</h5>
            <div class="sidebar-content">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="button">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                <li>
                  <a href="#">Atque placeat maiores.</a>
                </li>
                <li>
                  <a href="#">Lorem ipsum dolor sit amet consectetur</a>
                </li>
                <li>
                  <a href="#">Nam quo autem exercitationem.</a>
                </li>
                <li>
                  <a href="#">Atque placeat maiores nam quo autem</a>
                </li>
                <li>
                  <a href="#">Nam quo autem exercitationem.</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Archives</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                <li>
                  <a href="#">September, 2017.</a>
                </li>
                <li>
                  <a href="#">April, 2017.</a>
                </li>
                <li>
                  <a href="#">Nam quo autem exercitationem.</a>
                </li>
                <li>
                  <a href="#">Atque placeat maiores nam quo autem</a>
                </li>
                <li>
                  <a href="#">Nam quo autem exercitationem.</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="widget-sidebar widget-tags">
            <h5 class="sidebar-title">Tags</h5>
            <div class="sidebar-content">
              <ul>
                <li>
                  <a href="#">Web.</a>
                </li>
                <li>
                  <a href="#">Design.</a>
                </li>
                <li>
                  <a href="#">Travel.</a>
                </li>
                <li>
                  <a href="#">Photoshop</a>
                </li>
                <li>
                  <a href="#">Corel Draw</a>
                </li>
                <li>
                  <a href="#">JavaScript</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

                <section>
                  <?php
            include("../newsletter.php");
                  ?>
                </section>
                
                
                

<?php

include "post_footer.php"
?>