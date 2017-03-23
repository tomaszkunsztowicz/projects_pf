<?php include("../includes/database.php");?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>
<div class="CSSTableGenerator" >
<form action="index.php?insert_category" method="post" enctype="multipart/form-data">
		<table width="700" align="center"> 
            <tr>
            		<td colspan="2"><h2>Dodaj kategorię:</h2></td>
			</tr>   
            
            <tr>
            		<td>Nazwa kategorii:</td>
                    <td><input type="text" name="cat_title" /></td>
             </tr>  

              <tr>
            		<td>Położenie:</td>
            		<td>
            		<select name="position">
            			<option value="null">wybierz pozycję</option>
                        <option value="navbar">navbar</option>
                        <option value="sidebar">sidebar</option>
            		</select>	
            		</td>
                 
             </tr>    
               <tr>
            		<td>Czy widoczna:</td>  
                  	<td>
            		<select name="visible">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">tak</option>";
                        <option value="N">nie</option>";
            		</select>	
            		</td>
                  
             </tr>   
              <tr>
            		<td>ID sortowania:</td>
                    <td><input type="text" name="cat_sid" /></td>
             </tr>    
             
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$title = $_POST['cat_title'];
    $sid = $_POST['cat_sid'];
	$position = $_POST['position'];
    $visible = $_POST['visible'];
	
	if($title=='' OR $position=='null'){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
	   echo "<script>window.open('index.php?insert_category,'_self')</script>";
		}
	else {
		
        $insert_cats = "
        insert into categories 
        (cat_title, sort_id, position, visible) values
        (
        '$title', 
        '$sid',
        '$position',
        '$visible'
        )
        ";
        
		$run_insert = mysql_query($insert_cats);
		echo "<script>alert('Kategoria zostala dodana!')</script>";
		echo "<script>window.open('index.php?view_categories','_self')</script>";
		}
	}
    
?>










