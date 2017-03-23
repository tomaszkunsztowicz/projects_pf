<?php
include("database.php");
if(isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    $delete_post = "delete from categories where cat_ID='$delete_id'";  
    $run_delete = mysql_query($delete_post);
    echo "<script>alert('Kategoria została usunięta')</script>";
    echo "<script>window.open('../index.php?view_categories','_self')</script>";  
} 
  
?>