<link rel="stylesheet" href="includes.css" media="all"/>
<div id="add">
<a href="index.php?insert_user" class="myButton">Dodaj użytkownika</a></div>
<?php
include("includes/database.php"); ?>

<div class="CSSTableGenerator"> 
<table align="center" width="780">

    <tr>
        <td>ID</td>
        <td>Nazwa</td>
        <td>Hasło</td>
        <td>Aktywny</td>
        <td>Uprawnienia</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr>
    
<?php
    $get_user = "select * from users";
    $run_user = mysql_query($get_user);

while ($row_user = mysql_fetch_array($run_user)){
    $id = $row_user['id'];
    $name = $row_user['username'];
    $password = $row_user['password'];
    $activated = $row_user['activated'];
    $rights = $row_user['rights'];
 ?>   
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $password; ?></td>
        <td><?php echo $activated; ?></td>
        <td><?php echo $rights; ?></td>
            
<td><a href="index.php?edit_user=<?php echo $id; ?>" class="myButton">Edytuj</a></td>          
<td><a href="includes/delete_user.php?delete_user=<?php echo $id; ?>" class="myButton">Usuń</a></td>    
    </tr>
    <?php } ?>
    
</table>
</div>