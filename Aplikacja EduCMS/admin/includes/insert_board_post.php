<?php include("../includes/database.php");?>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="includes.css" media="all"/>
<div class="CSSTableGenerator" >
<form action="index.php?insert_board_post" method="post" enctype="multipart/form-data">
		<table width="700" align="center"> 
            
             
            <tr>
            		<td colspan="2"><h2>Dodaj ogłoszenie:</h2></td>
			</tr>   
            
            <tr>
            		<td>Tytuł ogłoszenia:</td>
                    <td><input type="text" name="board_post_title" /></td>
            </tr>        
            
       
              <tr>
            		<td>Treść ogłoszenia:</td>
                    <td><textarea name="board_post_content" rows="14" cols="40"></textarea></td>
             </tr>    
                      
              <tr>
            		<td>Czy widoczne:</td>  
                  	<td>
            		<select name="board_post_visible">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">Y</option>";
                        <option value="N">N</option>";
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
	
    $board_post_title = $_POST['board_post_title'];
	$board_post_date = date('m-d-y');
	$board_post_content = $_POST['board_post_content'];
    $board_post_visible = $_POST['board_post_visible'];
 
	if($board_post_title==''
	    OR $board_post_content==''){
		echo "<script>alert('Prosze wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_board_post,'_self')</script>";
		}
    
	else {
		
		$insert_board_posts = 
            "insert into 
            board_posts  (
		board_post_title,
        board_post_date,
		board_post_content,
        board_post_visible 
        ) 
        values 
        (
        '$board_post_title',
        '$board_post_date',
        '$board_post_content',
        '$board_post_visible'
        )";
		
		$run_board_posts = mysql_query($insert_board_posts);
		echo "<script>alert('Ogłoszenie zostalo opublikowane!')</script>";
		echo "<script>window.open('index.php?view_board_posts','_self')</script>";
		}
	}

?>










