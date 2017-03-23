<link rel="stylesheet" href="/EduCMS/admin/admin.css" media="all"/>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");
if(isset($_GET['edit_category'])){
    $edit_id = $_GET['edit_category'];
    $select_cat = "select * from categories where cat_ID='$edit_id'";
    $run_query = mysql_query($select_cat);
    while ($row_cat=mysql_fetch_array($run_query)) {
        $cat_id = $row_cat['cat_ID'];
        $title = $row_cat['cat_title'];
        $position = $row_post['position'];
        $cat_sid = $row_cat['sort_id'];
        
        
    }
}
?>
<div class="CSSTableGenerator" >
<form action="index.php?edit_category" method="post" enctype="multipart/form-date">
		<table width="800" align="center">    	
            <tr>
            		<td colspan="2"><h1>Edytuj kategorię:</h1></td>
			</tr>  
            
              <tr>
                  <td>ID:</td>
                    <td ><input type="text" name="cat_id1" value="<?php echo $cat_id; ?>" /></td>
             </tr>   
            <tr>
            
            <tr>
                <td>Nazwa kategorii:</td>
                <td><input type="text" name="cat_title" value="<?php echo $title; ?>" /></td>
             </tr>        
              <tr>
               
                <tr>
            		<td>Pozycja strony:</td>
            		<td>
            		<select name="pos">
            			 <?php
		                  $get_pos = "select * from categories where cat_ID='$cat_id'";
		                  $run_pos = mysql_query($get_pos);
		                  while ($pos_row=mysql_fetch_array($run_pos)) {
		                  $pos=$pos_row['position'];
		                  echo "<option value='$pos'>$pos</option>";   
                              
                        $get_more_pos = "select distinct position from categories where                                                                              position not in ('$pos')";
                        $run_more_pos = mysql_query($get_more_pos);
                        while($row_more_pos=mysql_fetch_array($run_more_pos)){
                        $pos=$row_more_pos['position'];
                        echo "<option value='$pos'>$pos</option>";
		                      }	         
                        	}	
		              ?>   
            		</select>	
            		</td>
             </tr>     
              
              <tr>
            		<td>Czy widoczna:</td>  
                  	<td>
                        <select name="visible">
            		  <?php
		                  $get_vis = "select visible from categories where cat_ID='$cat_id'";
		                  $run_vis = mysql_query($get_vis);
		                  while ($vis_row=mysql_fetch_array($run_vis)) {
		                  $vis=$vis_row['visible'];
		                  echo "<option value='$vis'>$vis</option>";    
                        $get_more_vis = "select distinct visible from categories where visible not in ('$vis')";
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
                    <td><input type="text" name="cat_sid" value="<?php echo $cat_sid; ?>"/></td>
             </tr>  
              <tr>
                    <td><input type="submit" name="update" value="Zatwierdź" /></td>
             </tr>   
        </table>
   </div>   
</form>

<?php

if(isset($_POST['update'])) {
	
    $cat_id = $_POST['cat_id1'];
	$title = $_POST['cat_title'];
	$position = $_POST['pos'];
    $sid = $_POST['cat_sid'];
    $visible = $_POST['visible'];
    
	
	
	if($title=='' OR $position=='null'){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_category=$cat_id,'_self')</script>";
		}
	else {
		
        $update_cats = "update categories set 
        cat_title='$title', position='$position', sort_id='$sid', visible='$visible'
        where cat_ID='$cat_id'";
        
		$run_update = mysql_query($update_cats);
		echo "<script>alert('Kategoria zostala zaktualizowana!')</script>";
		echo "<script>window.open('index.php?view_categories','_self')</script>";
		}
	}
    
?>