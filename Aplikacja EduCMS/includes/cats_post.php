<div class="post_area">
<?php
if(isset($_GET('cat'])){
    $cat_id = $_GET['cat'];
	$get_posts = "select * from posts where 
    post_visible='Y' and 
    category_id='$cat_id'";
	$run_posts = mysql_query($get_posts);
	while ($row_posts = mysql_fetch_array($run_posts)) {
		
		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		$post_date = $row_posts['post_date'];
		$post_author = $row_posts['post_author'];
		$post_image = $row_posts['post_image'];
		$post_content = substr($row_posts['post_content'],0,300);
		
		echo 
		"<h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
		<span><i>Autor:</i> <b>$post_author</b> &nbsp; &nbsp; w dniu $post_date</span>
		<span>Komentarze</span>
		<img src='admin/news_images/$post_image' width='100' height='100/>
		<div>$post_content<a id='rmlink' href='details.php?post=$post_id'>Read More</a>
		</div><br />
		";}
}
		?>	
</div>