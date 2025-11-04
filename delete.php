<?php
session_start();
include_once 'db.php';
$conn = connection();

  

  if($_SERVER['REQUEST_METHOD'] == "POST"){
   if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM students WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
   
   echo header("Location: dashboard.php");
    exit();
}
  }




?>