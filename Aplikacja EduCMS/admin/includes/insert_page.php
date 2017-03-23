<?php include("../includes/database.php");?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>
<div class="CSSTableGenerator" >
<form action="index.php?insert_page" method="post" enctype="multipart/form-data">
		<table width="700" align="center">         
    <tr>
    <td colspan="8" align="center" bgcolor="#0099CC"><h2>Dodaj stronę</h2></td>
    </tr>
            <tr>
            		<td>Tytuł strony:</td>
                    <td><input type="text" name="post_title" style="width: 300px;" maxlength="200"/></td>
             </tr>  
              <tr>
            		<td>Pozycja strony:</td>
            		<td>
            		<select name="pos">
            			<option value="null">wybierz pozycję</option>
                        <option value="navbar">menu poziome</option>";
                        <option value="sidebar">menu pionowe</option>";
            		</select>	
            		</td>
             </tr>         
              <tr>
            			<td>Autor:</td>
            		<td>
            		<select name="post_author">
            			<option value="null">wybierz autora</option>
                         <?php
		                  include("../includes/database.php");
		                  $get_authors = "select * from authors";
		                  $run_authors = mysql_query($get_authors);
		                  while ($authors_row=mysql_fetch_array($run_authors)) {
		                  $author_id=$authors_row['id'];
		$author_title=$authors_row['name'];
		 echo "<option value='$author_title'>$author_title</option>";
		}	
		?>
                        </select>	
            		</td>
            </tr>
              <tr>
            		<td>Słowa kluczowe:</td>
                    <td><input type="text" name="post_keywords" style="width: 300px;" maxlength="200"/></td>
             </tr>    
             
              <tr>
            		<td>Obrazek:</td>
                    <td><input type="file" name="post_image" /></td>
             </tr>    
              <tr>
            		<td>Treść strony:</td>
                    <td><textarea name="post_content" rows="14" cols="40"></textarea></td>
             </tr>  
            
             <tr>
            		<td>Powiązana galeria:</td>
            		<td>
            		<select name="gal_id">
            			<option value="null">brak</option>
                         <?php
		include("../includes/database.php");
		$get_gals = "select * from gallery_category";
		$run_gals = mysql_query($get_gals);
		while ($gals_row=mysql_fetch_array($run_gals)) {
		$gal_id=$gals_row['category_id'];
		$gal_title=$gals_row['category_name'];
		 echo "<option value='$gal_id'>$gal_title</option>";
		}	
		?>
                        </select>	
            		</td>
  
             </tr>   
            
              <tr>
            		<td>Czy widoczna:</td>  
                  	<td>
            		<select name="post_visible">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">tak</option>";
                        <option value="N">nie</option>";
            		</select>	
            		</td>
                  
             </tr>   
            
           
              <tr>
            		<td>Zezwól na komentarze:</td> 
                    <td>
            		<select name="post_allow_comments">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">tak</option>";
                        <option value="N">nie</option>";
            		</select>	
            		</td>
             </tr>   
            
               <tr>
            		<td>ID sortowania:</td> 
                    <td><input type="text" name="post_sid" /></td>
             </tr>   
             <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>         
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$post_title = $_POST['post_title'];
	$post_date = date('m-d-y');
	$post_author = $_POST['post_author'];
	$post_keywords = $_POST['post_keywords'];
	$post_image = $_FILES['post_image']['name'];
	$post_image_tmp = $_FILES['post_image']['tmp_name'];
	$post_content = $_POST['post_content'];
    $page_pos = $_POST['pos'];
    $post_gal_id = $_POST['gal_id'];
    $post_visible = $_POST['post_visible'];
    $post_allow_comments = $_POST['post_allow_comments'];
    $post_sid = $_POST['post_sid'];
    
	if($post_title=='' OR $page_pos=='null' OR $post_keywords==''
	    OR $post_content==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_page,'_self')</script>";
		}
    
  /*  else  {
    $get_sid = "select distinct post_sid from posts where post_sid='$post_sid'"; 
    $run_sid = mysql_query($get_sid);
    while ($row_sid = mysql_fetch_array($run_sid))  
        
        {  
        $sid = $row_sid['post_sid'];
        if ($post_sid!='null') {
        echo "<script>alert('Sort ID jest już przypisany do innej strony lub kategorii, proszę zmienić.')</script>";
		echo "<script>window.open('index.php?insert_page,'_self')</script>";   
		}
    */
        else {  
		move_uploaded_file($post_image_tmp, "post_images/$post_image");
		$insert_posts = "insert 
        into 
        posts 
        (category_id,
		post_title,
        post_date,
        post_author,
        post_keywords,
        post_image,
		post_content,
        is_page,
        is_page_position,
        post_sid, 
        post_visible, 
        post_gallery_id, 
        post_allow_comments) 
        values 
        ('0',
        '$post_title',
        '$post_date',
		'$post_author',
        '$post_keywords',
        '$post_image',
        '$post_content',
        'yes',
        '$page_pos',
        '$post_sid',
        '$post_visible',
        '$post_gal_id',
        '$post_allow_comments'
        )";
        
       $run_posts = mysql_query($insert_posts);
	   echo "<script>alert('Strona zostala opublikowana.')</script>";
	   echo "<script>window.open('index.php?view_pages','_self')</script>";
		}
	}
//    }
//}

?>









