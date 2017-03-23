<?php
include('../includes/database.php');
if(isset($_GET['edit_image'])){
    $edit_id = $_GET['edit_image'];
    $select_img = "select * from gallery_photos where mid='$edit_id'";
    $run_query = mysql_query($select_img);
    {
 while ($row_img=mysql_fetch_array($run_query)) {
        $img_id = $row_img['mid'];
        $img_cat = $row_img['cid'];
        $img_desc = $row_img['description'];
     
 }
    }
}
?>

<link rel="stylesheet" href="includes.css" media="all"/>
<div class="CSSTableGenerator" >
<form action="includes/edit_image.php" method="post" enctype="multipart/form-data">
<table width="700" align="center">    
    
<tr>
    <td colspan="2">
        <h1>Edytuj zdjęcie</h1>
    </td>
    </tr> 
    
     <tr>
                    <td>
                            ID:
                    </td>

                    <td>
                            <input type="text" name="mid" value="<?php echo $img_id; ?>"/>
                    </td>
            </tr>  
    
    
            <tr>
                    <td>
                            Galeria:
                    </td>

                    <td>
                            <input type="text" name="cat" value="<?php echo $img_cat; ?>"/>
                    </td>
            </tr>  
    <tr>
                    <td>
    Opis zdjęcia:
                    </td>

                    <td>
    <input type="text" name="desc" value="<?php echo $img_desc; ?>">
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
    $cid=$_POST['cat'];
    $desc=$_POST['desc'];
    $id=$_POST['mid'];
    
    $get_images=
    "update gallery_photos set
    cid='$cid',
    description='$desc'
    where mid='$id'
    ";
    
    $run_images=mysql_query($get_images);
    echo "<script>alert('Zdjęcie zostalo zaktualizowane.')</script>" ;
    echo "<script>window.open('../index.php?view_images=$cid','_self')</script>";
        
    }

?>
