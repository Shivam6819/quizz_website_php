<?php
$host = "localhost";
$user = "root";
$pass = "1872003";
$dbname = "quiz_db";
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
?>