<?php
// Incluir el archivo de conexión
include 'db_connection.php';

$telephone = $_POST['telephone'];

// Consulta para contar el número de usuarios con el mismo número de teléfono
$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE phone_number = ?");
$stmt->execute([$telephone]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    echo 'exists';
} else {
    echo 'not exists';
}

// Cerrar la conexión
$pdo = null;
?>