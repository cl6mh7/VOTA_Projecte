<?php
session_start(); // Iniciar la sesión
if(!isset($_SESSION['email'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de error
    header('Location: errores/error403.php');
    exit;
}
// Incluir el archivo de conexión
include 'db_connection.php';

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
    <title>Panel de control — Votaieti</title>
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
    <div class="listPollContainer">
    <?php   
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Consulta para obtener el user_id
        $selectStmt = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
        $selectStmt->execute([$email]);
        $userId = $selectStmt->fetchColumn();
        
        if ($userId) {
            // Consulta para recuperar preguntas basadas en el user_id
            $pollStmt = $pdo->prepare("SELECT question, start_date, end_date, poll_state FROM poll WHERE user_id = ?");
            $pollStmt->execute([$userId]);

            // Mostrar las preguntas y el estado de la encuesta
            echo "<h1>Mis encuestas</h1>";
            echo "<table>";
            echo "<thead><tr><th class='question-column'>Pregunta</th><th class='state-column'>Estado</th></tr></thead>";

            echo "<tbody>";
            while ($row = $pollStmt->fetch(PDO::FETCH_ASSOC)) {
                $question = $row['question'];
                $pollState = $row['poll_state'];

                // Añadir clases CSS basadas en el valor de pollState
                $class = '';
                switch ($pollState) {
                    case 'not_started':
                        $class = 'not-started';
                        break;
                    case 'finished':
                        $class = 'finished';
                        break;
                    case 'active':
                        $class = 'active';
                        break;
                }

                // Mapear los valores de estado a sus correspondientes textos en español
                $stateTexts = array(
                    'not_started' => 'No Iniciada',
                    'finished' => 'Finalizada',
                    'active' => 'Activa',
                );

                // Obtener el texto correspondiente al estado actual
                $stateText = isset($stateTexts[$pollState]) ? $stateTexts[$pollState] : $pollState;

                // Mostrar la pregunta y el estado de la encuesta en una fila de la tabla
                echo "<tr><td>$question</td><td><span class='poll-state $class'>$stateText</span></td></tr>";
            }
            echo "</tbody>";
            echo "</table>";

            // Cerrar la consulta preparada
            $pollStmt->closeCursor();
        } else {
            echo "No se encontró el user_id para el correo electrónico proporcionado.";
        }
    } else {
        echo "La variable de sesión 'email' no está definida.";
    }
    ?>
    </div>
</div>

    <div class="contenedorFooter">
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
