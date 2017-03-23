<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php"); ?>

<?php
include("../includes/database.php");
if(isset($_GET['edit_link'])){
    $edit_id = $_GET['edit_link'];
    $select_link = "select * from recommended_links where link_id='$edit_id'";
    $run_query = mysql_query($select_link);
    while ($row_link=mysql_fetch_array($run_query)) {
        $id = $row_link['link_id'];
        $name = $row_link['link_name'];
        $url_rec_link = $row_link['link_url'];
        $sid = $row_link['sort_id'];
        $img = $row_link['image_path'];
        
    }
}

?>
<form action="index.php?edit_link" method="post" enctype="multipart/form-data">
<div class="CSSTableGenerator"> 

		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Edytuj link</h2></td>
			</tr> 
            
            <tr>
            		<td>ID:</td>
                  <td><input type="text" name="id" value="<?php echo $id; ?>"/></td>
              </tr>
            
              <tr>
            		<td>Nazwa:</td>
                  <td><input type="text" name="link_name" value="<?php echo $name; ?>"/></td>
              </tr> 
            
                <tr>
            		<td>Url:</td>
                  <td><input type="text" name="link" value="<?php echo $url_rec_link; ?>"/></td>
              </tr> 
            
             <tr>
            		<td>Obrazek:</td>
                    <td><input type="file" name="file_upload" size="50"/>
                    <img src="<?php echo $img; ?>" width="60" height="60" /></td>
             </tr>  
            
             <tr>
            		<td>Czy widoczny:</td>  
                  	<td>
                        <select name="vis">
            		  <?php
		                  $get_vis = "select visible from recommended_links where link_id='$id'";
		                  $run_vis = mysql_query($get_vis);
		                  while ($vis_row=mysql_fetch_array($run_vis)) {
		                  $vis=$vis_row['visible'];
		                  echo "<option value='$vis'>$vis</option>";    
                        $get_more_vis = "select distinct visible from recommended_links where visible not in ('$vis')";
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
            		<td>Sort ID:</td>
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
	$id = $_POST['id'];
	$link_name = $_POST['link_name'];
    $url_rec_link = $_POST['link'];
    $sid = $_POST['sid'];
    $vis = $_POST['vis'];
    $name=basename($_FILES['file_upload']['name']);
    $t_name=$_FILES['file_upload']['tmp_name'];
    
	if($link_name=='' OR url_rec_link==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_link=$id','_self')</script>";
		}
	else {
		move_uploaded_file($post_image_tmp, "post_images/$post_image");
        
		$update_link = "update recommended_links 
        set 
        link_name='$link_name', 
        link_url='$url_rec_link',
        sort_id='$sid',
        visible='$vis',
        image_path='../admin/includes/upload/$name'
        where 
        link_id='$id'";
		$run_update = mysql_query($update_link);
		echo "<script>alert('Link został zaktualizowany!')</script>";
		echo "<script>window.open('index.php?view_links','_self')</script>";
		}
	}
?>










