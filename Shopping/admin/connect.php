<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "db_cart";

$con = mysqli_connect($servername,$username,$pass,$db);

if($con)
{
    // echo "connected congo!";
}
else
{
    echo "opps not connected";
}




?>