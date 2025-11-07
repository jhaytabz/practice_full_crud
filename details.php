<?php
session_start();
include_once 'db.php';
$conn = connection();

$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive 3 Div Layout with Header</title>
<link rel="stylesheet" href="styles.css">
<style>
    .gallery { display: flex; flex-wrap: wrap; gap: 20px; }
.card {
    border: 1px solid #ddd; padding: 10px; border-radius: 10px;
    text-align: center; width: 180px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}
.card img { width: 100%; height: 200px; object-fit: cover; border-radius: 5px; }
</style>
</head>
<body>

<header>
  Fashion Gear Laptop Repair
</header>

<div class="container">
  <div class="left">
    <h3>Go Back to</h3> <br><br>
    <a class="btn" href="">Dashboard</a> <br><br><br>
    <a class="btn" href="">Login</a> <br><br><br>
    <a class="btn" href="">Register</a> <br><br><br>
  </div>
  <div class="middle">
    <h3>Repair Details</h3>
        <p>Name: Anna Cabilan</p>
        <p>Unit: CP </p>
        <p>Problem: Green Line</p>
        <p>Brand: Samsung</p>
        <p>Model: S20 FE</p>
        <p>Diagnostic:  Replace Oled LCD With Frame</p>
        <p>Date: Receive unit Jan 20 2025</p>
        <p>Warranty: Start Warranty Jan 20 2025</p>
        <p>Warranty: End of Warranty March 20 2025</p>
     
  </div>
  <div class="right">
    <h3>Display images</h3>
    <p>This section can contain extra images and details</p>
    <div class="gallery">
    <?php do {  ?>
       <?php echo "<div class='card'>
       
       <img src='uploads/{$row['filename']}' alt=''>
       </div>"
       
       ; ?>
            
    
      <?php } while ($row = mysqli_fetch_assoc($result)); ?>
      </div>
  </div>
</div>

</body>
</html>