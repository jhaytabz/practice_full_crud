<?php

function connection(){
$host = "localhost";
$user = "root";
$pass = "";
$database = "full_crud";

$conn = mysqli_connect($host, $user, $pass, $database);

if(!$conn){
    die("Connection Failed" . mysqli_connect_errno());
}else {
    return $conn;
}
}



?>