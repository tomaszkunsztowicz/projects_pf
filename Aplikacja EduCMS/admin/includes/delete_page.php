<?php
include("database.php");
if(isset($_GET['delete_page'])) {
    $delete_id = $_GET['delete_page'];
    $delete_post = "delete from posts where post_id='$delete_id'";  
    $run_delete = mysql_query($delete_post);
    echo "<script>alert('Strona została usunięta')</script>";
    echo "<script>window.open('../index.php?view_pages','_self')</script>";  
} 
  
?>