<?php
    // Conexión a la base de datos
    $db = new mysqli('localhost', 'root', 'P@ssw0rd', 'VOTE');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Obtener el correo electrónico del POST request
    $email = $_POST['email'];

    // Preparar la consulta SQL
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();

    // Si hay al menos un resultado, el correo electrónico ya existe
    if ($result->num_rows > 0) {
        echo 'exists';
    }

    $stmt->close();
    $db->close();
?>
