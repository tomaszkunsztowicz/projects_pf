<?php
include("includes/database.php");
?>
<link rel="stylesheet" href="includes.css" media="all"/>
<div class="CSSTableGenerator" >
<form action="index.php?insert_gallery" method="post" enctype="multipart/form-date">
		<table width="800" align="center">    	
            <tr>
            		<td colspan="2"><h1>Dodaj galerię:</h1></td>
			</tr>   
  
    <td>Nazwa galerii:</td>
    <td><input type="text" name="gal_name"/></td>
             </tr>        
              <tr>
    <td>Opis galerii:</td>
    <td><input type="text" name="gal_desc"/></td>
             </tr>    
              <tr>
    <td colspan="2"><input type="submit" name="submit" value="Aktualizuj" /></td>
             </tr>    
  
        </table>
   </div>   
</form>


<?php
if(isset($_POST['submit'])) {
	
	$gal_name = $_POST['gal_name'];
	$gal_desc = $_POST['gal_desc'];
	
	if($gal_name=='' OR $gal_desc==''){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
        //dodac do innych modulow zeby bylo wypelnione trescia
		echo "<script>window.open('index.php?insert_gallery,'_self')</script>";
		}
    
	else {
        $insert_gals = "insert into gallery_category 
        (category_name, description) values ('$gal_name','$gal_desc')";
       
		$run_insert = mysql_query($insert_gals);
        
		echo "<script>alert('Galeria zostala dodana.')</script>" ;
		echo "<script>window.open('index.php?view_galleries','_self')</script>";
		}
	}
        
?>

