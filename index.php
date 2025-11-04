<?php
session_start();

// Redirect if not logged in
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Website - Home</title>
  <link rel="stylesheet" href="style.css">
 <style>
  /* Global Reset */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #000;
    color: #fff;
    font-family: Arial, sans-serif;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  header {
    background: #111;
    color: yellow;
    padding: 20px;
    text-align: center;
    box-shadow: 0 0 10px yellow;
  }

  nav {
    margin-top: 10px;
  }

  nav a {
    color: yellow;
    text-decoration: none;
    margin: 0 15px;
    font-weight: bold;
  }

  nav a:hover {
    text-decoration: underline;
  }

  .user-info {
    margin-top: 10px;
    font-size: 18px;
    color: #fff;
  }

  /* ✅ Fully Responsive Grid */
  .quiz-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    width: 100%;
    max-width: 1300px;
    margin: 40px auto;
    padding: 0 30px;
  }

  .quiz-card {
    background: #111;
    border: 2px solid yellow;
    border-radius: 12px;
    text-align: center;
    padding: 25px;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px yellow;
  }

  .quiz-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 25px #ffcc00;
  }

  .quiz-card img {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
  }

  .quiz-card h3 {
    color: yellow;
    margin: 15px 0;
    font-size: 20px;
  }

  .btn {
    background-color: yellow;
    color: black;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
    display: inline-block;
  }

  .btn:hover {
    background-color: #ffcc00;
  }

  footer {
    background: #111;
    color: #fff;
    text-align: center;
    padding: 15px;
    border-top: 2px solid yellow;
    margin-top: auto;
  }

  /* ✅ Responsive Fixes for Mobile */
  @media (max-width: 768px) {
    header h1 {
      font-size: 22px;
    }
    .quiz-grid {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 0 15px;
    }
    .quiz-card {
      padding: 20px;
    }
  }

  @media (max-width: 480px) {
    .quiz-grid {
      grid-template-columns: 1fr;
      gap: 15px;
      padding: 0 10px;
    }
  }
</style>


</head>
<body>
  <header>
    <h1>🧠 Welcome to the Ultimate Quiz Zone</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="quiz.php">Quiz</a>
      <a href="suggestion.php">Suggestions</a>
      <a href="logout.php" style="color:red; font-weight:bold;">Logout</a>
    </nav>
    <div class="user-info">
      <span>👋 Welcome, <strong><?php echo htmlspecialchars($username); ?></strong></span>
    </div>
  </header>

  <section class="quiz-grid">
    <div class="quiz-card">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML Logo">
      <h3>HTML</h3>
      <a href="quiz.php?lang=html" class="btn">Start Quiz</a>
    </div>
    <div class="quiz-card">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS Logo">
      <h3>CSS</h3>
      <a href="quiz.php?lang=css" class="btn">Start Quiz</a>
    </div>
    <div class="quiz-card">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JS Logo">
      <h3>JavaScript</h3>
      <a href="quiz.php?lang=js" class="btn">Start Quiz</a>
    </div>
    <div class="quiz-card">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python Logo">
      <h3>Python</h3>
      <a href="quiz.php?lang=python" class="btn">Start Quiz</a>
    </div>
    <div class="quiz-card">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP Logo">
      <h3>PHP</h3>
      <a href="quiz.php?lang=php" class="btn">Start Quiz</a>
    </div>
    <div class="quiz-card">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" alt="C++ Logo">
      <h3>C++</h3>
      <a href="quiz.php?lang=cpp" class="btn">Start Quiz</a>
    </div>
  </section>

  <footer>
    <p>© 2025 Quiz Website | Learn. Play. Master.</p>
  </footer>
</body>
</html>
<!-- shivam verma -->
