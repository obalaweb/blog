
<?php


   session_start();
   include "header.php";
   include "connect.php";
?>
                          <?php

$sql = "SELECT * FROM Article ORDER BY Article.id DESC";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
  

function _fb_time($timestamp) {
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $diff = $current_time - $time_ago;
  $sec = $diff;
  $min = round($sec / 60);
  $hr = round($diff / 3600);
  $day = round($diff / 86400);
  $wk = round($diff / 604800);
  $mon = round($diff / 2629440);
  $yr = round($diff / 31553280);
  
  if ($sec < 60) {
    return "just now";
  }
  else if ($min <= 60) {
    if ($min == 1) {
      return "a min ago";
    }else {
      return "$min minutes ago";
    }
  }
  else if ($hr <= 24) {
    if ($hr == 1) {
      return "an hour ago";
    }
    else {
      return "$hr hours ago";
    }
  }
  else if ($day <= 7) {
    if ($day ==1) {
      return "yesterday";
    }
    else {
      return "$day days ago";
    }
  }
  else if ($wk <= 4.3) {
    if ($wk ==1) {
      return "a week ago";
    }
    else {
      return "$wk weeks ago";
    }
  }
  else if ($mon <= 12) {
    if ($mon ==1) {
      return "a month ago";
    }
    else {
      return "$mon months ago";
    }
  }
  else {
    if ($yr ==1) {
      return "a year ago";
    }
    else {
      return "$yr years ago";
    }
  }
}

    
 ?>
<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
     
      <div class="row">
                        <?php
                if ($queryResult > 0) {  
      while ($row = mysqli_fetch_assoc($result)) {
        

$date = _fb_time($row['a_date']);
/* lapsed_string('2013-05-01 00:22:35', true);*/
        
        echo "<div class='col-md-4'>
          <div class='card card-blog'>
            <div class='card-img'>
              <a href='article.php?title=".$row['a_title']."&date=".$row['a_date']."&id=".$row['id']."'><img src='".$row['a_img']."' alt='".$row['a_tag']."' class='img-fluid'></a>
            </div>
            <div class='card-body'>
              <div class='card-category-box'>
                <div class='card-category'>
                  <h6 class='category'><a style='color:#fff !important;' href='archives.php?tag=".$row['a_tag']."'>".$row['a_tag']."</a></h6>
                </div>
              </div>
              <h4 class='card-title'><a href='article.php?title=".$row['a_title']."&date=".$row['a_date']."&id=".$row['id']."'>".$row['a_title']."</a></h4>
              <p class='card-description'>
                ".substr($row['a_text'], 0, 100)."
               .. <b><a href='article.php?title=".$row['a_title']."&date=".$row['a_date']."&id=".$row['id']."'>Readmore</a></b></p>
            </div>
            <div class='card-footer'>
              <div class='post-author'>
                <a href='#'>
                  <img src='img/IMG_ld2j38.jpg' alt='Obala Joseph Ivan' class='avatar rounded-circle'>
                  <span class='author'>Obala Joseph Ivan</span>
                </a>
              </div>
              <div class='post-date'> <span class='ion-ios-clock-outline'></span> <small>".$date."</small>
                
              </div>
            </div>
          </div>
        </div>";
      }
    }
                ?>
        
      </div>
    </div>
  </section>
  
  <section>
     <?php
         include "newsletter.php";
         
         //include('mail.php');
     ?>
     
  </section>
  

  
  <?php
    include 'footer.php';
  ?>
  
