<?php
session_start();
include_once 'db.php';
$conn = connection();


if(!isset($_SESSION['datauser'])){
    echo "Welcome Guest";
}else {
    echo "Welcome " . $_SESSION['datauser'];
}




$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


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
                <?php do {  ?>
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
                 <td> <?php echo $row['firstname']; ?>  </td>
                 <td> <?php echo $row['lastname']; ?>  </td>
                 <td> <?php echo $row['age']; ?>  </td>
                 <td> <?php echo $row['gender']; ?>  </td>
                 <td> <?php echo $row['section']; ?>  </td>
                 </tr>
               <?php }while ($row = mysqli_fetch_assoc($result)) ; ?>  
            </tbody>
        </table>
        
    </center>
</body>
</html>