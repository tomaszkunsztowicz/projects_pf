<link rel="stylesheet" href="/EduCMS/admin/admin.css" media="all"/>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");
if(isset($_GET['edit_post'])){
    $edit_id = $_GET['edit_post'];
    $select_post = "select * from posts where post_id='$edit_id'";
    $run_query = mysql_query($select_post);
    while ($row_post=mysql_fetch_array($run_query)) {
        $post_id = $row_post['post_id'];
        $title = $row_post['post_title'];
        $post_cat = $row_post['category_id'];
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
<form action="index.php?edit_post" method="post" enctype="multipart/form-data">
		<table width="800" align="center">    	
            <tr>
            		<td colspan="2"><h1>Edytuj artykuł:</h1></td>
			</tr>   
              <tr>
                  <td>ID:</td>
    <td ><input type="text" name="post_id1" value="<?php echo $post_id; ?>" /></td>
             </tr>   
            <tr>
            
            <tr>
    <td>Tytuł artykułu:</td>
    <td><input type="text" name="post_title" value="<?php echo $title; ?>" /></td>
             </tr> 
            
            
              <tr>
            		<td>Kategoria artykułu:</td>
            		<td>
            <select name="cat">
        <?php
		$get_cats = "select * from categories where cat_ID='$post_cat'";
		$run_cats = mysql_query($get_cats);
		while ($cats_row=mysql_fetch_array($run_cats)) {
		$cat_id=$cats_row['cat_ID'];
		$cat_title=$cats_row['cat_title'];
		 echo "<option value='$cat_id'>$cat_title</option>";
            
        $get_more_cats = "select * from categories where cat_ID not in ('$post_cat')";
        $run_more_cats = mysql_query($get_more_cats);
       
            while($row_more_cats=mysql_fetch_array($run_more_cats)){
                $cat_id=$row_more_cats['cat_ID'];
                $cat_title=$row_more_cats['cat_title'];
            echo "<option value='$cat_id'>$cat_title</option>";
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
            		<td>Obrazek:</td>
                    <td><input type="file" name="image" size="50"/>
                    <img src="../admin/post_images/<?php echo $image; ?>" width="60" height="60" /></td>
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
                    <td><input type="submit" name="update" value="Zatwierdź" /></td>
             </tr>    
  
        </table>
   </div>   
</form>

<?php
if(isset($_POST['update'])) {
	
    $post_id = $_POST['post_id1'];
	$post_title = $_POST['post_title'];
	$post_date = date('m-d-y');
	$post_cat1 = $_POST['cat'];
	$post_author = $_POST['post_author'];
	$post_keywords = $_POST['post_keywords'];
	$image = $_FILES['image']['name'];
	$post_img_tmp = $_FILES['image']['tmp_name'];
	$post_content = $_POST['post_content'];
    $post_gallery_n = $_POST['post_gallery'];
    $post_visible_n = $_POST['post_visible'];
    $post_allow_comments_n = $_POST['post_allow_comments'];
    $post_sid_n = $_POST['post_sid'];
    
if($post_title=='' OR $post_cat=='null' OR $post_keywords==''
	OR $post_content==''){
	echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?edit_post=$post_id,'_self')</script>";
		}
	else {
		
		move_uploaded_file($post_img_tmp, "../admin/post_images/$image");
		
        $update_posts = 
            "update 
            posts 
            set 
            category_id='$post_cat1',
            post_title='$post_title',
            post_date='$post_date',
            post_author='$post_author',
            post_keywords='$post_keywords',
            post_image='$image',
            post_content='$post_content',
            post_sid='$post_sid_n',
            post_visible='$post_visible_n',
            post_gallery_id='$post_gallery_n',
            post_allow_comments='$post_allow_comments_n'
            where post_id='$post_id'";
        
		$run_update = mysql_query($update_posts);
		echo "<script>alert('Artykul zostal zaktualizowany!')</script>";
		echo "<script>window.open('index.php?view_posts','_self')</script>";
		}
	}
    
?>