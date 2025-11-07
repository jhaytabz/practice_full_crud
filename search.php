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
<title>Mobile-Friendly Search Page</title>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background-color: #f8f9fa;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  header {
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 15px 10px;
    font-size: 1.5em;
    font-weight: 600;
  }

  .search-section {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }

  .search-box {
    width: 100%;
    max-width: 500px;
    display: flex;
    align-items: center;
    border-radius: 50px;
    background: white;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    overflow: hidden;
  }

  .search-box input {
    flex: 1;
    padding: 12px 20px;
    border: none;
    outline: none;
    font-size: 1em;
  }

  .search-box button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .search-box button:hover {
    background-color: #0056b3;
  }

  .results {
    margin-top: 30px;
    width: 100%;
    max-width: 500px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    padding: 15px;
  }

  .result-item {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
  }

  .result-item:last-child {
    border-bottom: none;
  }

  .result-item a {
    text-decoration: none;
    color: #007bff;
    font-weight: 500;
  }

  .result-item a:hover {
    text-decoration: underline;
  }

  @media (max-width: 600px) {
    header {
      font-size: 1.3em;
      padding: 12px;
    }

    .search-box {
      flex-direction: column;
      border-radius: 10px;
    }

    .search-box input {
      width: 100%;
      border-radius: 10px 10px 0 0;
    }

    .search-box button {
      width: 100%;
      border-radius: 0 0 10px 10px;
      padding: 12px;
    }
  }
</style>
</head>
<body>

<header>Search Page</header>

<section class="search-section">
  <div class="search-box">
    <input type="text" placeholder="Search something...">
    <button>Search</button>
  </div>

  <div class="results">
    <div class="result-item"><a href="#">Sample Result 1</a></div>
    <div class="result-item"><a href="#">Sample Result 2</a></div>
    <div class="result-item"><a href="#">Sample Result 3</a></div>
  </div>
</section>

</body>
</html>