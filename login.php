<?php
session_start();
if (isset($_SESSION['sid']))
{
    header( 'Location: php/index.php' ) ;
    die();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Scott's forums</h1>
        <h2>Login</h2>
        <form name="input" action="php\dologin.php" method="post">
        User Name: <input type="text" name="uname"><br>
        Password: <input type="password" name="pwd"><br>
        <input type="submit" value="Submit"><br>
        Not a member? Register <a href="Register.html">here</a>
        </form>
    </body>
</html>
