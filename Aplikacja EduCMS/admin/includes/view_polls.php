<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_poll" class="myButton">Dodaj ankietę</a></div>
<?php
include("includes/database.php"); ?>

<div class="CSSTableGenerator"> 
<table align="center" width="780">

    <tr>
        <td>ID</td>
        <td>Nazwa</td>
        <td>Widoczna</td>
        <td>Zarządzaj pytaniami</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr>
    
<?php
    $get_polls = "select * from polls";
    $run_polls = mysql_query($get_polls);

while ($row_polls = mysql_fetch_array($run_polls)){
    $id = $row_polls['id'];
    $name = $row_polls['title'];
    $visible = $row_polls['visible'];
 ?>   
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $visible; ?></td>
        <td><a href="index.php?view_questions=<?php echo $id; ?>" class="myButton">Zarządzaj pytaniami</a></td>    
        <td><a href="index.php?edit_poll=<?php echo $id; ?>" class="myButton">Edytuj</a></td>          
        <td><a href="includes/delete_poll.php?delete_poll=<?php echo $id; ?>" class="myButton">Usuń</a></td>    
    </tr>
    <?php } ?>
    
</table>
</div>