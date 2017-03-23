<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("../includes/database.php");
if(isset($_GET['edit_poll'])){
    $edit_id = $_GET['edit_poll'];
    $select_poll = "select * from polls where id='$edit_id'";
    $run_query = mysql_query($select_poll);
    while ($row_poll=mysql_fetch_array($run_query)) {
        $id = $row_poll['id'];
        $title = $row_poll['title'];
        $visible = $row_poll['visible'];
        
    }
}
?>

<div class="CSSTableGenerator">
<form action="index.php?edit_poll" method="post" enctype="multipart/form-date">

		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj ankietę</h2></td>
			</tr> 
            
            <tr>
            		<td>ID:</td>
                  <td><input type="text" name="id" value="<?php echo $id; ?>"/></td>
              </tr>
              <tr>
            		<td>Tytuł:</td>
                  <td><input type="text" name="name" value="<?php echo $title; ?>"/></td>
              </tr> 
            
              <tr>
            		<td>Czy widoczna:</td>  
                  	<td>
                        <select name="visible">
            		  <?php
		                  $get_vis = "select visible from polls where id='$id'";
		                  $run_vis = mysql_query($get_vis);
		                  while ($vis_row=mysql_fetch_array($run_vis)) {
		                  $vis=$vis_row['visible'];
		                  echo "<option value='$vis'>$vis</option>";    
                        $get_more_vis = "select distinct visible from polls where visible not in ('$vis')";
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
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	$poll_id = $_POST['id'];
	$poll_name = $_POST['name'];
    $poll_visible = $_POST['visible'];
    
	if($poll_name==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_poll=$poll_id','_self')</script>";
		}
	else {
		
		$update_poll = "update polls set title='$poll_name', visible='$poll_visible' where id='$poll_id'";
        
		$run_update = mysql_query($update_poll);
		echo "<script>alert('Ankieta została zaktualizowana!')</script>";
		echo "<script>window.open('index.php?view_polls','_self')</script>";
		}
	}

?>










