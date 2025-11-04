<?php
include_once 'db.php';
$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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
        <input type="text" name="firstname" id=""  value="<?php echo $row['firstname']; ?>"> <br><br>
        Lastname:
        <input type="text" name="lastname" id=""  value="<?php echo $row['lastname']; ?>"> <br><br>
        Age:
        <select name="age" id="" >
                <option value=""></option>
            <option value="11" <?php echo ($row['age'] == "11")? 'selected' : ' '; ?> >11</option>
            <option value="12" <?php echo ($row['age'] == "12")? 'selected' : ' '; ?> >12</option>
            <option value="13" <?php echo ($row['age'] == "13")? 'selected' : ' '; ?> >13</option>
            <option value="14" <?php echo ($row['age'] == "14")? 'selected' : ' '; ?> >14</option>
            <option value="15" <?php echo ($row['age'] == "15")? 'selected' : ' '; ?> >15</option>
            <option value="16" <?php echo ($row['age'] == "16")? 'selected' : ' '; ?> >16</option>
            <option value="17" <?php echo ($row['age'] == "17")? 'selected' : ' '; ?> >17</option>
            <option value="18" <?php echo ($row['age'] == "18")? 'selected' : ' '; ?> >18</option>
            <option value="19" <?php echo ($row['age'] == "19")? 'selected' : ' '; ?> >19</option>
            <option value="20" <?php echo ($row['age'] == "20")? 'selected' : ' '; ?> >20</option>
        </select> <br><br>
        Gender:
        <select name="gender" id="" >
            <option value=""></option>
            <option value="male" <?php echo ($row['gender'] == "male")? 'selected' : ' '; ?>>Male</option>
            <option value="female" <?php echo ($row['gender'] ==  "female")? 'selected' : ' '; ?>>Female</option>
        </select> <br><br>
          Section:
        <select name="section" id="">
             <option value=""></option>
             <option value="alpha" <?php echo ($row['section'] == "alpha"  )? 'selected' : ''; ?> >ALPHA</option>
             <option value="beta" <?php echo ($row['section'] == "beta"  )? 'selected' : ''; ?> >BETA</option>
             <option value="charlie" <?php echo ($row['section'] ==  "charlie")? 'selected' : ''; ?> >CHARLIE</option>
             <option value="delta" <?php echo ($row['section'] == "delta"  )? 'selected' : ''; ?> >DELTA</option>
             <option value="falcon" <?php echo ($row['section'] ==  "falcon"  )? 'selected' : ''; ?> >FALCON</option>
             <option value="gamma" <?php echo ($row['section'] == "gamma"  )? 'selected' : ''; ?> >GAMMA</option>
        </select> <br><br>
        <input type="submit" name="submit" value="Update">
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

        $sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', age = '$age'
        , gender = '$gender', section = '$section'
         WHERE id = '$id'";
        if(mysqli_query($conn, $sql)){
            echo "successfully inserted";
            header("Location: dashboard.php");
            exit();
        }else {
            echo "theres an error updating this data";
        }
    }else {
        echo "sorry theres an error";
    }
}




?>