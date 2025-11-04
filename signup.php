<?php
include 'db.php';

if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Signup Successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - Quiz Website</title>
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
    }

    .signup-container {
      background: #111;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px yellow;
      text-align: center;
      width: 350px;
    }

    input[type="text"], input[type="email"], input[type="password"] {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: yellow;
      color: black;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #ffcc00;
      transform: scale(1.05);
    }

    .login-btn {
      display: inline-block;
      background-color: black;
      color: yellow;
      border: 2px solid yellow;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 15px;
      font-weight: bold;
      transition: 0.3s;
    }

    .login-btn:hover {
      background-color: yellow;
      color: black;
    }
  </style>
</head>
<body>

  <div class="signup-container">
    <h2>Sign Up</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Enter Username" required><br>
      <input type="email" name="email" placeholder="Enter Email" required><br>
      <input type="password" name="password" placeholder="Enter Password" required><br>
      <input type="submit" name="signup" value="Sign Up">
    </form>

    <a href="login.php" class="login-btn">Back to Login</a>
  </div>

</body>
</html>
