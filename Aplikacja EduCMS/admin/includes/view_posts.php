<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_post" class="myButton">Dodaj artykuł</a></div>
 <?php
include("includes/database.php");
    $get_posts = "select * from posts where category_id>0";
    $run_posts = mysql_query($get_posts); ?>

<div class="CSSTableGenerator">
<table>
<tr>
        <td>ID</td>
        <td>Sort ID</td>
        <td>Tytuł</td>
        <td>Kategoria ID</td>
        <td>Autor</td>
        <td>Obraz</td>
        <td>Widoczny</td>
        <td>Galeria ID</td>
        <td>Komentuj</td>
        <td>Edytuj</td>
        <td>Usuń</td>
</tr> 
 
<?php
    $get_posts = "select * from posts where category_id>'0'";
    $run_posts = mysql_query($get_posts);
    while ($row_posts = mysql_fetch_array($run_posts)){
        
    $post_id = $row_posts['post_id'];
    $post_sid = $row_posts['post_sid'];
    $post_title = $row_posts['post_title'];
    $post_author = $row_posts['post_author'];
    $post_image = $row_posts['post_image'];
    $post_visible = $row_posts['post_visible'];
    $post_gallery = $row_posts['post_gallery_id'];
    $post_allow_comments = $row_posts['post_allow_comments'];    
    $category_id = $row_posts['category_id'];    
 ?>  
    
    <td><?php echo $post_id; ?></td>
        <td><?php echo $post_sid; ?></td>
        <td><?php echo $post_title; ?></td>
        <td><?php echo $category_id; ?></td>
        <td><?php 
        if ($post_author != 'null' or '') {
       echo "$post_author";
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
        echo "<td>n/a</td>";
        }  
        ?> 
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
        <td><a href="index.php?edit_post=<?php echo $post_id; ?>" class="myButton">Edytuj</a></td>
<td>
<a href="includes/delete_post.php?delete_post=<?php echo $post_id; ?>" class="myButton">Usuń</a></td> 
            
    </tr>
    <?php } ?>
    
</table>
    </div>
