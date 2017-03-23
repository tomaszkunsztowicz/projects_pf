<?php
session_start();
if ($_POST['submit']) {
    mysql_connect("localhost","root","root");
    mysql_select_db("mycms");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $login = "select id, username, password, rights from users where username = '$username' and activated = 'Y'";
    
    $run_login = mysql_query($login);
    while ($row_login = mysql_fetch_array($run_login)){
    $id = $row_login['id'];
    $db_username = $row_login['username'];
    $db_password = $row_login['password'];
    $db_rights = $row_login['rights'];
        
    }
        if($username == $db_username AND
           $password == $db_password) 
        {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['rights'] = $db_rights;
            header('Location: index.php');
        } 
        else
            if($username != $db_username OR
           $password != $db_password) 
        {
        echo "<script>alert('Podaj właściwą nazwę użytkownika i hasło!')</script>"; 
            
    } 
}
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EduCMS - Logowanie do panelu administracyjnego</title>
        <link rel="stylesheet" href="login.css" media="all"/>
    </head>
    <body>
        <div class="login">
        <h1>EduCMS - Zaloguj się do panelu administracyjnego</h2>
        <form method="post" action="login.php">
            <input type="text" name="username" value="nazwa użytkownika"/></br>
            <input type="password" name="password" value="hasło"/></br>
            <input type="submit" name="submit" value="Loguj"/>  
        </form>
    </div>
    </body>
</html>
