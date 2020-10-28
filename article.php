<?php
  require 'connect.php';
  include 'seo-action.php';
  $title = mysqli_real_escape_string($conn, $_GET['title']);
$date = mysqli_real_escape_string($conn, $_GET['date']);
     $sql = "SELECT * FROM Article WHERE a_title='$title' AND a_date='$date'";
    
     $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
      
      
      while ($row = mysqli_fetch_assoc($result)) {
        
        $conn = new mysqli('localhost', 'root', '', 'blog_trial');

function createCommentRow($data) {
    global $conn;

    $response = '
            <div class="comment">
                <div class="user">'.$data['name'].' <span class="time">'.$data['createdOn'].'</span></div>
                <div class="userComment">'.$data['comment'].'</div>
                <div class="reply"><a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a></div>
                <div class="replies">';

    $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC LIMIT 1");
    while($dataR = $sql->fetch_assoc())
        $response .= createCommentRow($dataR);

    $response .= '
                        </div>
            </div>
        ';

    return $response;
}

if (isset($_POST['addComment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
    $isReply = $conn->real_escape_string($_POST['isReply']);
    $commentID = $conn->real_escape_string($_POST['commentID']);

    if ($isReply != 'false') {
        $conn->query("INSERT INTO replies (comment, commentID, userID, createdOn) VALUES ('$comment', '$commentID', '".$_SESSION['userID']."', NOW())");
        $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id ORDER BY replies.id DESC LIMIT 1");
    } else {
        $conn->query("INSERT INTO comments (userID, comment, createdOn) VALUES ('".$_SESSION['userID']."','$comment',NOW())");
        $sql = $conn->query("SELECT comments.id, name, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.id ORDER BY comments.id DESC LIMIT 1");
    }

    $data = $sql->fetch_assoc();
    exit(createCommentRow($data));
}

$sqlNumComments = $conn->query("SELECT id FROM seo_comment");
$numComments = $sqlNumComments->num_rows;
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $row['a_title']; ?> | Blogpost @Obala</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="keyword" content="google search console, Obala Joseph Ivan, Search|Engine Optimisation, Best confirm methods">
  <meta content="Here I cover top 5 advanced and confirmed methods to rank highly in google Search results" name="description">
  <meta name="authur" content="Obala Joseph Ivan">

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




<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="index.">Obala</a>
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
            <a class="nav-link js-scroll" href="seo-blog.php">SEO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="webhost-blog.php">Web Hosting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="code-editor-blog.php">Best IDES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="inde.php">Contact</a>
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
          echo $row['a_tag'];
          ?></h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="archives.php?tag=<?php
              echo $row['a_tag'];
              ?>"><?php echo substr($row['a_tag'], 0, 6); ?>..</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
          </ol>
        </div>
        <form class="searchhh" action="search.php" method="post">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search Blog" required="" aria-label="Search Blog">
                  <span class="input-group-btn">
                    <button name="submit" class="btn btn-secondary btn-search" type="submit">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
              <img src="<?php echo $row['a_img']; ?>" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
              <h1 class="article-title"><?php echo $row['a_title']; ?></h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="https://obala.ga/about.">Obala Joseph Ivan</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="seo-blog.php"><?php
          echo $row['a_tag'];
          ?></a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                   <?php
        require 'connect.php';
         $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM seo_comment WHERE post_id = '$id'";
$result = $conn->query($sql);
$queryResult = mysqli_num_rows($result);
?>
                  <a href="#"><?php echo $queryResult; ?> </a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              <?php echo $row['a_text']; ?>
            </div>
          </div>
        </section>
        
        
        <!---- comment form-->

        
        				<div class="form-comments">
            <div class="title-box-2">
              <h3 class="title-left">
                Comment!
              </h3>
            </div>
            <form action="#suus" method="post" class="form-mf">
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
                <input type="hidden" value="<?php echo $row['id']; ?>" name="post_id" id="post_id">
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <textarea id="mainComment textMessge" class="form-control input-mf" placeholder="Comment *" name="comment"
                      cols="45" rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="button button-a button-big button-rouded" name="submit">Comment!</button>
                  <div id="suus" class="alert alert-<?php echo $alert; ?> mt-2">
                <?php echo $message; ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    
  <!-- getting Comments from database --->
 <section>
        <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        require 'connect.php';
        $sql = "SELECT * FROM `seo_comment` WHERE post_id='$id'";
      
$result = $conn->query($sql);
$queryResult = mysqli_num_rows($result);
?>
        <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments (<?php
              if ($queryResult > 0) {
              
              ?><span class='text-success'><?php echo $queryResult;
              //echo $numComments; ?></span><?php
              
              }else {
                echo("<span class='text-warning'>0</span>");
              }
              
              ?>)</h4>
            </div>
            
        <?php
        
        
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <ul class='list-comments'><li><div class='comment-avatar'><img src='./blog-img/profile.png'></div> <div class='comment-details'><h4 class='comment-author'><?php echo $row["a_name"]; ?></h4><span><?php echo $row["cur_date"] ?></span><p><?php echo $row['a_comment']; ?></p><a href='javascript:void(0)' data-commentID='<?php echo $data['id']; ?>' onclick="reply(this)">Reply</a>
        </div><li></ul>
        <?php
    }
} else {
    echo "<div class='alert-warning' style='padding:20px'>No Comment</div>";
}


  ?>
            
            </div>
            </div>
            
      
      </section>
      
      
            
<section>
<div class="row replyRow" style="display:none">
    <div class="col-md-10 col-xs-12">
        <textarea style="width:60%;" class="form-control input-mf" id="replyComment" placeholder="Add Reply to Comment" rows="3" cols="30"></textarea><br><div>
          
        <button style="float:right" class="btn-secondary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
        <button style="float:right" class="btn-default btn mr-1" onclick="$('.replyRow').hide();">Close</button>
        
        </div>
    </div>
</div>
</div>
       </section>    
        <div class="clearfix col-md-4">
          <div class="widget-sidebar sidebar-search">
            <h5 class="sidebar-title">Search</h5>
            <div class="sidebar-content">
              <form method="post" action="search.php">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search for..." aria-label="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="submit" name="submit">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <?php

$sql = "SELECT * FROM Article ORDER BY Article.id DESC LIMIT 4";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
    
 ?>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                                <?php
                if ($queryResult > 0) {  
      while ($row = mysqli_fetch_assoc($result)) {
        
        echo "<li>
        <a href='article.php?title=".$row['a_title']."&date=".$row['a_date']."&id=".$row['id']."'>
        ".$row['a_title']."
        
        </a></li>";
        
      }
    }
                ?>
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
                  <a href="#"><?php
            $sql = "SELECT * FROM seo_tags";
$result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {  
                  echo $row["tag_1"];
                  
                  
          
                  
               ?></a>
                </li>
                <li>
                  <a href="#"><?php
                  echo $row["tag_2"];
                  
                  
                  ?></a>
                </li>
                <li>
                  <a href="#"><?php
                  echo $row["tag_3"];
                  
                  
                  ?></a>
                </li>
                <li>
                  <a href="#"><?php
                  echo $row["tag_4"];
                  
                  
                  ?></a>
                </li>
                <li>
                  <a href="#">UI/UX Designs</a>
                </li>
                <li>
                  <a href="#">JavaScript</a>
                </li><?php
          }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->
  
        
         <?php
        
        include("newsletter.php");
                  ?>
                </section>
                
                
        
           <?php
           include('footer.php');
    }
   ?>

        

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
