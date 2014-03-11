<?php
    $host='localhost';
    $user='web';
    $password='password01';
    $database='scott';
    $con =  mysqli_connect($host, $user, $password, $database);
    $loginUser = $_POST["uname"];
    $pass = $_POST["pwd"];
    $query = "SELECT password FROM user WHERE username = '$loginUser' LIMIT 1";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $savedHash = $row['password'];

if (strcmp(hash('sha256', $pass), $savedHash) == 0)
{
    echo "login success!<br>";
    session_start();
    $now = new DateTime();
    $_SESSION['sid'] = hash('sha256', $now->getTimestamp());
    $sidHash =  $_SESSION['sid'];
    $sqlQuery = "UPDATE user SET sid = '$sidHash'  WHERE username = '$loginUser'";
    if (!mysqli_query($con,$sqlQuery))
    {
        die('Error: ' . mysqli_error($con));
    }
    echo "<a href='/forum/php/index.php'>Go to forum</a>";
}
else
{
    echo "Bad username/password <br>";
    echo "<a href='/forum/login.html'>Try Again</a>";
}

mysqli_close($con);


