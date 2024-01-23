<?php
$conn = new mysqli('localhost', 'root', 'root', 'VOTE');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

if ($count > 0) {
    echo 'exists';
} else {
    echo 'not exists';
}

$stmt->close();
$conn->close();


?>
