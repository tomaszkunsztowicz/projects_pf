<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style type="text/css">
    th,td,tr,table {padding:0; margin:0;}
    th {border-left:2px solid #333;}
    h2 {padding:10px;}
</style>
</head>

<body>
    
<div>
<a href="index.php?insert_teacher">Dodaj wychowawcę</a>
</div>
    
<table align="center" width="780">

    <tr>
        <td colspan="8" align="center" bgcolor="#0099CC"><h2>Lista wychowawców</h2></td>
    </tr>
    
    <tr>
        <th>ID</th>
        <th>Imię i nazwisko</th>
    </tr>
    
<?php
include("includes/database.php");
    $get_teacher = "select * from teachers";
    $run_teacher = mysql_query($get_teacher);

while ($row_teacher = mysql_fetch_array($run_teacher)){
    $id = $row_teacher['id'];
    $name = $row_teacher['name'];
 ?>   
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
            
<td><a href="index.php?edit_teacher=<?php echo $id; ?>" class="myButton">Edytuj</a></td>          
<td><a href="includes/delete_teacher.php?delete_teacher=<?php echo $id; ?>" class="myButton">Usuń</a></td>    
    </tr>
    <?php } ?>
    
</table>
</body>