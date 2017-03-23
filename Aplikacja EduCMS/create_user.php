<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php"); ?>

<form action="create_user.php" method="post" enctype="multipart/form-data">
<div class="CSSTableGenerator"> 
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Dodaj Administratora</h2></td>
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
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>





<?php
if(isset($_POST['submit'])) {
	
	$name = $_POST['name'];
    $password = $_POST['password'];
  

	if($name=='null' or
       $password=='null'
      
      ){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('create_user.php','_self')</script>";
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
        'Y',
        'admin'
        )";
        
		$run_user = mysql_query($insert_user);
		echo "<script>alert('Użytkownik został dodany!')</script>";
        unlink('create_user.php');
		echo "<script>window.open('../admin/login.php','_self')</script>";
        
		}
	}

?>










