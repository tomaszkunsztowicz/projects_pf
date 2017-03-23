<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include('../includes/database.php');
if(isset($_GET['insert_question'])){
    $edit_id = $_GET['insert_question'];
    $select_question = "select * from polls where id='$edit_id'";
    $run_query = mysql_query($select_question);
    {
 while ($row_question=mysql_fetch_array($run_query)) {
        $p_id = $row_question['id'];
        $p_name = $row_question['title'];
        }
    }
}
?>


<form action="index.php?insert_question" method="post" enctype="multipart/form-date">
<div class="CSSTableGenerator"> 
		<table width="700" align="center">    	   	
            <tr>
            		<td colspan="2"><h2>Dodaj pytanie do ankiety "<?php echo $p_name; ?>"</h2></td>
			</tr>   
             <tr>
                <td>ID Ankiety:</td>
                  <td><input type="text" name="p_id" value="<?php echo $p_id; ?>"></td>
              </tr> 
              <tr>
                    <td>Treść:</td>
                  <td><input type="text" name="question"/></td>
              </tr> 
            
             <tr>
            		<td>Czy widoczne:</td>  
                  	<td>
            		<select name="vis">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">Y</option>";
                        <option value="N">N</option>";
            		</select>	
            		</td>  
             </tr>   
            
            <tr>
                <td>Id sortowania:</td>
                  <td><input type="text" name="sid"/></td>
              </tr> 
            
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
     
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$question = $_POST['question'];
    $vis = $_POST['vis'];
    $sid = $_POST['sid'];
    $id = $_POST['p_id'];
    
	if($question=='null'){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_question,'_self')</script>";
		}
	else {
		
		$insert_question = "insert into poll_questions (question, visible, sort_id, pollid) 
        values 
        ('$question', '$vis', '$sid', '$id')";
        
		$run_question = mysql_query($insert_question);
		echo "<script>alert('Pytanie zostało dodane!')</script>";
		echo "<script>window.open('index.php?view_questions=$id','_self')</script>";
		}
	}

?>










