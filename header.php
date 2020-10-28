<?php
include 'connect.php';
include('offersmail.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Most recent wed development updates | Obala Joseph Ivan</title>
  <meta content="width=device-width, initial-scale=1.0, user-scalable=0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  </head>

<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="index.html">Obala</a>
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
            <a class="nav-link js-scroll" href="seo.php">SEO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="webhost-blog.php">Web Hosting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="editor.php">Best IDES</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="https://www.obala.ga/about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="https://www.obala.ga#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="admin/">Admin</a>
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
          <h2 class="intro-title mb-4"><?php
         
        
          if (isset($_POST['submit'])){
            echo 'Search Results';
          }else {
            echo('Blog posts');
          }
          ?></h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
                <?php if ($_GET['tag']) {
                  ?>
  <li class="breadcrumb-item active">
<?php
                echo $_GET["tag"];
              
                ?>
              
            </li>
            <?php } 
    if (isset($_POST['submit'])){
            ?>
        
            <li class="breadcrumb-item">
              <a href="search.php"><?php
              
                echo 'Search';
              
              ?></a>
            </li>
            <?php } ?>
          </ol>
        </div>
  <!-- search place --->
          <div class="search-area">
            <form class="searchhh" action="search.php" method="post">
                <div class="input-group">
                  <input type="text" required="" name="search" class="form-control"
                  value="<?php
                  if (isset($_POST['submit'])) {
                    // code...
                 echo($_POST['search']);
                 
                 
                  }else {
                    echo("");
                  }
                  ?>"
               placeholder="<?php
                if (isset($_POST['submit'])){
                  echo($_POST['search'])
                ;}else {
                  echo('Search Blog');
                }
                ?>" aria-label="Search Blog">
                  <span class="input-group-btn">
                    <button name="submit" class="btn btn-secondary btn-search" type="submit">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
        </div>
  </div>
</section>
      </div>
      
    </div>
    
  </div>
  <!--/ Intro Skew End /-->
