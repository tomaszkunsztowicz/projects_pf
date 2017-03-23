<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_link" class="myButton">Dodaj link</a></div>
<?php
include("includes/database.php"); ?>

<div class="CSSTableGenerator"> 
<table>

    <tr>
        <td>ID</td>
        <td>Sort ID</td>
        <td>Nazwa</td>
        <td>Url</td>
        <td>Obrazek</td>
        <td>Widoczny</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr>
    
<?php
    $get_links = "select * from recommended_links";
    $run_links = mysql_query($get_links);
while ($row_links = mysql_fetch_array($run_links)){
    $link_id = $row_links['link_id'];
    $link_name = $row_links['link_name'];
    $link_url = $row_links['link_url'];
    $link_sid = $row_links['sort_id'];
    $link_img = $row_links['image_path'];
    $link_vis = $row_links['visible']; 
 ?>   
    
    
    
    
        <tr>
        <td><?php echo $link_id; ?></td>
        <td><?php echo $link_sid; ?></td>
        <td><?php echo $link_name; ?></td>
        <td><?php echo $link_url; ?></td>
          <?php
        if ($link_img != '') {
        echo "<td><img src='$link_img' width='40' height='40'></td>";
        }
        else {
        echo "<td>n/a</td>";
        }  
        ?> 
        <td><?php echo $link_vis; ?></td>  
        <td><a href="index.php?edit_link=<?php echo $link_id; ?>" class="myButton">Edytuj</a></td>
            <td>
                <a href="includes/delete_link.php?delete_link=<?php echo $link_id; ?>" class="myButton">Usuń</a></td>        
            </tr>
    
    
    <?php } ?>
</table>
