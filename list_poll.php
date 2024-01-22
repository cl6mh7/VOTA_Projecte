<?php
session_start(); // Iniciar la sesión
$conn = new mysqli('localhost', 'root', '', 'VOTE');

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Consulta para obtener el user_id
    $selectStmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $selectStmt->bind_param("s", $email);
    $selectStmt->execute();
    $selectStmt->bind_result($userId);

    // Obtener el resultado
    if ($selectStmt->fetch()) {
        // Cerrar la consulta preparada
        $selectStmt->close();

        // Consulta para recuperar preguntas basadas en el user_id
        $pollStmt = $conn->prepare("SELECT question FROM poll WHERE user_id = ?");
        $pollStmt->bind_param("s", $userId);
        $pollStmt->execute();
        $pollStmt->bind_result($question);

        // Mostrar las preguntas
        echo "<h1>Preguntas para el usuario con email: $email</h1>";
        echo "<ul>";
        while ($pollStmt->fetch()) {
            echo "<li>$question</li>";
        }
        echo "</ul>";

        // Cerrar la consulta preparada
        $pollStmt->close();
    } else {
        echo "No se encontró el user_id para el correo electrónico proporcionado.";
    }
} else {
    echo "La variable de sesión 'email' no está definida.";
}

// Cerrar la conexión
$conn->close();
?>
