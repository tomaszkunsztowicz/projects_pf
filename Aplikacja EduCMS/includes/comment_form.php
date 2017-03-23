<link rel="stylesheet" href="styles/comment_form.css" media="all"/>

<?php
include("includes/database.php");
if(isset($_GET['post'])){
    $post_id = $_GET['post'];
    $get_posts = "select * from posts where post_id='$post_id'";
    $run_posts = mysql_query($get_posts);
    $row=mysql_fetch_array($run_posts);
    $post_new_id=$row['post_id'];
}
?>

 
<?php
$get_comments = "select * from comments where post_id='$post_new_id' 
and status='zaakceptowany'";
$run_comments = mysql_query($get_comments);
$count = mysql_num_rows($run_comments);
?>
<div class="CSSTableGenerator" >
<table>
        <tr>
        <td>Komentarze<?php echo "(". $count . ")";  ?></td>
        </tr>     
<?php
$get_comments = "select * from comments where post_id='$post_new_id' 
and status='zaakceptowany'";
$run_comments = mysql_query($get_comments);
while($row_comments=mysql_fetch_array($run_comments)){
    $comment_name=$row_comments['comment_name'];
    $comment_text=$row_comments['comment_text'];
    $date=$row_comments['date'];
    $comment_email=$row_comments['comment_email'];
    echo "<tr><td><strong>$comment_name ($comment_email), 
    w dniu $date skomentował:</strong></td>
    <tr><td>$comment_text</td></tr>";   
}
?>
</table>
</div>
<div class="CSSTableGenerator" >
<form method="post" action="details.php?post=<?php echo $post_id; ?>">
    <table>
        <tr>
        <td colspan="2">Dodaj komentarz
        </td>
        </tr>
        <tr>
        <td align="right">Nazwa użytkownika:</td>
        <td><input type="text" name="comment_name"/></td>   
        </tr>
        <tr>
        <td align="right">E-mail użytkownika:</td>
        <td><input type="text" name="comment_email"/></td>   
        </tr><tr>
        <td align="right">Treść komentarza:</td>
        <td><textarea name="comment" cols="60" rows="8"></textarea></td>   
        </tr>
        <tr>
        <td colspan="2"><input type="submit" name="sumbit" value="Komentuj!"/></td>   
        </tr>   
    </table>
    </form>
</div>
<?php

if(isset($_POST['comment'])){
    
    $comment_name = $_POST['comment_name'];
    $comment_email = $_POST['comment_email'];
    $comment = $_POST['comment'];
    $status = "do zatwierdzenia";
    $date = date('d-m-y');
    
    if($comment_name=='' OR $comment_email=='' OR $comment=='') {
        echo "<script>alert('Proszę wypełnić wszystkie pola.')</script>";
        echo "<script>window.open('details.php?post=$post_id'</script>";
        exit();
    }
    
    else {
        $query_comment = "insert into comments (post_id, comment_name, comment_email,
        comment_text, status, date) values ('$post_new_id','$comment_name','$comment_email','$comment','$status','$date')";
        
        $run_query = mysql_query($query_comment);
        echo "<script>alert('Twoj komentarz bedzie zapisany po akceptacji.')</script>";
        echo "<script>window.open('details.php?post=$post_id'</script>";   
    }
}
?>    

    