<link rel="stylesheet" href="includes.css" media="all"/>
<?php include("../includes/database.php");?>
<div class="CSSTableGenerator">
    
<form action="index.php?insert_class" method="post" enctype="multipart/form-date">
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Dodaj klasę</h2></td>
			</tr>   
            
            <tr>
            		<td>Rok:</td>
                    <td>
                    <select name="year">
                    <option value="null">wybierz rok</option>    
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </td>
             </tr>        

              <tr>
            		<td>Litera:</td>
                  <td><input type="text" name="letter" /></td>
              </tr> 
            
              <tr>
                    <td>Profil:</td>
                  <td><input type="text" name="profile" /></td>
              </tr> 
                <tr>
                    <td>Wychowawca:</td>
              <td>
                  
            		<select name="teacher_id">
            			<option value="null">wybierz wychowawcę</option>
        <?php
		$get_teachers = "select * from teachers order by name ASC";
		$run_teachers = mysql_query($get_teachers);
		while ($teachers_row=mysql_fetch_array($run_teachers)) {
		$teacher_id=$teachers_row['id'];
		$teacher_name=$teachers_row['name'];
		 echo "<option value='$teacher_id'>$teacher_name</option>";
		}	
		?>
            		</select>	
            		</td>
                 
             </tr>    
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Dodaj" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$class_year = $_POST['year'];
	$class_letter = $_POST['letter'];
	$class_profile = $_POST['profile'];
	$class_teacher = $_POST['teacher_id'];

	if($class_year=='null' OR $class_letter=='' OR $class_profile==''
	OR $class_teacher=='null'){
		echo "<script>alert('Please fill all the fields')</script>";
		echo "<script>window.open('index.php?insert_class,'_self')</script>";
		}
	else {
		
		$insert_class = "insert into classes (year,
		teacher_id,letter,profile) values ('$class_year','$class_teacher','$class_letter',
		'$class_profile')";
        
		$run_class = mysql_query($insert_class);
		echo "<script>alert('Klasa została dodana!')</script>";
		echo "<script>window.open('index.php?view_classes','_self')</script>";
		}
	}

?>










