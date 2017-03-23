<script type="text/javascript" src="../js/highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="../js/highslide/highslide.css" />
<script type="text/javascript">
    // override Highslide settings here
    // instead of editing the highslide.js file
    hs.graphicsDir = '../js/highslide/graphics/';
</script>
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=800,width=600');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>

<div class="post_area">
<?php
// jesli jest pobrany atrybut cat, wyswietlana jest lista artykulow z danej kategorii
if(isset($_GET['cat'])){
    
    $cat_id = $_GET['cat'];
    $get_cats = "select cat_title from categories where cat_ID='$cat_id'";
    $run_cats = mysql_query($get_cats);
	while ($row_cats = mysql_fetch_array($run_cats)) {
		
		$cat = $row_cats['cat_title'];
        echo "<p id='rmlink'><a href='index.php'>Powrót do strony głównej</a></p>";
        echo "<h1>$cat</h1>";
        
    }
    
	$get_posts = "select * from posts where category_id='$cat_id' and post_visible='Y'";
	$run_posts = mysql_query($get_posts);
	while ($row_posts = mysql_fetch_array($run_posts)) {
		
		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		$post_date = $row_posts['post_date'];
		$post_author = $row_posts['post_author'];
		$post_image = $row_posts['post_image'];
		$post_content = substr($row_posts['post_content'],0,200);
        $post_gallery_id = $row_posts['post_gallery_id'];
        $post_visible = $row_posts['post_visible'];
        $post_allow_comments = $row_posts['post_allow_comments'];
        $post_sid = $row_posts['post_sid'];
        
        echo "<h2>$post_title</h2>";
            
        if ($post_image!='') {
        echo "<img src='admin/post_images/$post_image' height='80' width='80'/>";
        }
        
        if ($post_author != 'null'){
		echo " <span style='font-family:Lucida Grande;'>Autor: $post_author, w dniu                                                                   $post_date</span></br></br>";
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

		echo"<div>$post_content...<a id='rmlink' href='details.php?post=$post_id'>Czytaj więcej</a>
		</div><br />
		";}
}

// jesli jest pobrany atrybut page, wyswietlana jest cala strona
else if(isset($_GET['is_page']))  {
        $post_id = $_GET['is_page'];
		$get_posts = "select * from posts where post_id='$post_id' and post_visible='Y'";
		$run_posts = mysql_query($get_posts);
		while ($row_posts = mysql_fetch_array($run_posts))      
        {  
        $post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		$post_date = $row_posts['post_date'];
		$post_author = $row_posts['post_author'];
		$post_image = $row_posts['post_image'];
		$post_content = $row_posts['post_content'];	
        $post_gallery_id = $row_posts['post_gallery_id'];
        $post_visible = $row_posts['post_visible'];
        $post_allow_comments = $row_posts['post_allow_comments'];
        $post_sid = $row_posts['post_sid'];
       
        echo "<p id='rmlink'><a href='index.php'>Powrót do strony głównej</a></p>";
		echo "<h2>$post_title</h2>";
            
        if ($post_image!='') {
        echo "<img src='admin/post_images/$post_image' height='300' width='300'/>";
        }
            
		echo "<div>$post_content</div><br />";
        
        if ($post_author != (('') or ('null'))){
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
            
		}
   
        }
    
}

// jesli jest pobrany atrybut plan
else if(isset($_GET['lesson_plans']))  {
        echo "<h2>Wybierz plan zajęć dla swojej klasy</h2>"; 
		$get_classes = 
        "select c.class_id,
        c.teacher_id,
        c.year,
        c.letter,
        c.profile,
        t.id,
        t.name
        from 
        classes c, 
        teachers t 
        where 
        c.teacher_id=t.id order by c.year, c.letter ASC";
		$run_classes = mysql_query($get_classes);
		while ($row_classes = mysql_fetch_array($run_classes))      
        {  
        $class_id = $row_classes['class_id'];
		$teacher_id = $row_classes['teacher_id'];
		$year = $row_classes['year'];
		$letter = $row_classes['letter'];
		$profile = $row_classes['profile'];
        $teacher_name = $row_classes['name'];

        echo "<p id='class_button'><a href='index.php?plans=$class_id'>Klasa: $year $letter
        </br>
        Profil: $profile 
        </br> Wychowawca: $teacher_name</a></p>";
        }
}


/*
else if(isset($_GET['plan_print']))  {
    include ("includes/plan_print.php"); }
*/

else if(isset($_GET['plans']))  {
    
    $class_id = $_GET['plans'];
     echo "<p id='rmlink'><a href='index.php?lesson_plans'>Powrót do listy klas</a></p>";
    ?>
     <p id="rmlink">
     <a href="view_plan_print.php?plan_print=<?php echo $class_id; ?>" 
     onclick="return popitup('view_plan_print.php?plan_print=<?php echo $class_id; ?>')">
     Wersja do druku
     </a></p>
    <?php
    
    require_once 'includes/excel/reader.php';  
		$get_c = 
        "select c.class_id,
        c.teacher_id,
        c.year,
        c.letter,
        c.profile,
        t.id,
        t.name
        from 
        classes c, 
        teachers t
        where 
        c.class_id='$class_id' and c.teacher_id=t.id";
    
		$run_c = mysql_query($get_c);
		while ($row_c = mysql_fetch_array($run_c))      
        {  
        $class_id = $row_c['class_id'];
		$teacher_id = $row_c['teacher_id'];
		$year = $row_c['year'];
		$letter = $row_c['letter'];
		$profile = $row_c['profile'];
        $teacher_name = $row_c['name'];
        echo "<h2>Klasa: $year $letter
        </br> 
        Profil: $profile </br>
        </h2>";    
        }

    $get_classes = 
        "select 
        *
        from plans
        where
        class_id='$class_id'";
        $run_classes = mysql_query($get_classes);
		while ($row_classes = mysql_fetch_array($run_classes))     
        {
        $path = $row_classes['path'];
            
        $xls = new Spreadsheet_Excel_Reader();
        $xls->setOutputEncoding('UTF-8');
        $xls->read($path);
        }
echo "<h2>Poniedziałek</h2>";
echo "<div class='CSSTableGenerator'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[0]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[0]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[0]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Wtorek</h2>";
echo "<div class='CSSTableGenerator'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[1]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[1]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[1]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Środa</h2>";
echo "<div class='CSSTableGenerator'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[2]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[2]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[2]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Czwartek</h2>";
echo "<div class='CSSTableGenerator'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[3]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[3]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[3]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Piątek</h2>";
echo "<div class='CSSTableGenerator'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[4]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[4]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[4]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
        }

// jesli jest pobrany atrybut kategorii galerii
else if(isset($_GET['gallery_cat'])) {    
$get_img_cat="select * from gallery_category";
$run_img_cat=mysql_query($get_img_cat);
echo "<h2>Oglądaj nasze galerie</h2>"; 
 while($row_img_cat=mysql_fetch_array($run_img_cat)) {
$img_cat_id = $row_img_cat['category_id'];
$img_cat_name = $row_img_cat['category_name'];
echo "
<p><a href='index.php?cid=$img_cat_id'>$img_cat_name</a><p/>";    
}
}

// jesli jest wybrana galeria, wyswietla obrazy z galerii
else if(isset($_GET['cid'])) 
{
$id=$_GET['cid'];
    {
        
    $get_cat="select * 
    from 
    gallery_category 
    where category_id='$id'"
    ;
    $run_cat=mysql_query($get_cat);
    while($row_cat=mysql_fetch_array($run_cat)) 
    {
    $cat_id=$row_cat['category_id'];
    $cat_name=$row_cat['category_name'];
    $cat_desc=$row_cat['description'];
    $cat_date=$row_cat['date'];
        
    echo "<div id='rmlink'><a href='index.php?gallery_cat'>Powrót do listy galerii</a></div>";     
    echo "<h2>$cat_name</h2>"; 
    echo "<p>$cat_desc, $cat_date</p>";       
    }
      
$get_images=
    "select * 
    from 
    gallery_photos 
    where cid='$id'"
    ;
$run_images=mysql_query($get_images);
while($row_images=mysql_fetch_array($run_images)) {
$img_path=$row_images['path'];
$img_desc=$row_images['description'];
    
echo "<a href='$img_path' class='highslide'
    onclick='return hs.expand(this)'>
    <img src='$img_path' alt='Highslide JS'
    title='Click to enlarge' height='120' width='107' /></a>    
      </a>
<div class='highslide-caption'>
    $img_desc
</div>";
}

}
}
   
else if(isset($_GET['poll'])) {
    include("includes/poll.php");
}

else if(isset($_GET['poll_results'])) {
    include("includes/poll_results.php");
}

// jesli nie ma atrybutu - strona główna
else {
    echo "<h1>Witamy na stronie głównej naszej szkoły!</h1>";
    $get_bp="select * from board_posts where board_post_visible='y' and board_post_date =
    (SELECT max(board_post_date) FROM board_posts )
    ";
      
$run_bp=mysql_query($get_bp);
while($row_bp=mysql_fetch_array($run_bp)) {
    $bp_content=$row_bp['board_post_content'];
    $bp_title=$row_bp['board_post_title'];
    echo "<img src='/images/blackboard.jpg' height='70%' width='70%' 
    style='
    margin-left:100px;
    '/>";
    echo "<div id='board'>
    Aktualnie na tablicy:</br>
    $bp_title</br>
    $bp_content</div>";
}
	$get_posts = "select * from posts where post_visible='Y' order by post_date desc limit 0,5";
	$run_posts = mysql_query($get_posts);
	while ($row_posts = mysql_fetch_array($run_posts)) {
		
		$post_id = $row_posts['post_id'];
		$post_title = $row_posts['post_title'];
		$post_date = $row_posts['post_date'];
		$post_author = $row_posts['post_author'];
		$post_image = $row_posts['post_image'];
		$post_content = substr($row_posts['post_content'],0,100);
        $post_gallery_id = $row_posts['post_gallery_id'];
        $post_visible = $row_posts['post_visible'];
        $post_allow_comments = $row_posts['post_allow_comments'];
        $post_sid = $row_posts['post_sid'];
        
        echo "<h2>$post_title</h2>";
            
        if ($post_image!='') {
        echo "<img src='admin/post_images/$post_image' height='80' width='80'/>";
        }
        
        if ($post_author != (('') or ('null'))){
		echo " <span style='font-family:Lucida Grande;'>Autor: $post_author, w dniu                           $post_date</span></br></br>";
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
        
		echo"<div>$post_content...<a id='rmlink' href='details.php?post=$post_id'>Czytaj więcej</a>
		</div><br />
		";}
}
    
    
    
    
    
    //dac jeszcze posty losowe??


?>	
</div>