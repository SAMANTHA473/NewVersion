<?php
$servername = "localhost";
$username = "root";
$password = "password"; // default sa local
$dbname = "secret_messages"; // gawa ka muna ng ganitong DB sa Workbench

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$message = $_POST['message'];

$sql = "INSERT INTO feedbacks (message) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $message);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "error";
}

$stmt->close();
$conn->close();
?>
