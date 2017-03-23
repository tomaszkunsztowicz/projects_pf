<link rel="stylesheet" href="includes.css" media="all"/>
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=400,width=600');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>
<?php
include("includes/database.php");
?>

<div class="CSSTableGenerator">
<table>
 
    <tr>
        <td>ID</td>
        <td>ID Art./Str.</td>
        <td>Użytkownik</td>
        <td>E-mail</td>
        <td>Data dodania</td>
        <td>Status</td>
        <td>Treść</td>
        <td>Zaakceptuj</td>
        <td>Zablokuj</td>
        <td>Usuń</td>
    </tr>
     
<?php
 $get_comments = "select * from comments";
$run_comments = mysql_query($get_comments);
while ($row_comments = mysql_fetch_array($run_comments)){
    $id = $row_comments['comment_id'];
    $post_id = $row_comments['post_id'];
    $name = $row_comments['comment_name'];
    $email= $row_comments['comment_email'];
    $status = $row_comments['status'];
    $date = $row_comments['date'];
 ?>   
        <tr>     
        <td><?php echo $id; ?></td>
  
        <td><a href="post_text.php?view_post_text=<?php echo $post_id; ?>" class="myButton"
               onclick="return popitup('post_text.php?view_post_text=<?php echo $post_id; ?>')"
               ><?php echo $post_id; ?></a></td>  
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $date; ?></td>    
        <td><?php echo $status; ?></td>  
        <td><a href="index.php?view_comment_text=<?php echo $id; ?>" class="myButton">Treść</a></td>             
        <td><a href="index.php?approve_comment=<?php echo $id; ?>" class="myButton">Akceptuj</a></td>
        <td><a href="index.php?block_comment=<?php echo $id; ?>" class="myButton">Zablokuj</a></td>          
        <td><a href="index.php?delete_comment=<?php echo $id; ?>" class="myButton">Usuń</a></td>     
</tr>
    
    <?php } ?>
</table>
</div>
