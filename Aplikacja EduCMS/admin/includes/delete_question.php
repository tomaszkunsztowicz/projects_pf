<?php
include("database.php");
if(isset($_GET['delete_question'])) {
    $delete_id = $_GET['delete_question'];
    $select_question = "select * from poll_questions where id='$delete_id'";  
    $run_question = mysql_query($select_question);
    while ($row_question=mysql_fetch_array($run_question)) {
    $id = $row_question['id'];
    $p_id = $row_question['pollid'];
    $delete_question = "delete from poll_questions where id='$id'";  
    $run_delete = mysql_query($delete_question);
    echo "<script>alert('Pytanie został usunięte.')</script>";
    echo "<script>window.open('../index.php?view_questions=$p_id','_self')</script>";  
    }  
}
    
?>
