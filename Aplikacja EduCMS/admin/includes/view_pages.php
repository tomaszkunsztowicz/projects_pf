<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_page" class="myButton">Dodaj stronę</a></div>
 <?php
include("includes/database.php");
    $get_posts = "select * from posts where is_page='yes'";
    $run_posts = mysql_query($get_posts); ?>

<div class="CSSTableGenerator">
<table>
<tr>
        <td>ID</td>
        <td>Sort ID</td>
        <td>Tytuł</td>
        <td>Autor</td>
        <td>Obraz</td>
        <td>Położenie</td>
        <td>Widoczna</td>
        <td>Galeria ID</td>
        <td>Komentuj</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr> 
      
<?php
    while ($row_posts = mysql_fetch_array($run_posts)){
        
    $post_id = $row_posts['post_id'];
    $post_sid = $row_posts['post_sid'];
    $post_title = $row_posts['post_title'];
    $post_author = $row_posts['post_author'];
    $post_image = $row_posts['post_image'];
    $position = $row_posts['is_page_position'];
    $post_visible = $row_posts['post_visible'];
    $post_gallery = $row_posts['post_gallery_id'];
    $post_allow_comments = $row_posts['post_allow_comments'];
    
 ?> 
        <td><?php echo $post_id; ?></td>
        <td><?php echo $post_sid; ?></td>
        <td><?php echo $post_title; ?></td>
        <td><?php 
        if ($post_author != (('') or ('null'))) {
       echo "echo $post_author";
        }
        else {
        echo "brak";
        }             
            ?></td>
        <?php
        if ($post_image != '') {
        echo "<td><img src='post_images/$post_image' width='40' height='40'></td>";
        }
        else {
        echo "<td>brak</td>";
        }  
        ?>
        <td><?php echo $position; ?></td>   
        <td><?php echo $post_visible; ?></td>
        <?php 
        if ($post_gallery != 0){
        echo "<td>$post_gallery</td>";
        }
        else {
        echo "<td>brak</td>";   
        }
        ?>
        <td><?php echo $post_allow_comments; ?></td>        
        <td><a href="index.php?edit_page=<?php echo $post_id; ?>" class="myButton">Edytuj</a></td>
<td>
<a href="includes/delete_page.php?delete_page=<?php echo $post_id; ?>" class="myButton">Usuń</a></td> 
            
    </tr>
    <?php } ?>
    
</table>
    </div>
