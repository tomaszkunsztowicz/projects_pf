<?php
include("database.php");
if(isset($_GET['view_post_text'])) {
    $id = $_GET['view_post_text'];
    $view_text = "select * from posts where post_id='$id'";  
    $run_text = mysql_query($view_text);
    
    while ($row_text = mysql_fetch_array($run_text)){
    $text = $row_text['post_content'];

    echo "$text";
  
}  
}
?>