<?php
include('../includes/database.php');
if(isset($_GET['insert_image'])){
    $edit_id = $_GET['insert_image'];
    $select_img = "select * from gallery_category where category_id='$edit_id'";
    $run_query = mysql_query($select_img);
    {
 while ($row_img=mysql_fetch_array($run_query)) {
        $gal_id = $row_img['category_id'];
        $gal_name = $row_img['category_name'];

 }
    }
}
?>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>
<div class="CSSTableGenerator" >
<form action="includes/insert_image.php" method="post" enctype="multipart/form-data">
<table width="700" align="center">     
<tr>
    <td colspan="2">
        <h1>Dodaj zdjęcie do kategorii <?php echo $gal_name; ?> </h1>
    </td>
    </tr> 
    
<tr>
    <td>
ID Galerii:
    </td>
    <td>
    <input type="text" name="cat" value="<?php echo $gal_id; ?>"/>
    </td>
    
    
    </tr>
    
<tr>
    <td>
Opis zdjęcia:
    </td>
    <td>
        <input type="text" name="desc"></br> 
</td>
    </tr>

     <tr>
         <td colspan="2">
    <input type="file" name="file_upload" />
         </td>
    </tr>
 
<tr>
<td colspan="2">
<input type="submit" name="submit" value="Zatwierdź" />
    </td>

</tr>

</table>
</div>
</form>

<?php 
if (isset($_POST['submit']))
{
    $name=basename($_FILES['file_upload']['name']);
    $t_name=$_FILES['file_upload']['tmp_name'];
    $dir='upload';
    $cid=$_POST['cat'];
    $desc=$_POST['desc'];
    
    if($name=='' OR $desc==''){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
        //dodac do innych modulow zeby bylo wypelnione trescia
		echo "<script>window.open('../index.php?insert_image=$cid','_self')</script>";
		}
    
    else if(move_uploaded_file($t_name,$dir."/".$name))
    {
        //sprawdzenie dodac 
        $get_images="insert into gallery_photos (cid, name, path, description) values ('$cid','$name','admin/includes/upload/$name','$desc')";
        $run_images=mysql_query($get_images);
        echo "<script>alert('Zdjęcie zostalo dodane.')</script>" ;
		echo "<script>window.open('../index.php?view_images=$cid','_self')</script>";
        
    }
}
?>
