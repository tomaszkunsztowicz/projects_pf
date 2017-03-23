<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_author" class="myButton">Dodaj autora</a></div>
<?php
include("includes/database.php"); ?>

<div class="CSSTableGenerator"> 
<table align="center" width="780">

    <tr>
        <td>ID</td>
        <td>Imię i nazwisko</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr>
    
<?php
    $get_author = "select * from authors";
    $run_author = mysql_query($get_author);

while ($row_author = mysql_fetch_array($run_author)){
    $id = $row_author['id'];
    $name = $row_author['name'];
 ?>   
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
            
<td><a href="index.php?edit_author=<?php echo $id; ?>" class="myButton">Edytuj</a></td>          
<td><a href="includes/delete_author.php?delete_author=<?php echo $id; ?>" class="myButton">Usuń</a></td>    
    </tr>
    <?php } ?>
    
</table>
</div>