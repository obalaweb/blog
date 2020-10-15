
<?php

   session_start();
   include "header.php";
   include "connect.php";
?>
                          <?php

$sql = "SELECT * FROM Article";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
    
 ?>
<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
     
      <div class="row">
                        <?php
                if ($queryResult > 0) {  
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='col-md-4'>
          <div class='card card-blog'>
            <div class='card-img'>
              <a href='article.php?title=".$row['a_title']."&date=".$row['a_date']."&id=".$row['id']."'><img src='".$row['a_img']."' alt='".$row['a_tag']."' class='img-fluid'></a>
            </div>
            <div class='card-body'>
              <div class='card-category-box'>
                <div class='card-category'>
                  <h6 class='category'>".$row['a_tag']."</h6>
                </div>
              </div>
              <h4 class='card-title'><a href='seo.php'>".$row['a_title']."</a></h4>
              <p class='card-description'>
                ".$row['a_text']."
              </p>
            </div>
            <div class='card-footer'>
              <div class='post-author'>
                <a href='#'>
                  <img src='img/IMG_ld2j38.jpg' alt='Obala Joseph Ivan' class='avatar rounded-circle'>
                  <span class='author'>Obala Joseph Ivan</span>
                </a>
              </div>
              <div class='post-date'>
                <span class='ion-ios-clock-outline'></span> ".$row['a_date']."
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
  
