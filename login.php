<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_assoc($result);

  if($row && password_verify($password, $row['password'])){
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
    exit();
  } else {
    $error = "Invalid email or password!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Quiz Website</title>
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

    .login-container {
      background: #111;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px yellow;
      text-align: center;
      width: 350px;
    }

    input[type="email"], input[type="password"] {
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

    .signup-btn {
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

    .signup-btn:hover {
      background-color: yellow;
      color: black;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
      <input type="email" name="email" placeholder="Enter Email" required><br>
      <input type="password" name="password" placeholder="Enter Password" required><br>
      <input type="submit" name="login" value="Login">
    </form>

    <a href="signup.php" class="signup-btn">Sign Up</a>
  </div>

</body>
</html>
