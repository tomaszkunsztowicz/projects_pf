<?php 
include("../includes/database.php");
?>
<link rel="stylesheet" href="includes.css" media="all"/>

<div class='insert_post'>
<form action="index.php?insert_teacher" method="post" enctype="multipart/form-date">
<div class="CSSTableGenerator" >
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Dodaj wychowawcę</h2></td>
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
		echo "<script>window.open('index.php?insert_teacher,'_self')</script>";
		}
	else {
		
		$insert_teacher = "insert into teachers (name) values ('$name')";
        
		$run_teacher = mysql_query($insert_teacher);
		echo "<script>alert('Wychowawca został dodany!')</script>";
		echo "<script>window.open('index.php?view_classes','_self')</script>";
		}
	}

?>










