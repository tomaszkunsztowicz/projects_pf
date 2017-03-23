<div class="poll">
<?php
//nazwa ankiety
include("includes/database.php");
if(isset($_GET['poll_results'])){
    echo "<h1>Wyniki ankiety</h2>";
    $edit_id = $_GET['poll_results'];
    $select_link = "select * from poll_questions where pollid='$edit_id' and visible='Y' order by sort_id ASC";
    $run_query = mysql_query($select_link);
    while ($row=mysql_fetch_array($run_query)) {
    $id = $row['id'];
    $question = $row['question'];
    $votes = $row['votes'];  
        echo "<p><div>Pytanie: $question, </p>
        <p>
        Oddane głosy: $votes</div></p>";
    }
}
?>
    <div id="rmlink"><a href='index.php'>Powrót do strony głównej</a></div>
</div> 