<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include("includes/database.php");
?>

<div id="add">
<a href="index.php?insert_class" class="myButton">Dodaj klasę</a>
    <a href="index.php?insert_teacher" class="myButton">Dodaj wychowawcę</a>
</div>

<div>
Lista klas</div>

<div class="CSSTableGenerator">
<table align="center" width="780">

    <tr>
        <td>ID</td>
        <td>Rok</td>
        <td>Litera</td>
        <td>Profil</td>
        <td>Wychowawca</td>
        <td>Edytuj</td>
        <td>Wczytaj plan</td>
        <td>Usuń</td>
    </tr>
    
<?php
    $get_class = "select c.class_id, c.year, c.letter, c.profile, t.name 
    from classes c join teachers t on c.teacher_id=t.id ";
    $run_class = mysql_query($get_class);

while ($row_class = mysql_fetch_array($run_class)){
    $class_id = $row_class['class_id'];
    $class_year = $row_class['year'];
    $class_letter = $row_class['letter'];
    $class_profile = $row_class['profile'];
    $class_teacher = $row_class['name'];
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
</div> 

<div>
Lista wychowawców</div>


<div class="CSSTableGenerator">
<table align="center" width="780">

    <tr>
        <td>ID</td>
        <td>Imię i nazwisko</td>
        <td>Edytuj</td>
        <td>Usuń</td>
    </tr>
    
<?php
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
</div>
    
    