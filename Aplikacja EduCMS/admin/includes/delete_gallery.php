<?php
include("database.php");
if(isset($_GET['delete_gallery'])) {
    $delete_id = $_GET['delete_gallery'];
    $delete_gal = "delete from gallery_category where category_id='$delete_id'";  
    $run_delete = mysql_query($delete_gal);
    echo "<script>alert('Galeria została usunięta')</script>";
    echo "<script>window.open('../index.php?view_galleries','_self')</script>";  
} 
  
?>