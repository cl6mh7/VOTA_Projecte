<?php
session_start(); // Iniciar la sesión
$conn = new mysqli('localhost', 'root', 'Kecuwa53', 'VOTE');

// Verificar la conexión

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow">
        <meta name="keywords" content="votaieti, votación en línea, votación, encuestas, elecciones, privacidad, seguridad">
        <meta name="description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:title" content="Panel de control — Votaieti">
        <meta property="og:description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:image" content="../imgs/votaietilogo.png">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="author" content="Arnau Mestre, Claudia Moyano i Henry Doudo">
        <title>Panel de control —Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
        <link rel="stylesheet" href="styles.css">
        <script src="../styles + scripts/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>

    <body class="bodyDashboard">
        <!-- HEADER -->
        <div class="contenedorHeader">
            <?php include 'header.php'; ?>
        </div>

        <div class="imagenCabecera">
            <h1>VOTAIETI</h1>
            <h2>Listado de preguntas</h2>
        </div>

        <div class="dashboardContenedor">
            
            <div class="circulosDashboard">
            <?php
session_start(); // Iniciar la sesión
$conn = new mysqli('localhost', 'root', 'Kecuwa53', 'VOTE');

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
        $pollStmt = $conn->prepare("SELECT question, start_date, end_date, poll_state FROM poll WHERE user_id = ?");
        $pollStmt->bind_param("s", $userId);
        $pollStmt->execute();
        $pollStmt->bind_result($question, $startDate, $endDate, $pollState);

        // Mostrar las preguntas y el estado de la encuesta
        echo "<h1>Preguntas para el usuario con email: $email</h1>";
        echo "<ul>";
        while ($pollStmt->fetch()) {
            // Mostrar la pregunta y el estado de la encuesta
            echo "<li>$question - Estado: $pollState</li>";
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
        </div>
        <div class="contenedorFooter">
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>