<?php
require "post_action.php";
?>

<div class="content mx-4 mt-5"
<div class="container mt-3 card">
  <h3 class="text-center">Create New post</h3>
  <form method="post" action="index.php" enctype="file">
  <div class="form-group">
   <label>Post Title</label><input type="name" placeholder="Post Title" class="form-control" name="title">
  </div>
   <div class="form-group">
   <label>Post Author</label><input type="name" placeholder="Post Author" class="form-control" name="author">
  </div>
   <label>Post image</label>
   <div class="form-group">
    <input type="file" placeholder="Post Author" class="form-control" name="img_post">
  </div>
   <label>Post content</label>
  <textarea name="post_content"></textarea>
  
   <div class="form-group mt-3">
    <input type="submit" class="btn btn-success" value="Add post" name="post">
  </div>
  </form>
        <div class="bg-warning p-0"><h5 class="text-center text-danger">
        <?=
            $error;
        ?></h5></div>
         <div class="bg-success"><h5 class="text-center text-light">
           <?=
               $success;
           ?>
         </h5></div>
       
</div>
</div>