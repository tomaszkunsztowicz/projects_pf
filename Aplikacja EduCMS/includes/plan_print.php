<link rel="stylesheet" href="styles/print_plan.css" media="all"/>
<?php
 {
     include("includes/database.php");
		
    $class_id = $_GET['plan_print'];

    require_once 'includes/excel/reader.php';  
		$get_c = 
        "select c.class_id,
        c.teacher_id,
        c.year,
        c.letter,
        c.profile,
        t.id,
        t.name
        from 
        classes c, 
        teachers t
        where 
        c.class_id='$class_id' and c.teacher_id=t.id";
    
		$run_c = mysql_query($get_c);
		while ($row_c = mysql_fetch_array($run_c))      
        {  
        $class_id = $row_c['class_id'];
		$teacher_id = $row_c['teacher_id'];
		$year = $row_c['year'];
		$letter = $row_c['letter'];
		$profile = $row_c['profile'];
        $teacher_name = $row_c['name'];
        echo "<h2>Klasa: $year $letter
        </br> 
        Profil: $profile </br>
        </h2>";    
        }

    $get_classes = 
        "select 
        *
        from plans
        where
        class_id='$class_id'";
        $run_classes = mysql_query($get_classes);
		while ($row_classes = mysql_fetch_array($run_classes))     
        {
        $path = $row_classes['path'];
            
        $xls = new Spreadsheet_Excel_Reader();
        $xls->setOutputEncoding('UTF-8');
        $xls->read($path);
        }
echo "<h2>Poniedziałek</h2>";
echo "<div class='PrintPlan'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[0]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[0]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[0]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Wtorek</h2>";
echo "<div class='PrintPlan'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[1]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[1]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[1]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Środa</h2>";
echo "<div class='PrintPlan'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[2]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[2]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[2]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Czwartek</h2>";
echo "<div class='PrintPlan'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[3]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[3]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[3]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
echo "<h2>Piątek</h2>";
echo "<div class='PrintPlan'>";
echo "<table>";
for ($i = 1; $i <= $xls->sheets[4]['numRows']; $i++) 
{
    echo '<tr>';
    for ($j = 1; $j <= $xls->sheets[4]['numCols']; $j++) {
        echo '<td>'.$xls->sheets[4]['cells'][$i][$j].'</td>'; 
    }
    echo '</tr>';
   
}  
        echo "</table>";
        echo "</div>";
    
        }
?>