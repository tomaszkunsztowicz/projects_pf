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
<a href="index.php?insert_gallery">Dodaj klasę</a>
</div>
    
<table align="center" width="780">

    <tr>
        <td colspan="8" align="center" bgcolor="#0099CC"><h2>Lista klas</h2></td>
    </tr>
    
    <tr>
        <th>ID</th>
        <th>Rok</th>
        <th>Litera</th>
        <th>Wychowawca</th>
    </tr>
    
<?php
include("includes/database.php");
    $get_class = "select * from classes";
    $run_class = mysql_query($get_class);
while ($row_class = mysql_fetch_array($run_class)){
    $class_id = $row_gals['class_id'];
    $class_year = $row_gals['year'];
    $class_letter = $row_gals['letter'];
    $class_profile = $row_gals['profile'];
    $class_teacher = $row_gals['teacher_id'];
 ?>   
    
        <tr>
        <td><?php echo $class_id; ?></td>
        <td><?php echo $class_year; ?></td>
        <td><?php echo $class_letter; ?></td>
        <td><?php echo $class_profile; ?></td>
        <td><?php echo $class_teacher; ?></td>
            
<td><a href="index.php?edit_class=<?php echo $class_id; ?>" class="myButton">Edytuj</a></td>
<td><a href="index.php?upload_plan=<?php echo $class_id; ?>" class="myButton">Wczytaj plan</a></td>           
<td><a href="includes/delete_class.php?delete_class=<?php echo $class_id; ?>" class="myButton">Usuń</a></td>    
    </tr>
    <?php } ?>
</table>
</body>