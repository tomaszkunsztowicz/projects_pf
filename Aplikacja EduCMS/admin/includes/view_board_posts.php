<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_board_post" class="myButton">Dodaj ogłoszenie</a></div>
 <?php
include("includes/database.php");
?>

<div class="CSSTableGenerator">
<table>
<tr>
        <td>ID</td>
        <td>Tytuł</td>
        <td>Data</td>
        <td>Widoczny</td>
        <td>Edytuj</td>
        <td>Usuń</td>
</tr> 
 
<?php
    $get_board_posts = "select * from board_posts";
    $run_board_posts = mysql_query($get_board_posts);
    while ($row_board_posts = mysql_fetch_array($run_board_posts)){
    $board_post_id = $row_board_posts['board_post_id'];
    $board_post_title = $row_board_posts['board_post_title'];
    $board_post_visible = $row_board_posts['board_post_visible'];
    $board_post_date = $row_board_posts['board_post_date'];
        
 ?>  
    
        <td><?php echo $board_post_id; ?></td>
        <td><?php echo $board_post_title; ?></td>
        <td><?php echo $board_post_date; ?></td>
        <td><?php echo $board_post_visible; ?></td>
 
        <td><a href="index.php?edit_board_post=<?php echo $board_post_id; ?>" class="myButton">Edytuj</a></td>
<td>
<a href="includes/delete_board_post.php?delete_board_post=<?php echo $board_post_id; ?>" class="myButton">Usuń</a></td> 
            
    </tr>
    <?php } ?>
    
</table>
    </div>
