<?php
include("database.php");
if(isset($_GET['delete_comment'])) {
    $delete_id = $_GET['delete_comment'];
    $delete_link = "delete from comments where comment_id='$delete_id'";  
    $run_delete = mysql_query($delete_link);
    echo "<script>alert('Komentarz został usunięty.')</script>";
    echo "<script>window.open('../admin/index.php?view_comments','_self')</script>";  
}  
?>
