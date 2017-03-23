<?php
include("database.php");
if(isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    $delete_user = "delete from users where id='$delete_id'";  
    $run_delete = mysql_query($delete_user);
    echo "<script>alert('Użytkownik został usunięty.')</script>";
    echo "<script>window.open('../index.php?view_users','_self')</script>";  
}  
?>
