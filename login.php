<?php
session_start();
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
    <a href="dashboard.php">Dashboard</a><br><br>
      <center>
  Login Form: <br><br>
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
       Username: 
       <input type="text" name="username" id="" required><br></br>
        Password: 
       <input type="password" name="password" id="" required><br></br>
 
       <input type="submit" name="submit" value="Login"> <br><br>
       Don't Have a account ? 
       <a href="register_user.php">Register</a>

  </form>

      </center>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];
         
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            $user = mysqli_fetch_assoc($result);

            if(password_verify($password, $user['password'])){
                $_SESSION['datauser'] = $user['username'];
                $_SESSION['dataaccess'] = $user['access'];
                echo "Successfully Login";
                header("Location: dashboard.php");
                exit();
            }else {
                echo "SOrry credential is not valid";
            }
        }else {
            echo "account already exist";
        }     
    }else {
        echo "Sorry theres an error";
    }
}


?>