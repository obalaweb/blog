<html>
    <head>
        <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css"/>
        <title>display p!ge</title>
    </head>
    <body>
        <?php
           $mysqli = mysqli_connect('localhost','root','','blog_trial');
           $table = 'test';
           
          // $result = "SELECT * FROM test" or die($mysqli->error);
        
          $result = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);
          while ($data = $result->fetch_assoc()){
            print "$data";
          }
          
           ?>
           
        

        
        
        