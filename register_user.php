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
      <center>
  Register Form: <br><br>
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
       Username: 
       <input type="text" name="username" id="" required><br></br>
        Password: 
       <input type="password" name="password" id="" required><br></br>
        Confirm Password: 
       <input type="password" name="confirm" id="" required><br></br>
       <input type="submit" name="submit" value="Register"> <br><br>
       Already had a account ? 
       <a href="login.php">Login</a>

  </form>

      </center>
</body>
</html>

<?php
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm = mysqli_real_escape_string($conn, $_POST['confirm']);

        if($password == $confirm){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username , password) VALUES ('$username', '$hash')";
            if(mysqli_query($conn, $sql)){
                echo "Successfully Inserted";
                header("Location: login.php");
                exit();
            }else {
                echo "Sorry Theres an error";
            }

        }else {
            echo "Password mismatch";
        }
    }else {
        echo "Theres an error Please try again Later";
    }
 }



?>