<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php"); ?>

<form action="index.php?insert_poll" method="post" enctype="multipart/form-date">
<div class="CSSTableGenerator"> 
		<table width="700" align="center">    	   	
            <tr>
            		<td colspan="2"><h2>Dodaj ankietę</h2></td>
			</tr>   
              <tr>
                    <td>Tytuł:</td>
                  <td><input type="text" name="title"/></td>
              </tr> 
            
             <tr>
            		<td>Czy widoczna:</td>  
                  	<td>
            		<select name="vis">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">Y</option>";
                        <option value="N">N</option>";
            		</select>	
            		</td>
                  
             </tr>   
            
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
     
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$title = $_POST['title'];
    $vis = $_POST['vis'];
    
	if($title=='null'){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_poll,'_self')</script>";
		}
	else {
		
		$insert_poll = "insert into polls (title, visible) values ('$title', '$vis')";
        
		$run_poll = mysql_query($insert_poll);
		echo "<script>alert('Ankieta została dodana!')</script>";
		echo "<script>window.open('index.php?view_polls','_self')</script>";
		}
	}

?>










