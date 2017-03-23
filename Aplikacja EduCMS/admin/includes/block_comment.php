<?php
include("database.php");
if(isset($_GET['block_comment'])) {
    $block_id = $_GET['block_comment'];
    $block_comment = "update comments set status='zablokowany' where comment_id='$block_id'";  
    $run_block = mysql_query($block_comment);
    echo "<script>alert('Komentarz został zablokowany.')</script>";
    echo "<script>window.open('../admin/index.php?view_comments','_self')</script>";  
}  
?>
