<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php"); ?>

<form action="index.php?insert_link" method="post" enctype="multipart/form-data">
<div class="CSSTableGenerator"> 
		<table width="700" align="center">    	
            <tr>
            		<td colspan="2"><h2>Dodaj link</h2></td>
			</tr>   
              <tr>
                    <td>Nazwa:</td>
                  <td><input type="text" name="link_name"/></td>
              </tr> 
            
             <tr>
                   <td>Url:</td>
                  <td><input type="text" name="url_rec_link"/></td>
              </tr> 
            
              <tr>
            		<td>Obrazek:</td>
                    <td><input type="file" name="file_upload" /></td>
             </tr>  
            
             <tr>
            		<td>Czy widoczny:</td>  
                  	<td>
            		<select name="vis">
            			<option value="null">wybierz opcję</option>
                        <option value="Y">Y</option>";
                        <option value="N">N</option>";
            		</select>	
            		</td>
                  
             </tr>   
            
            <tr>
                   <td>Sort ID:</td>
                  <td><input type="text" name="sid"/></td>
              </tr> 
            
            
              <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Zatwierdź" /></td>
             </tr>    
     
        </table>
   </div>   
</form>

<?php
if(isset($_POST['submit'])) {
	
	$link_name = $_POST['link_name'];
    $url_rlink = $_POST['url_rec_link'];
    $sid = $_POST['sid'];
    $vis = $_POST['vis'];
    
    $name=basename($_FILES['file_upload']['name']);
    $t_name=$_FILES['file_upload']['tmp_name'];
    
	if($link_name=='' OR $url_rec_link=''){
		echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
		echo "<script>window.open('index.php?insert_link,'_self')</script>";
		}
	else {
	    move_uploaded_file($t_name,"../admin/includes/upload/$name");
		$insert_link = "insert into recommended_links (link_name, link_url, sort_id, visible, image_path) values 
        ('$link_name','$url_rlink', '$sid', '$vis','../admin/includes/upload/$name')";
        
		$run_link = mysql_query($insert_link);
		echo "<script>alert('Link został dodany!')</script>";
		echo "<script>window.open('index.php?view_links','_self')</script>";
		}
	}

?>












