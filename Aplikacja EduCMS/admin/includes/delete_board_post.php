<?php
include("database.php");
if(isset($_GET['delete_board_post'])) {
    $delete_id = $_GET['delete_board_post'];
    $delete_post = "delete from board_posts where board_post_id='$delete_id'";
    $run_delete = mysql_query($delete_post);
    echo "<script>alert('Artykuł został usunięty.')</script>";
    echo "<script>window.open('../index.php?view_board_posts','_self')</script>";
}
?>