
<?php

   session_start();
   include "header.php";
   include "connect.php";
   $tag = mysqli_real_escape_string($conn, $_GET['tag']);

?>
                          <?php
$sql = "SELECT * FROM Article WHERE a_tag='$tag' ORDER BY Article.id DESC";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
    function _time_($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ',$string) . ' ago' : 'just now';
}
 ?>
<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
     
      <div class="row">
                        <?php
                if ($queryResult > 0) {  
      while ($row = mysqli_fetch_assoc($result)) {
  $date = _time_($row['a_date']);
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
              <div class='post-date'>
                <span class='ion-ios-clock-outline'></span> ".$date."
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
  
