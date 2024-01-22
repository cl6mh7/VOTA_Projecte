<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $options = explode(',', $_POST['options']);
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Validar que haya al menos dos opciones
    if (count($options) < 2) {
        echo "Debes proporcionar al menos dos opciones de respuesta.";
        return;
    }

    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'arnau', 'P@ssw0rd1234', 'VOTE');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insertar la pregunta en la tabla de encuestas con valores adicionales vacíos
    $stmt = $conn->prepare("INSERT INTO poll (question, user_id, start_date, end_date, poll_state, question_visibility, results_visibility, poll_link, path_image) 
                            VALUES (?, NULL, ?, ?, NULL, NULL, NULL, NULL, NULL)");
    $stmt->bind_param("sss", $question, $startDate, $endDate);
    $stmt->execute();

    // Obtener el ID de la encuesta que acabamos de insertar
    $pollId = $stmt->insert_id;

    // Cerrar la primera consulta preparada
    $stmt->close();

    // Verificar si hay opciones no vacías antes de insertar en poll_options
    if (!empty(array_filter($options))) {
        // Preparar la consulta para insertar opciones
        $stmt = $conn->prepare("INSERT INTO poll_options (option_text, poll_id, start_date, end_date, path_image) VALUES (?, ?, ?, ?, NULL)");

        foreach ($options as $option) {
            // Para cada opción no vacía, ejecutar la consulta preparada
            if (!empty($option)) {
                $stmt->bind_param("isss", $pollId, $option, $startDate, $endDate);
                $stmt->execute();
            }
        }

        // Cerrar la consulta preparada
        $stmt->close();
    }

    // Cerrar la conexión
    $conn->close();

    echo "Encuesta creada con éxito.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Encuesta</title>
    <!-- Asegúrate de incluir la biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>Crear Encuesta</h2>

<form id="pollForm" method="post" action="create_poll.php">
    <label for="question">Pregunta:</label>
    <input type="text" id="question" name="question" required><br><br>

    <label for="options">Opciones de Respuesta (separadas por comas):</label>
    <input type="text" id="options" name="options" required><br><br>

    <label for="startDate">Fecha de Inicio:</label>
    <input type="date" id="startDate" name="startDate" required><br><br>

    <label for="endDate">Fecha de Finalización:</label>
    <input type="date" id="endDate" name="endDate" required><br><br>

    <button type="submit">Crear Encuesta</button>
</form>

</body>
</html>