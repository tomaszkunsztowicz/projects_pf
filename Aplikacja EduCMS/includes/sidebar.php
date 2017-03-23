<div class="sidebar">   
        <?php
		include("includes/database.php");
		$get_cats = "select * from 
        categories where 
        position='sidebar' and
        visible = 'Y'
        ORDER BY sort_id DESC";
    
		$run_cats = mysql_query($get_cats);
		while ($cats_row=mysql_fetch_array($run_cats))
        {
		$cat_id=$cats_row['cat_ID'];
		$cat_title=$cats_row['cat_title'];
        echo "<p id='sidebar_cats'><a href='index.php?cat=$cat_id'>$cat_title</a></p>"; 
		$get_posts = "select * from posts where category_id='$cat_id'";
		$run_posts = mysql_query($get_posts);   
		while ($row_posts = mysql_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		echo "<p>
		<a href='details.php?post=$post_id'>$post_title</a></p>
		";
		}        
		}	
?>
</div>


  
 <?php
        //wyswietlanie stron 
        $get_posts = "select * from posts where 
        is_page='yes' and 
        is_page_position='sidebar' and
        post_visible='Y'
        ORDER BY post_sid DESC "; 

        $run_posts = mysql_query($get_posts);
		while ($row_posts = mysql_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		echo "
        <div class='sidebar'> 
        <p id='sidebar_cats'><a href='index.php?is_page=$post_id'>$post_title</a></p>
        </div>";
        }
		?>



<div class="sidebar">   
<?php
echo "<h3>Galerie</h3>";
echo "<p><a href='index.php?gallery_cat'>zobacz nasze galerie</a></p>";
?>
</div>
    
<div class="sidebar">   
<?php
echo "<h3>Plany lekcji</h3>";
echo "<p><a href='index.php?lesson_plans'>zobacz aktualne plany zajęć</a></p>";
?> 
</div>
    
<div class="sidebar">   
<?php
echo "<h3>Polecane linki</h3>";
$get_links = "select * from recommended_links where 
        visible='Y'
        ORDER BY sort_id DESC "; 

        $run_links = mysql_query($get_links);
		while ($row_links = mysql_fetch_array($run_links)) {
		$link_name = $row_links['link_name'];
		$link_url = $row_links['link_url'];
        $link_img = $row_links['image_path'];
        echo "<img src='$link_img' width='50' height='50' style='padding:3px;'>";   
		echo "<p><a href='$link_url'>$link_name</a></p>";
        }
?>   
</div> 
    
<div class="sidebar">   
<?php
echo "<h3>Ankiety</h3>";

$get_polls = "select * from polls where 
        visible='Y'"; //order by sort id desc

        $run_polls = mysql_query($get_polls);
		while ($row_polls = mysql_fetch_array($run_polls)) {
		$title = $row_polls['title'];
		$id = $row_polls['id'];  
		echo "<p><a href='index.php?poll=$id'>$title</a></p>";
        }

?>    
    </div>
    