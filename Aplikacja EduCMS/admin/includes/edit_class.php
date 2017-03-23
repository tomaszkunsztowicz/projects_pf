<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("../includes/database.php");
if(isset($_GET['edit_class'])){
    $edit_id = $_GET['edit_class'];
    $select_class = "select * from classes where class_id='$edit_id'";
    $run_query = mysql_query($select_class);
    while ($row_class=mysql_fetch_array($run_query)) {
        $class_id = $row_class['class_id'];
        $year = $row_class['year'];
        $letter = $row_class['letter'];
        $profile = $row_class['profile'];
        $teacher = $row_class['teacher_id'];
    
    }
}
?>
<div class="CSSTableGenerator">
<form action="index.php?edit_class" method="post" enctype="multipart/form-date">

		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj klasę</h2></td>
			</tr> 
            <tr>
            <td>Id:</td>
            <td><input type="text" name="class_id" value="<?php echo $class_id; ?>"/></td>
              </tr>
            <tr>
                
            		<td>Rok:</td>
                    <td>
                        <select>
             <?php
		$get_year = "select * from classes where class_id='$class_id'";
		$run_year = mysql_query($get_year);
		while ($year_row=mysql_fetch_array($run_year)) 
        {
		$class_year=$year_row['year'];
		 echo "<option value='$class_year'>$class_year</option>";    
            
        $get_more_y = "select distinct year from classes where                                                                                       class_id not in ('$class_id') order by year ASC";
            
                $run_more_y = mysql_query($get_more_y);
                while($row_more_y=mysql_fetch_array($run_more_y))
                {
                $year_n=$row_more_y['year'];    
                echo "<option value='$year_n'>$year_n</option>";
		}	
        }
		?>
            </select>
                </td>
             </tr>      
         
              <tr>
            		<td>Litera:</td>
                  <td><input type="text" name="letter" value="<?php echo $letter; ?>"/></td>
              </tr> 
            
              <tr>
                    <td>Profil:</td>
                  <td><input type="text" name="profile" value="<?php echo $profile; ?>"/></td>
              </tr> 
              <tr> 
                <td>Wychowawca:</td>
              <td>
            		<select name="teacher_id">
        <?php
		$get_teachers = "select * from teachers where id='$teacher'";
		$run_teachers = mysql_query($get_teachers);
		while ($teachers_row=mysql_fetch_array($run_teachers)) 
        {
		$teacher_id=$teachers_row['id'];
		$teacher_name=$teachers_row['name'];
		 echo "<option value='$teacher_id'>$teacher_name</option>";       
        $get_more_t = "select distinct id, name from teachers where                                                                                       id not in ('$teacher') order by name ASC";
            
                        $run_more_t = mysql_query($get_more_t);
                        while($row_more_t=mysql_fetch_array($run_more_t))
                        {
                        $teacher_id_n=$row_more_t['id'];     
                        $tn=$row_more_t['name'];    
                        echo "<option value='$teacher_id_n'>$tn</option>";
		}	
        }
		?>
                        
                        
                        
                        
            		</select>	
            		</td>
             </tr>   
            
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zapisz" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	$class_id = $_POST['class_id'];
	$class_year = $_POST['year'];
	$class_letter = $_POST['letter'];
	$class_profile = $_POST['profile'];
	$class_teacher = $_POST['teacher_id'];

	if($class_year=='null' OR $class_letter=='' OR $class_profile==''
	OR $class_teacher=='null'){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_class=$class_id','_self')</script>";
		}
	else {
		
		$update_class = "update classes set year='$class_year',
		teacher_id='$class_teacher',letter='$class_letter',
        profile='$class_profile' where class_id='$class_id'";
        
		$run_update = mysql_query($update_class);
		echo "<script>alert('Klasa została zaktualizowana!')</script>";
		echo "<script>window.open('index.php?view_classes','_self')</script>";
		}
	}

?>










