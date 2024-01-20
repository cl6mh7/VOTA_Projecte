<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
        <link rel="stylesheet" href="../styles + scripts/styles.css">
        <script src="../styles + scripts/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $question = $_POST['question'];
                $options = explode(',', $_POST['options']);
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];

                if (count($options) < 2) {
                    echo "Debes proporcionar al menos dos opciones.";
                    return;
                }

                $conn = new mysqli('localhost', 'arnau', 'P@ssw0rd1234', 'VOTE');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("INSERT INTO poll (question, user_id, start_date, end_date, poll_state, question_visibility, results_visibility, poll_link, path_image) 
                                        VALUES (?, NULL, ?, ?, NULL, NULL, NULL, NULL, NULL)");
                $stmt->bind_param("sss", $question, $startDate, $endDate);
                $stmt->execute();
                $pollId = $stmt->insert_id;
                $stmt->close();

                if (!empty(array_filter($options))) {
                    $stmt = $conn->prepare("INSERT INTO poll_options (option_text, poll_id, start_date, end_date, path_image) VALUES (?, ?, ?, ?, NULL)");

                    foreach ($options as $option) {
                        if (!empty($option)) {
                            $stmt->bind_param("isss", $pollId, $option, $startDate, $endDate);
                            $stmt->execute();
                        }}
                    $stmt->close();
                }

                $conn->close();
                echo "¡Encuesta creada con éxito!";
            }
        ?>
        <h3>Crear encuesta</h3>

        <form id="pollForm" method="post" action="create_poll.php">
            <label for="question">Pregunta:</label>
            <input type="text" id="question" name="question" required><br><br>

            <label for="options">Respuestas (sepárala por comas):</label>
            <input type="text" id="options" name="options" required><br><br>

            <label for="startDate">Fecha de inicio:</label>
            <input type="date" id="startDate" name="startDate" required><br><br>

            <label for="endDate">Fecha de finalización:</label>
            <input type="date" id="endDate" name="endDate" required><br><br>

            <button type="submit">Crear</button>
        </form>
    </body>
</html>