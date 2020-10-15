<?php
    $conn = new mysqli("localhost","root","","comment");
    if ($conn->connect_error){
        die('jal obala your connection has falied');
    }
?>