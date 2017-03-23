<?php
include("database.php");
if(isset($_GET['approve_comment'])) {
    $approve_id = $_GET['approve_comment'];
    $approve_comment = "update comments set status='zaakceptowany' where comment_id='$approve_id'";  
    $run_approve = mysql_query($approve_comment);
    echo "<script>alert('Komentarz został zaakceptowany.')</script>";
    echo "<script>window.open('../admin/index.php?view_comments','_self')</script>";  
}  
?>
