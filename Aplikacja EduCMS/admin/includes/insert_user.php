<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php"); ?>

<form action="index.php?insert_user" method="post" enctype="multipart/form-data">
<div class="CSSTableGenerator"> 
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Dodaj użytkownika</h2></td>
			</tr>   
              <tr>
                  <td>Nazwa:</td>
                  <td><input type="text" name="name"/></td>
              </tr>
            
              <tr>
                  <td>Hasło:</td>
                  <td><input type="text" name="password"/></td>
              </tr>
            
              <tr>
                  <td>Aktywny:</td>
                  <td>
                  <select name="activated">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">Y</option>";
                        <option value="N">N</option>";
            		</select>
                  </td>
              </tr>
            
            <tr>
                  <td>Poziom uprawnień:</td>
                  <td>
                  <select name="rights">
            			<option value="null">wybierz opcję</option>
                        <option value="admin">admin</option>";
                        <option value="superadmin">superadmin</option>";
                        <option value="nauczyciel">nauczyciel</option>";
                        <option value="uczen">uczeń</option>";
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
	
	$name = $_POST['name'];
    $password = $_POST['password'];
    $activated = $_POST['activated'];
    $rights = $_POST['rights'];

	if($name=='null' or
       $password=='null' or
       $activated=='null' or
       $rights=='null'
      ){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_user,'_self')</script>";
		}
	else {
		
		$insert_user = "insert 
        into 
        users 
        (username, 
        password,
        activated,
        rights
        ) 
        values 
        ('$name',
        '$password',
        '$activated',
        '$rights'
        )";
        
		$run_user = mysql_query($insert_user);
		echo "<script>alert('Użytkownik został dodany!')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
		}
	}

?>










