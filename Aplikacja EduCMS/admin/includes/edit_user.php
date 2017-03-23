<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("../includes/database.php");
if(isset($_GET['edit_user'])){
    $edit_id = $_GET['edit_user'];
    $select_user = "select * from users where id='$edit_id'";
    $run_query = mysql_query($select_user);
    while ($row_user=mysql_fetch_array($run_query)) {
        $id = $row_user['id'];
        $name = $row_user['username'];
        $password = $row_user['password'];
        $activated = $row_user['activated'];
        $rights = $row_user['rights']; 
    }
}
?>

<div class="CSSTableGenerator">
<form action="index.php?edit_user" method="post" enctype="multipart/form-data">

		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj użytkownika</h2></td>
			</tr> 
            
            <tr>
            		<td>ID:</td>
                  <td><input type="text" name="id" value="<?php echo $id; ?>"/></td>
              </tr>
              <tr>
            		<td>Nazwa:</td>
                  <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
              </tr> 
            <tr>
            		<td>Hasło:</td>
                  <td><input type="text" name="password" value="<?php echo $password; ?>"/></td>
              </tr> 
            
            
                  <tr>
            		<td>Aktywny:</td>  
                  	<td>
                        <select name="activated">
            		  <?php
		                  $get_activated = "select activated from users where id='$id'";
		                  $run_activated = mysql_query($get_activated);
		                  while ($activated_row=mysql_fetch_array($run_activated)) {
		                  $activated=$activated_row['activated'];
		                  echo "<option value='$activated'>$activated</option>";    
                        $get_more_activated = "select distinct activated from users where activated not in ('$activated')";
                        $run_more_activated = mysql_query($get_more_activated);
                        while($row_more_activated=mysql_fetch_array($run_more_activated)){
                        $activated=$row_more_activated['activated'];
                        echo "<option value='$activated'>$activated</option>";
		                      }	         
                        	}	
		              ?>       
            		</select>	
            		</td>   
             </tr>   
            
                <tr>
            		<td>Poziom uprawnień:</td>  
                  	<td>
                        <select name="rights">
            		  <?php
		                  $get_rights = "select rights from users where id='$id'";
		                  $run_rights = mysql_query($get_rights);
		                  while ($rights_row=mysql_fetch_array($run_rights)) {
		                  $rights=$rights_row['rights'];
		                  echo "<option value='$rights'>$rights</option>";    
                        $get_more_rights = "select distinct rights from users where rights not in ('$rights')";
                        $run_more_rights = mysql_query($get_more_rights);
                        while($row_more_rights=mysql_fetch_array($run_more_rights)){
                        $rights=$row_more_rights['rights'];
                        echo "<option value='$rights'>$rights</option>";
		                      }	         
                        	}	
		              ?>       
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
	$u_id = $_POST['id'];
	$u_name = $_POST['name'];
    $u_password = $_POST['password'];
    $u_activated = $_POST['activated'];
    $u_rights = $_POST['rights'];
    
	if($u_name=='' or
       $u_id=='' or
       $u_password==''  
      ){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_user=$u_id','_self')</script>";
		}
	else {
		
		$update_user = "update users 
        set username='$u_name',
        password='$u_password',
        activated='$u_activated',
        rights='$u_rights'
        where id='$u_id'";
        
		$run_update = mysql_query($update_user);
		echo "<script>alert('Użytkownik został zaktualizowany!')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
		}
	}

?>










