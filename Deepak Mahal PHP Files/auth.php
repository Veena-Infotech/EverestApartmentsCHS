<?php

session_start();

if (isset($_SESSION['name'])) {
  header('location: ./home.php');
  exit;
}

if (!isset($_POST['submit'])) {
  header('location: ./index.php');
  exit;
}

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'users');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Prepared statement to prevent SQL injection and syntax errors
$query = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$query->bind_param("ss", $username, $password);  // "ss" indicates two string parameters

// Execute the query
$query->execute();
$result = $query->get_result();
$users_num = $result->num_rows;

if ($users_num < 1) {
  $_SESSION['login_failed'] = true;
  header('location: ./index.php');
  exit;
}

// Fetch the user data
$user = $result->fetch_assoc();
$_SESSION['name'] = $user['name'];

// Redirect to home page
header('location: ./home.php');
exit;

?>
