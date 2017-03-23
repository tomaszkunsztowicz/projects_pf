<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");
if(isset($_GET['edit_gallery'])){
    $edit_id = $_GET['edit_gallery'];
    $select_gal = "select * from gallery_category where category_id='$edit_id'";
    
    $run_query = mysql_query($select_gal);
    while ($row_gal=mysql_fetch_array($run_query)) {
        $gal_id = $row_gal['category_id'];
        $gal_name = $row_gal['category_name'];
        $gal_desc = $row_gal['description'];

    }
}

?>
<div class="CSSTableGenerator">
<form action="index.php?edit_gallery" method="post" enctype="multipart/form-date">
		<table width="800" align="center">    	
            <tr>
            		<td colspan="2"><h1>Edytuj galerię:</h1></td>
			</tr>
            
     <tr>
         <td>ID:</td>
    <td><input type="text" name="gal_id" value="<?php echo $gal_id; ?>" /></td>
             </tr>   
            <tr>
    <td>Nazwa galerii:</td>
    <td><input type="text" name="gal_name" value="<?php echo $gal_name; ?>" /></td>
             </tr>        
              <tr>
    <td>Opis galerii:</td>
    <td><input type="text" name="gal_desc" value="<?php echo $gal_desc; ?>"/></td>
             </tr>    
              <tr>
                    <td><input type="submit" name="update" value="Aktualizuj" /></td>
             </tr>    
        </table>
   </div>   
</form>


<?php
if(isset($_POST['update'])) {
	
    $gal_id = $_POST['gal_id'];
	$gal_name = $_POST['gal_name'];
	$gal_desc = $_POST['gal_desc'];
	
	if($gal_name=='' OR $gal_desc==''){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_gallery=$gal_id','_self')</script>";
		}
    
	else {
        $update_gals = "update gallery_category set
        category_name='$gal_name', description='$gal_desc'
        where category_id='$gal_id'";
    
		$run_update = mysql_query($update_gals);
        
		echo "<script>alert('Galeria zostala zaktualizowana.')</script>" ;
		echo "<script>window.open('index.php?view_galleries','_self')</script>";
		}
	}
        
?>

