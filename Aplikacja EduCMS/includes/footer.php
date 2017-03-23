<div class="footer">
    <div class="top"><a href="#">Przejdź do góry<img src="images/up_arrow.png" style="width:15px;height:15px;"></a></div>
	<ul id="footer_menu">
    	<?php
        //wyswietlanie kategorii
		include("includes/database.php");
		
        $get_cats = "select * from 
        categories where 
        position='navbar' and
        visible = 'Y'
        ORDER BY sort_id DESC";
		$run_cats = mysql_query($get_cats);
		while ($cats_row=mysql_fetch_array($run_cats)) {
		$cat_id=$cats_row['cat_ID'];
		$cat_title=$cats_row['cat_title'];
		 echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        }
        //wyswietlanie stron 

        $get_posts = "select * from posts where is_page='yes' and 
        is_page_position='navbar' and 
        post_visible='Y'
        ORDER BY post_sid DESC"; 
        $run_posts = mysql_query($get_posts);
		while ($row_posts = mysql_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		echo "<li><a href='index.php?is_page=$post_id'>$post_title</a></li>";
        }
//select c.cat_ID, p.post_ID  from categories c inner join posts p in c.postion=p.is_page_position 
		?>
        </ul>
</div>