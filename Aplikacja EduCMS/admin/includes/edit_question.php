<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("../includes/database.php");
if(isset($_GET['edit_question'])){
    $edit_id = $_GET['edit_question'];
    $select_question = "select * from poll_questions where id='$edit_id'";
    $run_query = mysql_query($select_question);
    while ($row_question=mysql_fetch_array($run_query)) {
        $id = $row_question['id'];
        $question = $row_question['question'];
        $visible = $row_question['visible'];
        $sid = $row_question['sort_id'];
        $p_id = $row_question['pollid']; 
    }
}
?>

<div class="CSSTableGenerator">
<form action="index.php?edit_question" method="post" enctype="multipart/form-date">

		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj pytanie</h2></td>
			</tr> 
            <tr>
                <td>ID kategorii:</td>
                  <td><input type="text" name="p_id" value="<?php echo $p_id; ?>"></td>
              </tr> 
            
            <tr>
            		<td>ID:</td>
                  <td><input type="text" name="id" value="<?php echo $id; ?>"/></td>
              </tr>
              <tr>
            		<td>Tytuł:</td>
                  <td><input type="text" name="question" value="<?php echo $question; ?>"/></td>
              </tr> 
            
              <tr>
            		<td>Czy widoczne:</td>  
                  	<td>
                        <select name="visible">
            		  <?php
		                  $get_vis = "select visible from poll_questions where id='$id'";
		                  $run_vis = mysql_query($get_vis);
		                  while ($vis_row=mysql_fetch_array($run_vis)) {
		                  $vis=$vis_row['visible'];
		                  echo "<option value='$vis'>$vis</option>";    
                        $get_more_vis = "select distinct visible from poll_questions where visible not in ('$vis')";
                        $run_more_vis = mysql_query($get_more_vis);
                        while($row_more_vis=mysql_fetch_array($run_more_vis)){
                        $vis=$row_more_vis['visible'];
                        echo "<option value='$vis'>$vis</option>";
		                      }	         
                        	}	
		              ?>       
            		</select>	
            		</td>   
             </tr> 
            
              <tr>
                <td>ID sortowania:</td>
                  <td><input type="text" name="sid" value="<?php echo $sid; ?>"/></td>
              </tr> 
            
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	$q_id = $_POST['id'];
	$cont = $_POST['question'];
    $visible = $_POST['visible'];
    $sid = $_POST['sid'];
    $p_id = $_POST['p_id'];
    
    
	if($cont==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_question=$q_id','_self')</script>";
		}
	else {
		
		$update_question = "update poll_questions 
        set 
        question='$cont', 
        visible='$visible',
        sort_id='$sid'
        where id='$q_id'";
        
        
        
		$run_update = mysql_query($update_question);
		echo "<script>alert('Pytanie zostało zaktualizowane!')</script>";
		echo "<script>window.open('index.php?view_questions=$p_id','_self')</script>";
		}
	}

?>










