<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $numOptions = $_POST['numOptions'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'arnau', 'P@ssw0rd1234', 'VOTE');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insertar la pregunta en la tabla de encuestas
    $stmt = $conn->prepare("INSERT INTO poll (question, user_id, start_date, end_date, poll_state, question_visibility, results_visibility, poll_link, path_image) 
                            VALUES (?, NULL, ?, ?, NULL, NULL, NULL, NULL, NULL)");
    $stmt->bind_param("sss", $question, $startDate, $endDate);
    $stmt->execute();

    // Obtener el ID de la encuesta que acabamos de insertar
    $pollId = $stmt->insert_id;

    // Cerrar la primera consulta preparada
    $stmt->close();

    // Preparar la consulta para insertar opciones
    // Preparar la consulta para insertar opciones
    $stmt = $conn->prepare("INSERT INTO poll_options (poll_id, option_text, start_date, end_date, path_image) VALUES (?, ?, ?, ?, NULL)");

    for ($i = 1; $i <= $numOptions; $i++) {
        $option = $_POST["option$i"];
        if (!empty($option)) {
            $stmt->bind_param("isss", $pollId, $option, $startDate, $endDate);
            $stmt->execute();
        }
    }

    // Cerrar la consulta preparada
    $stmt->close();

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

    <label for="numOptions">Número de opciones:</label>
    <select id="numOptions" name="numOptions">
        <?php for($i=1; $i<=100; $i++) echo "<option value='$i'>$i</option>"; ?>
    </select><br><br>

    <div id="optionInputs"></div>

    <label for="startDate">Fecha de Inicio:</label>
    <input type="date" id="startDate" name="startDate" required><br><br>

    <label for="endDate">Fecha de Finalización:</label>
    <input type="date" id="endDate" name="endDate" required><br><br>

    <button type="submit">Crear Encuesta</button>
</form>

<script>
$(document).ready(function() {
    $('#numOptions').change(function() {
        var numOptions = $(this).val();
        $('#optionInputs').empty();
        for(var i=1; i<=numOptions; i++) {
            $('#optionInputs').append('<label for="option'+i+'">Opción '+i+':</label><input type="text" id="option'+i+'" name="option'+i+'" required><br><br>');
        }
    });
});
</script>

</body>
</html>