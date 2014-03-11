<?php
session_start();
if (isset($_SESSION['sid'])) 
{
    $sid = $_SESSION['sid'];
    $host='localhost';
    $user='web';
    $password='password01';
    $database='scott';
    $con =  mysqli_connect($host, $user, $password, $database);
    $query = "SELECT username FROM user WHERE sid = '$sid'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $userName = $row['username'];
}
else
{
    header( 'Location: ../login.php' ) ;
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Scott's Forums</title>
    </head>
    <body>
           <?php
                echo "<div><h1>Welcome, $userName</h1></div>";
           ?>
    </body>
</html>
