<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Liceum Ogólnokształcące - strona naszej szkoły</title>
<script type="text/javascript" src="js/date_time.js"></script>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
</html>
<body>
<div class="container">
<!--menu górne-->
<div>
<?php include("includes/menu_top.php"); ?>       
</div>  
<div class="head">
<!-- skrypt wyswietlajacy date i czas-->
<div id="date_time">
<script type="text/javascript">window.onload = date_time('date_time');</script> 
</div>
<div id='logo'>
III Liceum Ogólnokształcące im. Kazimierza Górskiego w Koszalinie    
</div>

<div id='adres'>
ul. Leśmianowa 14, 75-035 Koszalin  
</div>
    
<!--wyswietlanie kategorii -->
<?php include("includes/navbar.php"); ?>
	</div>
    
    
	<div class="post_area">
		<!--wyswietlanie tresci artykulow --> 
		<?php

if(isset($_GET['post']))  {
        $post_id = $_GET['post'];
         
		$get_posts = "select * from posts where post_id='$post_id'";
		$run_posts = mysql_query($get_posts);
		while ($row_posts = mysql_fetch_array($run_posts))      
        {  
		$post_title = $row_posts['post_title'];
		$post_date = $row_posts['post_date'];
		$post_author = $row_posts['post_author'];
		$post_image = $row_posts['post_image'];
		$post_content = $row_posts['post_content'];	
        $post_gallery_id = $row_posts['post_gallery_id'];
        $post_visible = $row_posts['post_visible'];
        $post_allow_comments = $row_posts['post_allow_comments'];
        $post_sid = $row_posts['post_sid'];  
        $cat=$row_posts['category_id'];
              
    echo "<p id='rmlink'><a href='index.php?cat=$cat'>Powrót do kategorii</a></p>";
	echo "<h2>$post_title</h2>";
            
        if ($post_image!='') {
        echo "<img src='admin/post_images/$post_image' height='300' width='300'/>";
        }
            
		echo "<div>$post_content</div><br />";
        
        if ($post_author != ('' or 'null')){
		echo " <span style='font-family:Lucida Grande;'><i>Napisane przez:</i> <b>$post_author</b>, w dniu                           $post_date</span></br></br>";
		}
            
        if ($post_gallery_id > 0){
        $get_gal_name = "select * from gallery_category where category_id='$post_gallery_id'"; 
        $run_gal_name = mysql_query($get_gal_name);
		while ($row_gal_name = mysql_fetch_array($run_gal_name))      
        {  
        $gal_name = $row_gal_name['category_name'];
		echo "<span style='font-family:Lucida Grande; color:black'>Powiązana galeria:</span><br />
        <a href='index.php?cid=$post_gallery_id'>$gal_name</a><br /><br />";
        }   
		}
        
        if ($post_allow_comments == 'Y'){
        include("includes/comment_form.php");
        //lista komentarzy
		}    
            
}
}

		?>	
        
	</div>
    
<!--sidebar-->
<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
   

	
	
	