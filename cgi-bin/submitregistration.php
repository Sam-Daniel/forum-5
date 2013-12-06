<?php
$host='localhost';
$user='web';
$password='password01';
$database='scott';
$userName = $_POST["uname"];
$passWord = $_POST["pass1"];
$passWord2 = $_POST["pass2"];
$email = $_POST["email"];
    
if (strcmp($passWord,$passWord2) == 0)
{
    $con =  mysqli_connect($host, $user, $password, $database);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $passWord = hash('sha256', $passWord2);
    $sqlQuery = "INSERT INTO user (username, password, attempts, lastlog, email) VALUES ('$userName','$passWord',0,CURRENT_TIMESTAMP,'$email')";
    if (!mysqli_query($con,$sqlQuery))
    {
        die('Error: ' . mysqli_error($con));
    }
    echo "Account Registration complete!";
    mysqli_close($con);
}
else
{
    echo 'Passwords do not match';
}