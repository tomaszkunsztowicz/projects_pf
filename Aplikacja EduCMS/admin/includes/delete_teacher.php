<?php
include("database.php");
if(isset($_GET['delete_teacher'])) {
    $delete_id = $_GET['delete_teacher'];
    $delete_teacher = "delete from teachers where id='$delete_id'";  
    $run_delete = mysql_query($delete_teacher);
    echo "<script>alert('Wychowawca został usunięty.')</script>";
    echo "<script>window.open('../index.php?view_classes','_self')</script>";  
}  
?>
