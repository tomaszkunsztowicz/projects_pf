<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_category" class="myButton">Dodaj kategorię</a></div>
<?php
include("includes/database.php");
     $get_cats = "select * from categories";
    $run_cats = mysql_query($get_cats);
?>

<div class="CSSTableGenerator">
<table>

    
    <tr>
        <td>ID</td>
        <td>Sort ID</td>
        <td>Nazwa</td>
        <td>Położenie</td>
        <td>Widoczna</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr>
    
<?php
while ($row_cats = mysql_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_ID'];
    $cat_title = $row_cats['cat_title'];
    $cat_position = $row_cats['position'];
    $sort_id = $row_cats['sort_id'];
    $visible = $row_cats['visible'];
    
 ?>   
        <tr>     
        <td><?php echo $cat_id; ?></td>
        <td><?php echo $sort_id; ?></td>    
        <td><?php echo $cat_title; ?></td>
        <td><?php echo $cat_position; ?></td>
        <td><?php echo $visible; ?></td>
            
        
    <td><a href="index.php?edit_category=<?php echo $cat_id; ?>" class="myButton">Edytuj</a></td>
<td>
<a href="includes/delete_category.php?delete_category=<?php echo $cat_id; ?>" class="myButton">Usuń</a></td>     
    </tr>
    <?php } ?>
</table>
</div>
