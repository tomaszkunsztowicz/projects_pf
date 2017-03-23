<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Liceum Ogólnokształcące - strona naszej szkoły</title>
<script type="text/javascript" src="js/date_time.js"></script>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
</html>
<body>
<div class="container">
<!--menu górne-->
   
<div>
<?php include("includes/menu_top.php"); ?>       
</div>  
<div class="head">
<!-- skrypt wyswietlajacy date i czas-->
<div id="date_time">
<script type="text/javascript">window.onload = date_time('date_time');</script> 
</div>
<div id='logo'>
III Liceum Ogólnokształcące im. Kazimierza Górskiego w Koszalinie  
</div>
<div id='adres'>
ul. Leśmianowa 14, 75-035 Koszalin  
</div>
<div id='image'>
    <img src="images/budynek.jpg" alt="Szkoła" width='100%'>
    </div>
    
<!--wyswietlanie kategorii -->
<?php include("includes/navbar.php"); ?>
    
</div>
<?php include("includes/post_content.php"); ?>
<!--sidebar--> 
<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
   

	
	
	
    
 