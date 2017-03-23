<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("../includes/database.php");
if(isset($_GET['edit_author'])){
    $edit_id = $_GET['edit_author'];
    $select_author = "select * from authors where id='$edit_id'";
    $run_query = mysql_query($select_author);
    while ($row_author=mysql_fetch_array($run_query)) {
        $id = $row_author['id'];
        $name = $row_author['name'];
    }
}
?>

<div class="CSSTableGenerator">
<form action="index.php?edit_author" method="post" enctype="multipart/form-date">

		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj wychowawcę</h2></td>
			</tr> 
            
            <tr>
            		<td>ID:</td>
                  <td><input type="text" name="id" value="<?php echo $id; ?>"/></td>
              </tr>
              <tr>
            		<td>Imię i nazwisko:</td>
                  <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
              </tr> 
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	if($name==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_author=$id','_self')</script>";
		}
	else {
		
		$update_author = "update authors set name='$name' where id='$id'";
        
		$run_update = mysql_query($update_author);
		echo "<script>alert('Author został zaktualizowany!')</script>";
		echo "<script>window.open('index.php?view_authors','_self')</script>";
		}
	}

?>










