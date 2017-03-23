<?php
include("database.php");
if(isset($_GET['delete_class'])) {
    $delete_id = $_GET['delete_class'];
    $delete_class = "delete from classes where class_id='$delete_id'";  
    $run_delete = mysql_query($delete_class);
    echo "<script>alert('Klasa została usunięta')</script>";
    echo "<script>window.open('../index.php?view_classes','_self')</script>";  
}  
?>
