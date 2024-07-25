<?php


$servername = "localhost";
$username = "root";
$password = 'vikas9652021978';
$database = "gmrit";
$con = mysqli_connect($servername,$username,$password,$database);

if(!$con)
{
    die(mysqli_error($con));
}
else{
    // echo "connected";
}


?>