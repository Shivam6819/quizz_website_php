<?php
include 'db.php';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $message = $_POST['message'];
  mysqli_query($conn, "INSERT INTO suggestions (name, message) VALUES ('$name','$message')");
  echo "<script>alert('Thank you for your suggestion!'); window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Give Us Your Suggestion</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #111;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px yellow;
      width: 400px;
      text-align: center;
    }

    h2 {
      color: yellow;
      margin-bottom: 20px;
    }

    input[type="text"], textarea {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background-color: #222;
      color: #fff;
      font-size: 16px;
    }

    textarea {
      resize: none;
      height: 100px;
    }

    input[type="submit"] {
      background-color: yellow;
      color: black;
      border: none;
      padding: 10px 25px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #ffcc00;
      transform: scale(1.05);
    }

    .back-btn {
      display: inline-block;
      text-align: center;
      margin-top: 15px;
      color: yellow;
      text-decoration: none;
      border: 2px solid yellow;
      padding: 8px 20px;
      border-radius: 5px;
      transition: 0.3s;
    }

    .back-btn:hover {
      background-color: yellow;
      color: black;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>💡 Share Your Suggestion</h2>
    <form method="POST">
      <input type="text" name="name" placeholder="Your Name" required><br>
      <textarea name="message" placeholder="Your Suggestion..." required></textarea><br>
      <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php" class="back-btn">⬅ Back to Home</a>
  </div>
</body>
</html>
