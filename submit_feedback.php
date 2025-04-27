<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "secret_messages";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['message']) && !empty($_POST['message'])) {
  $message = $_POST['message'];

  $sql = "INSERT INTO feedbacks (message) VALUES (?)";
  $stmt = $conn->prepare($sql);

  if ($stmt === false) {
    echo "error preparing statement: " . $conn->error;
    exit;
  }

  $stmt->bind_param("s", $message);

  if ($stmt->execute()) {
    echo "success";
  } else {
    echo "error executing statement: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "no message received";
}

$conn->close();
?>

