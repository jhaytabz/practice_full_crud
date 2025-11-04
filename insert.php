<?php
include_once 'db.php';
$conn = connection();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <br><br><br>
    Go to:
    <a href="dashboard.php">Dashboard</a>
     <center>
        ADD Student FORM <br><br>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        Firstname:
        <input type="text" name="firstname" id="" required> <br><br>
        Lastname:
        <input type="text" name="lastname" id="" required> <br><br>
        Age:
        <select name="age" id="" required>
                <option value=""></option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
        </select> <br><br>
        Gender:
        <select name="gender" id="" required>
            <option value=""></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select> <br><br>
          Section:
        <select name="section" id="" required>
             <option value=""></option>
             <option value="alpha">ALPHA</option>
             <option value="beta">BETA</option>
             <option value="charlie">CHARLIE</option>
             <option value="delta">DELTA</option>
             <option value="falcon">FALCON</option>
             <option value="gamma">GAMMA</option>
        </select> <br><br>
        <input type="submit" name="submit" value="Add">
        </form>
           
     </center>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    $sql = "INSERT INTO students (firstname, lastname, age, gender,section) 
    VALUES ('$firstname','$lastname','$age','$gender','$section')";

    if(mysqli_query($conn, $sql)){
        echo "Successfully inserted the data";
        header("Location: dashboard.php");
        exit();
    }else {
        echo "Sorry theres an error";
    }
   
    }else {
        echo "There a problem while inserting the data";
    }
}




?>