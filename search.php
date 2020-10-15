<?php
include 'header.php';
?>
<h1 align=center>Search Results</h1>

<div class="article-container">
  <?php
    if (isset($_POST['submit'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $sql = "SELECT * FROM Article WHERE a_title LIKE '%$search%' || a_tag LIKE '%$search%' || a_date LIKE '%$search%' || a_author LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
      
      
      if ($queryResult > 0) {
if ($queryResult > 1){
  echo "<p style='color:green; text-align:center'>There are ".$queryResult." results!</p>";
}else {
  echo "<p style='color:green; text-align:center'>There is ".$queryResult." result!</p>";
}
        while ($row = mysqli_fetch_assoc($result)) {
         echo "<div style='height:10px' class='display-none'>gyy</div>"; ?>
          <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
     
      <div class="row"> <?php
        echo "<div class='col-md-4'>
          <div class='card card-blog'>
            <div class='card-img'>
              <a href='article.php?title=".$row['a_title']."&date=".$row['a_date']."'><img src='".$row['a_img']."' alt='Search Engine Optimisation' class='img-fluid'></a>
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
        ?>
        
      </div>
    </div>
  </section>
  <?php
        }
      }else {
        echo "<p class='text-danger text-center'>There is no result match for You're search</p> </div></div>";
      }
    }
  ?>
</div>
</div>
<div class="clearfix"></div>
<?php
include 'footer.php';
?>