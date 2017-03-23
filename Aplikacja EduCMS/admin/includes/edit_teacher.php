
<?php
include("../includes/database.php");
if(isset($_GET['edit_teacher'])){
    $edit_id = $_GET['edit_teacher'];
    $select_teacher = "select * from teachers where id='$edit_id'";
    $run_query = mysql_query($select_teacher);
    while ($row_teacher=mysql_fetch_array($run_query)) {
        $id = $row_teacher['id'];
        $name = $row_teacher['name'];
    }
}
?>
<link rel="stylesheet" href="includes.css" media="all"/>

<form action="index.php?edit_teacher" method="post" enctype="multipart/form-date">
<div class="CSSTableGenerator" >
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj wychowawcę</h2></td>
			</tr> 
            
            <tr>
            		<td>Id:</td>
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
		echo "<script>window.open('index.php?edit_teacher=$id','_self')</script>";
		}
	else {
		
		$update_teacher = "update teachers set name='$name' where id='$id'";
        
		$run_update = mysql_query($update_teacher);
		echo "<script>alert('Wychowawca została zaktualizowany!')</script>";
		echo "<script>window.open('index.php?view_classes','_self')</script>";
		}
	}

?>










