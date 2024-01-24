
<?php
$conn = new mysqli('localhost', 'root', 'P@ssw0rd', 'VOTE');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$telephone = $_POST['telephone'];

$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE phone_number = ?");
$stmt->bind_param("s", $telephone);
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