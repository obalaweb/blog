<?php
require("server.php");


if ($_GET['Del'] == true) {
  $sql = "DELETE FROM Article WHERE id=".$_GET['Del']."";

if ($db->query($sql) === TRUE) {
    header("location:index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

}