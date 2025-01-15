<?php

$host = "localhost";
$username = "root";
$password = "";
$mydb = "rewardpoint";

//create connec
$conn = mysqli_connect($host,$username,$password,$mydb);

//check connec
if ($conn->connect_error){
    die("connection failed:" .$conn->connect_error);
}
    







?>