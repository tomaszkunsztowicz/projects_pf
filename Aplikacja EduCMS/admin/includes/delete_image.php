<?php
include("database.php");
if(isset($_GET['delete_image'])) {
    $delete_id = $_GET['delete_image'];
    $select_gal = "select * from gallery_photos where mid='$delete_id'";  
    $run_gal = mysql_query($select_gal);
    while ($row_gal=mysql_fetch_array($run_gal)) {
    $did = $row_gal['mid'];
    $cid = $row_gal['cid'];
    $delete_gal = "delete from gallery_photos where mid='$did'";  
    $run_delete = mysql_query($delete_gal);
    echo "<script>alert('Obrazek został usunięty')</script>";
    echo "<script>window.open('../index.php?view_images=$cid','_self')</script>";  
}  
}
    
?>
