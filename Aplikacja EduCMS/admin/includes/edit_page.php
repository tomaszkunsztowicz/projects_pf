<link rel="stylesheet" href="/EduCMS/admin/admin.css" media="all"/>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");
if(isset($_GET['edit_page'])){
    $edit_id = $_GET['edit_page'];
    $select_post = "select * from posts where post_id='$edit_id'";
    $run_query = mysql_query($select_post);
    while ($row_post=mysql_fetch_array($run_query)) {
        $post_id = $row_post['post_id'];
        $title = $row_post['post_title'];
        $position = $row_post['is_page_position'];
        $author = $row_post['post_author'];
        $keywords = $row_post['post_keywords'];
        $image = $row_post['post_image'];
        $content = $row_post['post_content']; 
        $post_gal_id = $row_post['post_gallery_id'];
        $post_visible = $row_post['post_visible'];
        $post_allow_comments = $row_post['post_allow_comments'];
        $post_sid = $row_post['post_sid'];     
    }
}

?>
<div class="CSSTableGenerator" >
<form action="index.php?edit_page" method="post" enctype="multipart/form-data">
		<table width="800" align="center">    	
            <tr>
            <td colspan="2"><h1>Edytuj stronę:</h1></td>
			</tr>   
     <tr> <td>ID strony:</td>
         <td><input type="text" name="post_id1" value="<?php echo $post_id; ?>" /></td>
             </tr>   
            <tr>
    <td>Tytuł strony:</td>
    <td><input type="text" name="post_title" value="<?php echo $title; ?>" /></td>
             </tr>        
         <tr>
             
             
             
    
            <tr>
            		<td>Pozycja strony:</td>
            		<td>
            		<select name="pos">
            			 <?php
		                  $get_pos = "select is_page_position from posts where post_id='$post_id'";
		                  $run_pos = mysql_query($get_pos);
		                  while ($pos_row=mysql_fetch_array($run_pos)) {
		                  $pos=$pos_row['is_page_position'];
		                  echo "<option value='$pos'>$pos</option>";    
                              
                        $get_more_pos = "select distinct is_page_position from posts where                                                                              is_page_position not in ('$pos')";
                        $run_more_pos = mysql_query($get_more_pos);
                        while($row_more_pos=mysql_fetch_array($run_more_pos)){
                        $pos=$row_more_pos['is_page_position'];
                        echo "<option value='$pos'>$pos</option>";
		                      }	         
                        	}	
		              ?>   
            		</select>	
            		</td>
             </tr>       
               <tr>
                <td>Autor:</td>
                <td>
            		<select name="post_author"> 
                        <option value="null">wybierz autora</option>;
                         <?php
		                  include("../includes/database.php");

                          if ( $author != ('null' or ''))  {
		                  $get_authors = "select * from authors where name='$author'";
		                  $run_authors = mysql_query($get_authors);
		                  while ($authors_row=mysql_fetch_array($run_authors)) {
		                  $author_id=$authors_row['id'];
		                  $author_name=$authors_row['name'];
		                  echo "<option value='$author_name'>$author_name</option>";
                          }
                          $get_more_authors = "select * from authors where name not in ('$author')";
                          $run_more_authors = mysql_query($get_more_authors);
                              while($row_more_authors=mysql_fetch_array($run_more_authors)) { 
                            $author_id2=$row_more_authors['id'];
                            $author_name2=$row_more_authors['name'];
                echo "<option value='$author_name2'>$author_name2</option>"; }
                          }
                                  else {
                                      
                                      $get_more_authors = "select * from authors";
                                          $run_more_authors = mysql_query($get_more_authors);
                                      while($row_more_authors=mysql_fetch_array($run_more_authors)) {
            $author_id3=$row_more_authors['id'];
            $author_name3=$row_more_authors['name'];
                            echo "<option value='$author_name3'>$author_name3</option>";
                            }                
                                  }

		?> 
                        </select>	
            		</td>
            </tr>   
                 
            
              <tr>
            		<td>Słowa kluczowe:</td>
                    <td><input type="text" name="post_keywords" value="<?php echo $keywords; ?>" /></td>
             </tr>    
             
              <tr>
            		<td>Obraz:</td>
                    <td><img src="post_images/<?php echo $image; ?>" width="60" height="60" />  <?php echo $image; ?>
                    <input type="file" name="post_image" size="50"/></td>
             </tr>    
             
              <tr>
            		<td>Treść artykułu:</td>
                    <td><textarea name="post_content" rows="14" cols="40"><?php echo $content; ?></textarea></td>
             </tr>    
             
                    <tr>
            		<td>Powiązana galeria:</td>
            		<td>
            		<select name="post_gallery">   
                    <?php
                    if ($post_gal_id !='0') {

		              $get_gals = "select * from gallery_category where category_id='$post_gal_id'";
		              $run_gals = mysql_query($get_gals);
		              while ($gals_row=mysql_fetch_array($run_gals))
                      {
		              $gal_id=$gals_row['category_id'];
		              $gal_title=$gals_row['category_name'];
		              echo "<option value='$gal_id'>$gal_title</option>";
                      $get_more_gals = "select * from gallery_category where category_id not in ('$post_gal_id') ";
                      $run_more_gals = mysql_query($get_more_gals);  
                      while($row_more_gals=mysql_fetch_array($run_more_gals)){
                        $gal_id=$row_more_gals['category_id'];
                        $gal_title=$row_more_gals['category_name'];
                        echo "<option value='$gal_id'>$gal_title</option>";
		                  }	
                        echo"<option value='null'>brak</option>";
		                  }	
                        }
    
        else { echo"<option value='null'>brak</option>";
		$get_gal = "select * from gallery_category";
		$run_gal = mysql_query($get_gal);
		while ($gal_row=mysql_fetch_array($run_gal)) {
		$galo_id=$gal_row['category_id'];
		$galo_title=$gal_row['category_name'];
		 echo "<option value='$galo_id'>$galo_title</option>";
		}	
         }      
		                  ?>    
                        
                        </select>	
            		</td>
             </tr>   
            
              <tr>
            		<td>Czy widoczna:</td>  
                  	<td>
                        <select name="post_visible">
            		  <?php
		                  $get_vis = "select post_visible from posts where post_id='$post_id'";
		                  $run_vis = mysql_query($get_vis);
		                  while ($vis_row=mysql_fetch_array($run_vis)) {
		                  $vis=$vis_row['post_visible'];
		                  echo "<option value='$vis'>$vis</option>";    
                        $get_more_vis = "select distinct post_visible from posts where post_visible not in ('$vis')";
                        $run_more_vis = mysql_query($get_more_vis);
                        while($row_more_vis=mysql_fetch_array($run_more_vis)){
                        $vis=$row_more_vis['post_visible'];
                        echo "<option value='$vis'>$vis</option>";
		                      }	         
                        	}	
		              ?>       
            		</select>	
            		</td>   
             </tr>   
                
              <tr>
            		<td>Zezwól na komentarze:</td> 
                    <td>
            		<select name="post_allow_comments">
            		 <?php
		                  $get_post_allow_comments = "select post_allow_comments from posts where post_id='$post_id'";
		                  $run_post_allow_comments = mysql_query($get_post_allow_comments);
		                  while ($post_allow_comments_row=mysql_fetch_array($run_post_allow_comments)) {
		                  $post_allow_comments=$post_allow_comments_row['post_allow_comments'];
		                  echo "<option value='$post_allow_comments'>$post_allow_comments</option>";   
                             
                        $get_more_post_allow_comments = "select distinct post_allow_comments from posts where                                                       post_allow_comments not in ('$post_allow_comments')";
                        $run_more_post_allow_comments = mysql_query($get_more_post_allow_comments);
                        while($row_more_post_allow_comments=mysql_fetch_array($run_more_post_allow_comments)){
                        $post_allow_comments=$row_more_post_allow_comments['post_allow_comments'];
                        echo "<option value='$post_allow_comments'>$post_allow_comments</option>";
		                      }	         
                        	}	
		              ?>    
            		</select>	
            		</td>
             </tr>   
            
               <tr>
            		<td>ID sortowania:</td> 
                    <td><input type="text" name="post_sid" value="<?php echo $post_sid; ?>"/></td>
             </tr>   
            
              <tr>
                    <td colspan="2"><input type="submit" name="update" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>


<?php
if(isset($_POST['update'])) {
	
    $post_id = $_POST['post_id1'];
	$post_title = $_POST['post_title'];
	$position = $_POST['pos'];
	$post_author_n = $_POST['post_author'];
	$post_keywords = $_POST['post_keywords'];
	$post_image = $_FILES['post_image']['name'];
	$post_image_tmp = $_FILES['post_image']['tmp_name'];
	$post_content = $_POST['post_content'];
    $post_gallery_n = $_POST['post_gallery'];
    $post_visible_n = $_POST['post_visible'];
    $post_allow_comments_n = $_POST['post_allow_comments'];
    $post_sid_n = $_POST['post_sid'];
        
	if($post_title=='' OR $position=='null' OR $post_keywords=='' OR
    $post_allow_comments_n == 'null'
	OR $post_content==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_page=$post_id,'_self')</script>";
		}
    
	else {
		move_uploaded_file($post_image_tmp, "post_images/$post_image");
        $update_posts = "update 
        posts 
        set
        post_title='$post_title', 
        post_author='$post_author_n',
        post_keywords='$post_keywords',
        post_image='$post_image',
        post_content='$post_content',
        is_page_position='$position',
        post_sid='$post_sid_n',
        post_visible='$post_visible_n',
        post_gallery_id='$post_gallery_n',
        post_allow_comments='$post_allow_comments_n'
        where post_id='$post_id'";
    
		$run_update = mysql_query($update_posts);
		echo "<script>alert('Strona zostala zaktualizowana.')</script>" ;
		echo "<script>window.open('index.php?view_pages','_self')</script>";
		}
	}
        
?>

