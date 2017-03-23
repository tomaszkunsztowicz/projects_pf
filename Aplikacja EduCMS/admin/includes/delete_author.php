<?php
include("database.php");
if(isset($_GET['delete_author'])) {
    $delete_id = $_GET['delete_author'];
    $delete_author = "delete from authors where id='$delete_id'";  
    $run_delete = mysql_query($delete_author);
    echo "<script>alert('Autor został usunięty.')</script>";
    echo "<script>window.open('../index.php?view_authors','_self')</script>";  
}  
?>
