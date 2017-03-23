<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_gallery" class="myButton">Dodaj galerię</a></div>
<?php
include("includes/database.php");?>

<div class="CSSTableGenerator">
<table align="center" width="780">
    <tr>
        <td>ID</td>
        <td>Nazwa</td>
        <td>Opis</td>
        <td>Data dodania</td>
        <td>Edytuj</td>
        <td>Zarządzaj zdjęciami</td>
        <td>Usuń</td>
    </tr>
    
<?php
    $get_gals = "select * from gallery_category";
    $run_gals = mysql_query($get_gals);
while ($row_gals = mysql_fetch_array($run_gals)){
    $gal_id = $row_gals['category_id'];
    $gal_title = $row_gals['category_name'];
    $gal_description = $row_gals['description'];
    $gal_date = $row_gals['date'];
 ?>   
        <tr>
        <td><?php echo $gal_id; ?></td>
        <td><?php echo $gal_title; ?></td>
        <td><?php echo $gal_description; ?></td>
        <td><?php echo $gal_date; ?></td>
        
<td><a href="index.php?edit_gallery=<?php echo $gal_id; ?>" class="myButton">Edytuj</a></td>
<td><a href="index.php?view_images=<?php echo $gal_id; ?> " class="myButton">Zarządzaj zdjęciami</a></td>           
<td><a href="includes/delete_gallery.php?delete_gallery=<?php echo $gal_id; ?>" class="myButton">Usuń</a></td>    
    </tr>
    <?php } ?>
</table>
</div>