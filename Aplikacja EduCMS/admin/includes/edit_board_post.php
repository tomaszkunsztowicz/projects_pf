<link rel="stylesheet" href="/EduCMS/admin/admin.css" media="all"/>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");
if(isset($_GET['edit_board_post'])){
    $edit_id = $_GET['edit_board_post'];
    $select_board_post = "select * from board_posts where board_post_id='$edit_id'";
    $run_query = mysql_query($select_board_post);
    while ($row_board_post=mysql_fetch_array($run_query)) {
        $board_post_id = $row_board_post['board_post_id'];
        $title = $row_board_post['board_post_title'];
        $board_post_cat = $row_board_post['category_id'];
        $content = $row_board_post['board_post_content']; 
        $board_post_visible = $row_board_post['board_post_visible'];
    }
}
?>


<div class="CSSTableGenerator" >
<form action="index.php?edit_board_post" method="post" enctype="multipart/form-date">
		<table width="800" align="center">    	
            <tr>
            		<td colspan="2"><h1>Edytuj ogłoszenie:</h1></td>
			</tr>   
              <tr>
                  <td>ID:</td>
    <td ><input type="text" name="board_post_id1" value="<?php echo $board_post_id; ?>" /></td>
             </tr>   
            <tr>
            
            <tr>
    <td>Tytuł artykułu:</td>
    <td><input type="text" name="board_post_title" value="<?php echo $title; ?>" /></td>
             </tr> 
            
            
          
    
             
              <tr>
            		<td>Treść ogłoszenia:</td>
                    <td><textarea name="board_post_content" rows="14" cols="40"><?php echo $content; ?></textarea></td>
             </tr>    
                  
              <tr>
            		<td>Czy widoczne:</td>  
                  	<td>
                        <select name="board_post_visible">
            		  <?php
		                  $get_vis = "select board_post_visible from board_posts where board_post_id='$board_post_id'";
		                  $run_vis = mysql_query($get_vis);
		                  while ($vis_row=mysql_fetch_array($run_vis)) {
		                  $vis=$vis_row['board_post_visible'];
		                  echo "<option value='$vis'>$vis</option>";    
                        $get_more_vis = "select distinct board_post_visible from board_posts where board_post_visible not in ('$vis')";
                        $run_more_vis = mysql_query($get_more_vis);
                        while($row_more_vis=mysql_fetch_array($run_more_vis)){
                        $vis=$row_more_vis['board_post_visible'];
                        echo "<option value='$vis'>$vis</option>";
		                      }	         
                        	}	
		              ?>       
            		</select>	
            		</td>   
             </tr>   
                
      
            
              <tr>
                    <td><input type="submit" name="update" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['update'])) {
	
    $board_post_id = $_POST['board_post_id1'];
	$board_post_title = $_POST['board_post_title'];
	$board_post_date = date('m-d-y');
	$board_post_content = $_POST['board_post_content'];
    $board_post_visible_n = $_POST['board_post_visible'];
    
	if($board_post_title=='' OR 
	$board_post_content==''){
	echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_board_post=$board_post_id,'_self')</script>";
		}
	else {
		
		move_uploaded_file($board_post_image_tmp, "board_post_images/$board_post_image");
		
        $update_board_posts = 
            "update 
            board_posts 
            set 
            board_post_title='$board_post_title',
            board_post_date='$board_post_date',
            board_post_content='$board_post_content',
            board_post_visible='$board_post_visible_n'
            where board_post_id='$board_post_id'";
        
		$run_update = mysql_query($update_board_posts);
		echo "<script>alert('Ogłoszenie zostało zaktualizowane!')</script>";
		echo "<script>window.open('index.php?view_board_posts','_self')</script>";
		}
	}
    
?>