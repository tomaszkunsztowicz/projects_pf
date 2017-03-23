     <div class="poll">  
         
<?php
//nazwa ankiety
include("includes/database.php");
if(isset($_GET['poll'])){
    $edit_id = $_GET['poll'];
    $select_link = "select * from polls where id='$edit_id'";
    $run_query = mysql_query($select_link);
    while ($row=mysql_fetch_array($run_query)) {
    $id = $row['id'];
    $title = $row['title'];
    echo "<h1 style='float: left; padding:20px'>$title</h1>";
    }
}
?>
         <img src="images/poll.jpg" height="25%" width="25%" style="float: right; padding:10px"/>
            <table>
                <form action="" method="POST">
         <?php
//formularz
            $questions = "SELECT * FROM poll_questions WHERE pollid='$id' and visible='Y' order by sort_id ASC";
            $run_query = mysql_query($questions);
            while($row_q = mysql_fetch_array($run_query)) {
                $question = $row_q['question'];
                $votes = $row_q['votes'];
                $newvote = $votes + 1;
                echo "<tr><td>$question</td><td>
                <input type='radio' name='polloption' value='$question'</td><td></tr>";    
            }
            ?>
                <tr><td></td></tr>
                <tr><td><input type="submit" name="vote" value="Głosuj"/></td></tr>
                </form>  
            </table>         
        </div>


 <?php
 if(isset($_POST['vote'])) 
                    {
                $polloption = $_POST['polloption'];
                if ($polloption == ""){
     
                    } else {
                    
                    $update_poll = "update poll_questions 
                    set 
                    votes = '$newvote'
                    where 
                    pollid='$id' and 
                    question='$polloption'";
                    $run_update = mysql_query($update_poll);
                    echo "<script>alert('Dziękujemy za głos!')</script>";
		            echo "<script>window.open('index.php?poll_results=$id','_self')</script>";
                }
             }
                  
?>