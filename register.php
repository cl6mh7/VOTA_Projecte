<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="register.js"></script>
</head>
<body>

<h2>Registro de Usuarios</h2>

<form id="registrationForm"  method="post"></form>

</body>
</html>
<?php
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn, 'world');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el nombre de usuario enviado por el formulario
    $username = $_POST['username'];

    // Realizar la validación (puedes agregar reglas específicas según tus necesidades)
    if (empty($username)) {
        echo 'El nombre de usuario no puede estar vacío';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        echo 'El nombre de usuario solo puede contener letras, números y guiones bajos';
    } else {
        // Consulta para verificar si el nombre de usuario ya existe
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // El nombre de usuario ya existe en la base de datos
            echo 'Error: El nombre de usuario ya está en uso';
        } else {
            // El nombre de usuario no existe, insertarlo en la base de datos
            $insert_query = "INSERT INTO usuarios (nombre_usuario) VALUES ('$username')";
            if ($conn->query($insert_query) === TRUE) {
                echo 'Nombre de usuario registrado con éxito';
            } else {
                echo 'Error al registrar el nombre de usuario: ' . $conn->error;
            }
        }
    }
} else {
    // Si la solicitud no es POST, redirigir o mostrar un mensaje de error
    header('Location: index.php'); // Reemplaza con la página correcta o muestra un mensaje de error
    exit();
}

// Cerrar la conexión al final del script
$conn->close();
?>


