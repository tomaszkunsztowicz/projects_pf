<?php
include("database.php");
if(isset($_GET['delete_link'])) {
    $delete_id = $_GET['delete_link'];
    $delete_link = "delete from recommended_links where link_id='$delete_id'";  
    $run_delete = mysql_query($delete_link);
    echo "<script>alert('Link został usunięty.')</script>";
    echo "<script>window.open('../index.php?view_links','_self')</script>";  
}  
?>
