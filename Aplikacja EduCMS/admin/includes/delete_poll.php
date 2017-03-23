<?php
include("database.php");
if(isset($_GET['delete_poll'])) {
    $delete_id = $_GET['delete_poll'];
    $delete_poll = "delete from polls where id='$delete_id'";  
    $run_delete = mysql_query($delete_poll);
    echo "<script>alert('Ankieta została usunięta.')</script>";
    echo "<script>window.open('../index.php?view_polls','_self')</script>";  
}  
?>
