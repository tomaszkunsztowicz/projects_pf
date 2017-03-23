<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php"); ?>

<form action="index.php?insert_author" method="post" enctype="multipart/form-date">
<div class="CSSTableGenerator"> 
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Dodaj autora</h2></td>
			</tr>   
              <tr>
                    <td>Imię i nazwisko:</td>
                  <td><input type="text" name="name"/></td>
              </tr> 
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$name = $_POST['name'];

	if($name=='null'){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_author,'_self')</script>";
		}
	else {
		
		$insert_author = "insert into authors (name) values ('$name')";
        
		$run_author = mysql_query($insert_author);
		echo "<script>alert('Autor został dodany!')</script>";
		echo "<script>window.open('index.php?view_authors','_self')</script>";
		}
	}

?>










