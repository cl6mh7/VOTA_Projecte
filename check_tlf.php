<?php
// Incluir el archivo de conexión
// Conexión a la base de datos
$db = new mysqli('localhost', 'aws21', 'P@ssw0rd', 'VOTE');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$telephone = $_POST['telephone'];

// Consulta para contar el número de usuarios con el mismo número de teléfono
$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE phone_number = ?");
$stmt->bind_param("s", $telephone);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->fetch_array()[0];

if ($count > 0) {
    echo 'exists';
} else {
    echo 'not exists';
}

// Cerrar la conexión
$db->close();
?>