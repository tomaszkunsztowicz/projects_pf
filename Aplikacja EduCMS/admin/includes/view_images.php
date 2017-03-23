<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");?>
<?php 
if(isset($_GET['view_images']))
{
$i_id = $_GET['view_images'];
}
?>
<div id="add">
<a href="index.php?insert_image=<?php echo $i_id; ?>" class="myButton">Dodaj zdjęcie</a>
<a href="index.php?view_galleries" class="myButton">Powrót do listy galerii</a>
</div>


<div class="CSSTableGenerator">
<table align="center" width="780">
    <tr>
        <td>ID</td>
        <td>Nazwa</td>
        <td>Opis</td>
        <td>Miniatura</td>
        <td>Edytuj</td>
        <td>Usuń</td>   
    </tr>
    
<?php
if(isset($_GET['view_images'])){
    $edit_id = $_GET['view_images'];
    $select_img = "select * from gallery_photos where cid='$edit_id'";
    $run_query = mysql_query($select_img);
    {
 while ($row_img=mysql_fetch_array($run_query)) {
        $img_id = $row_img['mid'];
        $gal_id = $row_img['cid'];
        $img_name = $row_img['name'];
        $img_desc = $row_img['description'];
        $img_path = $row_img['path'];
   ?>
        <tr>
        <td><?php echo $img_id; ?></td>
        <td><?php echo $img_name; ?></td>
        <td><?php echo $img_desc; ?></td>
        <td><img src="../<?php echo $img_path; ?>" width="60" height="60"></td>
            
        <td><a href="index.php?edit_image=<?php echo $img_id; ?>" class="myButton">Edytuj</a></td>  
            
<td><a href="includes/delete_image.php?delete_image=<?php echo $img_id; ?>" class="myButton">Usuń</a></td>    
    </tr>

<?php   } } } ?>
    </table>
</div>
