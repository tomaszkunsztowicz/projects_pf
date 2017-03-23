<link rel="stylesheet" href="includes.css" media="all"/>

<?php
include("includes/database.php");?>
<?php 
if(isset($_GET['view_questions']))
{
$poll_id = $_GET['view_questions'];
}
?>
<div id="add">
<a href="index.php?insert_question=<?php echo $poll_id; ?>" class="myButton">Dodaj pytanie</a>
<a href="index.php?view_polls" class="myButton">Powrót do listy ankiet</a>
</div>

<div class="CSSTableGenerator">
<table align="center" width="780">
    <tr>
        <td>ID</td>
        <td>Sort ID</td>
        <td>Pytanie</td>
        <td>Liczba głosów</td>
        <td>Widoczne</td>
        <td>Edytuj</td>
        <td>Usuń</td>   
    </tr>
    
<?php
if(isset($_GET['view_questions'])){
    $edit_id = $_GET['view_questions'];
    $select_questions = "select * from poll_questions where pollid='$poll_id'";
    $run_query = mysql_query($select_questions);
    {
 while ($row_question=mysql_fetch_array($run_query)) {
        $question_id = $row_question['id'];
        $question_sid = $row_question['sort_id'];
        $poll_id = $row_question['pollid'];
        $question_content = $row_question['question'];
        $question_vis = $row_question['visible'];
        $question_votes = $row_question['votes'];
   ?>
        <tr>
        <td><?php echo $question_id; ?></td>
        <td><?php echo $question_sid; ?></td>   
        <td><?php echo $question_content; ?></td>
        <td><?php echo $question_votes; ?></td>
        <td><?php echo $question_vis; ?></td>
        <td><a href="index.php?edit_question=<?php echo $question_id; ?>" class="myButton">Edytuj</a></td>          
        <td><a href="includes/delete_question.php?delete_question=<?php echo $question_id; ?>" class="myButton">Usuń</a></td>    
       
            
            
<?php   } } } ?>
            
    </table>
</div>
