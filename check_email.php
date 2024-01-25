<?php
// Incluir el archivo de conexión
include 'db_connection.php';

$email = $_POST['email'];

// Consulta para contar el número de usuarios con el mismo correo electrónico
$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
$stmt->execute([$email]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    echo 'exists';
} else {
    echo 'not exists';
}

// Cerrar la conexión
$pdo = null;
?>