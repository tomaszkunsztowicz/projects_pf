<link rel="stylesheet" href="includes.css" media="all"/>
<?php
include('../includes/database.php');
if(isset($_GET['upload_plan'])){
    $edit_id = $_GET['upload_plan'];
    $select_class = "select * from classes where class_id='$edit_id'";
    $run_query = mysql_query($select_class);
    {
 while ($row_img=mysql_fetch_array($run_query)) {
        $class_id = $row_img['class_id'];

    }
    }
}
?>
<div class="CSSTableGenerator" >
<form action="includes/upload_plan.php" method="post" enctype="multipart/form-data">
    <table>
     <tr>
            <td colspan="2"><h1>Wczytaj plan:</h1></td>
			</tr>  
           
            <tr>
                <td>Wybierz plik:</td>
            <td>
            <input type="file" name="file_upload" />
    </td>
                
    </tr>
        <tr>
            <td>ID klasy:</td>
            <td>
            <input type="text" name="class_id" value="<?php echo $class_id; ?>"/>
    </td>
    </tr>
    <tr>
            <td colspan="2">
            <input type="submit" name="submit" value="Zatwierdź" />
                </td>
    </tr>
    </table>
</div>
</form>


<?php 
if (isset($_POST['submit']))
{
    $name=basename($_FILES['file_upload']['name']);
    $t_name=$_FILES['file_upload']['tmp_name'];
    $dir='upload';
    $class_id=$_POST['class_id'];
    if(move_uploaded_file($t_name,$dir."/".$name))
    {
        //sprawdzenie dodac 
        $get_images="insert into plans (class_id, path) values ('$class_id','admin/includes/upload/$name')";
        $run_images=mysql_query($get_images);
        echo "<script>alert('Plan zostal dodany.')</script>" ;
		echo "<script>window.open('../index.php?view_classes','_self')</script>";
    }
}
?>
