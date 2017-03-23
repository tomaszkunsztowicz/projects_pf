<?php
include("database.php");
if(isset($_GET['view_comment_text'])) {
    $id = $_GET['view_comment_text'];
    $view_text = "select * from comments where comment_id='$id'";  
    $run_text = mysql_query($view_text);
    
    while ($row_text = mysql_fetch_array($run_text)){
    $text = $row_text['comment_text'];
    
    echo "<script>alert('Tresc komentarza:$text')</script>";
    echo "<script>window.open('../admin/index.php?view_comments','_self')</script>";  
}  
}
?>