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
<body><center><br><br><br>
    <h2>Uploading Multiple Images</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" id="" multiple required>
        <input type="submit" name="upload" value="Upload">
    </form>

    </center>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['upload'])){
     foreach($_FILES['images']['tmp_name'] as $key => $tmp_name){
        $file_name = $_FILES['images']['name'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp'];

        if(in_array($file_ext, $allowed)){
          $new_name = uniqid() . '.' . $file_ext;
          $target = "uploads/" . $new_name;
        
        if(move_uploaded_file($file_tmp, $target)){
            $sql = "INSERT INTO images (filename) VALUES ('$new_name')";
            mysqli_query($conn, $sql);
            header("Location: dashboard.php");
            exit();
        }
     }
    }
  }else {
    echo "<p>Images uploaded successfuly</p>";
  }
}


?>
