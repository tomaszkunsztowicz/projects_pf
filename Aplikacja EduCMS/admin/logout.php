<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EduCMS - Wylogowanie</title>
        <link rel="stylesheet" href="login.css" media="all"/>
    </head>
    <body>
        <div class='login'>
        <h1>Wylogowałeś się</h2>
        <a href="login.php">Kliknij aby się zalogować</a>
        </div>
    </body>
</html>
