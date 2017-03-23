<?php
session_start();

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
    $user_rights = $_SESSION['rights']; 
    if ($user_rights != ('admin' OR 'nauczyciel' OR 'uczen' OR 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('login.php','_self')</script>";
        die();
    };
    
} else {
    echo "echo <script>window.open('login.php','_self')</script>";
    die();
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>EduCMS - Panel administracyjny</title>
<link rel="stylesheet" href="admin.css" media="all"/>
</head>
    
<body>
<div class="wrapper">
    <!--górny panel-->
    <div class="header">
        <h1>EduCMS - Panel administracyjny</h1>
        <div>Witaj, <?php echo $username; ?></div>
        <div>Stopień uprawnień: <?php echo $user_rights; ?></div>
        <div class='logout'>
        <form action="logout.php">
            <input type="submit" value="Wyloguj się" />
            </form>
        </div>
        
    </div>
    
    <!--lewy panel-->
    <div class="left">
    
       
        
        
        <!--zarzadzanie stronami-->
        <div><a href="index.php?view_pages" id="navlink">Strony</a></div>
        
        <!--zarzadzanie artykulami, artykuly uzywaja kategorii-->
        <div><a href="index.php?view_posts" id="navlink">Artykuły</a></div>
        
        <!--zarzadzanie kategoriami artykułów-->
        <div><a href="index.php?view_categories" id="navlink">Kategorie</a></div>
        
        <!--zarzadzanie ogłoszeniami na tablicy-->
        <div><a href="index.php?view_board_posts" id="navlink">Tablica ogłoszeń</a></div>
        
        <!--zarzadzanie komentarzami-->
        <div><a href="index.php?view_comments" id="navlink">Komentarze</a></div>
        
        <!--zarzadzanie galeriami-->
        <div><a href="index.php?view_galleries" id="navlink">Galerie</a></div>
        
        <!--zarzadzanie planami zajec-->
        <div><a href="index.php?view_classes" id="navlink">Plany zajęć</a> 
        </div>
    
        <!--zarzadzanie autorami-->
        <div><a href="index.php?view_authors" id="navlink">Autorzy</a></div>
        
        <!--zarzadzanie polecanymi linkami-->
        <div><a href="index.php?view_links" id="navlink">Polecane linki</a></div>

    
        <!--zarzadzanie ankietami-->
        <div><a href="index.php?view_polls" id="navlink">Ankiety</a></div>
        <div><a href="index.php?view_users" id="navlink">Użytkownicy</a></div>
    </div>
    
    
    <!--prawy panel-->
    <div class="right">
     <!--   <span style="padding:5px; margin:5px;"><strong>To do Tasks:</strong><span style="color:red;
        padding:5px; margin:5px;"><a href="index.php?view_comments">Pending Comments(0)</a></span>          </span></span>-->
        
        
        
<?php
//zarzadzanie stronami

if(isset($_GET['insert_page'])) 
{
    
    if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_page.php"); 
    }
     
}

else if(isset($_GET['view_pages'])) {
    
 if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_pages.php"); 
    }
}

else if(isset($_GET['edit_page'])) {
    if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_page.php"); 
    }  
}

//zarzadzanie postami
else if(isset($_GET['insert_post'])) 
{
 if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_post.php"); 
    }
    
}


else if(isset($_GET['view_posts'])) {
if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_posts.php"); 
    }
    
}

else if(isset($_GET['edit_post'])) {
    if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_post.php"); 
    }
}

//zarzadzanie kategoriami
else if(isset($_GET['insert_category'])) {
if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_category.php"); 
    }  
}

else if(isset($_GET['view_categories'])) {
if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_categories.php"); 
    }  
}

else if(isset($_GET['edit_category'])) {
    if ($user_rights != ('nauczyciel' or 'uczen' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_category.php"); 
    }   
}

//zarzadzanie galeriami
else if(isset($_GET['view_galleries'])) {
if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_galleries.php"); 
    }  
}


else if(isset($_GET['edit_gallery'])) {
if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_gallery.php"); 
    } 
}
else if(isset($_GET['insert_gallery'])) {
if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_gallery.php"); 
    } 
}

else if(isset($_GET['view_images'])) {
    if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_images.php"); 
    } 
}

else if(isset($_GET['insert_image'])) {
if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_image.php"); 
    } 
}

else if(isset($_GET['edit_image'])) {
    if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_image.php"); 
    } 
}

//zarzadzanie planami zajec 

else if(isset($_GET['insert_class'])) {
    if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_class.php"); 
    } 
}

else if(isset($_GET['view_classes'])) {
       if ($user_rights != ('nauczyciel' or 'admin' or 'superadmin')) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_classes.php"); 
    } 
}

else if(isset($_GET['edit_class'])) {
    if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_class.php"); 
    } 
}

else if(isset($_GET['upload_plan'])) {
    if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/upload_plan.php"); 
    } 
}

//zarzadzanie wychowawcami

else if(isset($_GET['insert_teacher'])) {
      if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_teacher.php"); 
    } 
}

else if(isset($_GET['view_teachers'])) {
     if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_teachers.php"); 
    } 
}

else if(isset($_GET['edit_teacher'])) {
     if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_teacher.php"); 
    } 
}

//zarzadzanie autorami

else if(isset($_GET['insert_author'])) {
         if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_author.php"); 
    } 
}

else if(isset($_GET['view_authors'])) {
        if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_authors.php"); 
    } 
}

else if(isset($_GET['edit_author'])) {
        if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_author.php"); 
    } ;
}

//zarzadzanie tablica

else if(isset($_GET['insert_board_post'])) {
            if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_board_post.php"); 
    } 
}

else if(isset($_GET['view_board_posts'])) {
            if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_board_posts.php"); 
    } 
}

else if(isset($_GET['edit_board_post'])) {
                if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_board_post.php"); 
    } 
}

//zarzadzanie rekomendowanymi linkami

else if(isset($_GET['insert_link'])) {
                if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_link.php"); 
    } 
}

else if(isset($_GET['view_links'])) {
      if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_links.php"); 
    } 
}

else if(isset($_GET['edit_link'])) {
       if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_link.php"); 
    } 
}

//ankiety

else if(isset($_GET['insert_poll'])) {
      if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_poll.php"); 
    } 
}

else if(isset($_GET['view_polls'])) {
  if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_polls.php"); 
    } 
}

else if(isset($_GET['edit_poll'])) {
    if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_poll.php"); 
    } 
}


else if(isset($_GET['view_questions'])) {
  if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_questions.php"); 
    } 
}

else if(isset($_GET['insert_question'])) {
  if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_question.php"); 
    } 
}

else if(isset($_GET['edit_question'])) {
  if ($user_rights != ('nauczyciel' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_question.php"); 
    } 
}

//zarzadzanie komentarzami

else if(isset($_GET['view_comments'])) {
      if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_comments.php"); 
    } 
}

else if(isset($_GET['block_comment'])) {
    if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/block_comment.php"); 
    } 
}

else if(isset($_GET['approve_comment'])) {
      if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/approve_comment.php"); 
    } 
}

else if(isset($_GET['delete_comment'])) {
      if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/delete_comment.php"); 
    } 
}

else if(isset($_GET['view_comment_text'])) {
        if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_comment_text.php"); 
    } 
}

else if(isset($_GET['view_post_text'])) {
        if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_post_text.php"); 
    } 
}



//zarzadzanie uzytkownikami
else if(isset($_GET['insert_user'])) {
      if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/insert_user.php"); 
    } 
}

else if(isset($_GET['view_users'])) {
      if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/view_users.php"); 
    } 
}

else if(isset($_GET['edit_user'])) {
        if ($user_rights != ('admin' or 'superadmin') ) {
        echo "<script>alert('Nie masz uprawnien!')</script>"; 
        echo "echo <script>window.open('index.php','_self')</script>";
        die();
    }
    else
    {
include("includes/edit_user.php"); 
    } 
}

else {
    echo"
    <h1>Wprowadzenie</h1>
    <p>Witamy w panelu administracyjnym portalu systemu EduCMS.
    Panel ten ma na celu ułatwienie zarządzania aplikacją dla placówek edukacyjnych.</p>";
};
?>
    </div>
    </div>
</body>
</html>


	
	
	
    
 