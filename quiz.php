<?php
session_start();
include 'db.php';

if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}

$questions = mysqli_query($conn, "SELECT * FROM questions LIMIT 5");

if(isset($_POST['submit'])){
  $score = 0;
  $i = 1;
  $result = mysqli_query($conn, "SELECT * FROM questions LIMIT 5");
  while($row = mysqli_fetch_assoc($result)){
      $selected = $_POST['ans'.$i] ?? '';
      if($selected == $row['correct_option']){
          $score++;
      }
      $i++;
  }

  echo "
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
    .container {
      background: #111;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px yellow;
      text-align: center;
      width: 400px;
    }
    h3 {
      color: yellow;
    }
    button {
      background-color: yellow;
      color: black;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
      margin-top: 15px;
    }
    button:hover {
      background-color: #ffcc00;
      transform: scale(1.05);
    }
  </style>
  <div class='container'>
    <h3>Your Score: $score / 5</h3>
    <a href='index.php'><button>Back to Home</button></a>
  </div>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz - Ultimate Quiz Zone</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .quiz-container {
      background: #111;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px yellow;
      width: 600px;
      text-align: left;
      position: relative;
    }

    h2 {
      text-align: center;
      color: yellow;
      margin-bottom: 25px;
    }

    p {
      color: #fff;
      margin-bottom: 10px;
      font-weight: bold;
    }

    label {
      display: block;
      margin-left: 10px;
      margin-bottom: 8px;
    }

    input[type="radio"] {
      margin-right: 8px;
      accent-color: yellow;
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
      display: block;
      margin: 20px auto 0;
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

    /* Timer */
    .timer {
      position: absolute;
      top: 15px;
      right: 20px;
      background-color: yellow;
      color: black;
      padding: 8px 15px;
      border-radius: 5px;
      font-weight: bold;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <div class="quiz-container">
    <div class="timer" id="timer">Time Left: 01:00</div>
    <h2>Answer the Following Questions</h2>
    <form method="POST" id="quizForm">
      <?php
      $i = 1;
      while($row = mysqli_fetch_assoc($questions)){
        echo "<p>$i. ".$row['question']."</p>";
        echo "<label><input type='radio' name='ans$i' value='".$row['option1']."' required> ".$row['option1']."</label>";
        echo "<label><input type='radio' name='ans$i' value='".$row['option2']."'> ".$row['option2']."</label>";
        echo "<label><input type='radio' name='ans$i' value='".$row['option3']."'> ".$row['option3']."</label>";
        echo "<label><input type='radio' name='ans$i' value='".$row['option4']."'> ".$row['option4']."</label><br><br>";
        $i++;
      }
      ?>
      <input type="submit" name="submit" value="Submit Quiz">
    </form>
    <a href="index.php" class="back-btn">⬅ Back to Home</a>
  </div>

  <script>
    // Timer (1 minute countdown)
    let timeLeft = 15*60; // seconds
    const timerDisplay = document.getElementById('timer');
    const form = document.getElementById('quizForm');

    const countdown = setInterval(() => {
      let minutes = Math.floor(timeLeft / 60);
      let seconds = timeLeft % 60;
      seconds = seconds < 10 ? '0' + seconds : seconds;
      timerDisplay.textContent = `Time Left: ${minutes}:${seconds}`;
      timeLeft--;

      if (timeLeft < 0) {
        clearInterval(countdown);
        alert("⏰ Time's up! Submitting your quiz...");
        form.submit();
      }
    }, 1000);
  </script>

</body>
</html>
