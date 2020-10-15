$sql = "SELECT * FROM seo_comment";
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
        echo "<ul class='list-comments'><li><div class='comment-avatar'><img src='./blog-img/profile.png'></div> <div class='comment-details'><h4 class='comment-author'>" . $row["a_name"]. "</h4><span>".$row["cur_date"]."</span><p>".$row['a_comment']."</p><a href='javascript:void(0)' data-commentID='".$data['id']."' onclick='reply(this)'>Reply</a> </div><li></ul>";
    }
} else {
    echo "<h4 class='text-danger'>No Comment</h4>";
}


  ?>
            