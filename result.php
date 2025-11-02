<?php
session_start();
include_once 'db.php';
$conn = connection();


if(!isset($_SESSION['datauser'])){
    echo "Welcome Guest";
}else {
    echo "Welcome Admin " . $_SESSION['datauser'];
}




$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if(isset($_GET['search'])){
    
$search = "";
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM students WHERE gender = '%$search%' 
    OR section = '%$search%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
       while($datarow = mysqli_fetch_assoc($result)){
        echo $datarow['gender'];
        echo $datarow['section'];
    }
    }else{
        echo "no result found";
    }
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is the dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body><br><br><br>

   <?php if(isset($_SESSION['dataaccess']) && $_SESSION['dataaccess'] == 'admin') { ?>
    <a href="insert.php">Add Student</a> <br><br>
    <?php }  ?>
    <?php if(isset($_SESSION['datauser'])) {  ?>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
     <a href="login.php">Login</a>
     <?php  } ?>
   
    <center>
      <br><br>
      Search:
      <form action="result.php" method="get">
      <input type="text" name="search" placeholder="Search....."> <br><br>
      <button type="submit" name="submit">Search</button>
      </form>
        <h1>Student Enrollment System</h1>
<br><br>
        <table>
            <thead>
              <tr>
       
                <th>action</th>


                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Section</th>
              </tr>
            </thead>
            <tbody>
              
                 
                <tr>

                 <?php if(isset($_SESSION['dataaccess']) && $_SESSION['dataaccess'] == 'admin'){ ?>
                 <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

                 <form action="delete.php" method="post">
                 <button type="submit" name="submit">Delete</button>
                 <input type="hidden" name="id" id="" value="<?php echo $row['id']; ?>">
                 </form>
                </td>
                    
                    <?php } else {  ?>
                        <td>
                            <a href="details.php">View</a>
                        </td>
                        <?php } ?>
                 <td> <?php  ?>  </td>
                 <td> <?php  ?>  </td>
                 <td> <?php  ?>  </td>
                 <td> <?php ?>  </td>
                 <td> <?php  ?>  </td>
                 </tr>
         
              
            </tbody>
        </table> <br><br>
        
    </center>
</body>
</html>