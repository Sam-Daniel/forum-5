<?php
$host='localhost';
$user='web';
$password='password01';
$database='scott';
$con =  mysqli_connect($host, $user, $password, $database);
$loginUser = $_POST["uname"];
$pass = $_POST["pwd"];
$query = "select password from user where username = '$loginUser' LIMIT 1";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$savedHash = $row['password'];

if (strcmp(hash('sha256', $pass), $savedHash) == 0)
{
    echo "login success!";
}
else
{
    echo "fuck off!";
}

mysqli_close($con);


