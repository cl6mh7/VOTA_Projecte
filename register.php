<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal de votaciones</title>
        <link rel="shortcut icon" href="logosinfondo.png" />
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <?php include 'db_connection.php'; ?>
        <script src="/js/register.js"></script>

        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>

    <body class="registerBody">
        
        
        <?php include 'header.php'; ?>
       
        
        <div class="containerRegister">

            <form class="creacuentaRegister" action="index.php" method="post">
                <h1>REGÍSTRATE</h1>
                <img class="logoLogin" src="logosinfondo.png" alt="">
               
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>

<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];

    // Realizar la validación (puedes agregar reglas específicas según tus necesidades)
    if (empty($username) || empty($password) || empty($passwordConfirm) || empty($email)) {
        echo 'Todos los campos son obligatorios';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        echo 'El nombre de usuario solo puede contener letras, números y guiones bajos';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'El formato del email no es válido';
    } elseif ($password != $passwordConfirm) {
        echo 'Las contraseñas no coinciden';
    } else {
        // Consulta para verificar si el nombre de usuario ya existe
        $query = "SELECT * FROM users WHERE user_name = '$username'";
        $result = $conn->query($query);

        $emailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = $conn->query($emailQuery);

        $telefonQuery = "SELECT * FROM users WHERE phone_number = '$telefon'";
        $telefonResult = $conn->query($telefonQuery);

        if ($result->num_rows > 0) {
            // El nombre de usuario ya existe en la base de datos
            echo 'Error: El nombre de usuario ya está en uso';
        } elseif ($emailResult->num_rows > 0) {
            echo 'Error: El email ya está registrado';
        } elseif ($telefonResult->num_rows > 0) {
            echo 'Error: El telefono ya está registrado';
        } else {
            // Hash de la contraseña antes de almacenarla en la base de datos
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // El nombre de usuario no existe, insertarlo en la base de datos
            $insert_query = "INSERT INTO users (user_name, password, email,phone_number) VALUES ('$username', '$hashedPassword', '$email','$telefon')";
            if ($conn->query($insert_query) === TRUE) {
                echo 'Usuario registrado con éxito';
            } else {
                echo 'Error al registrar el usuario: ' . $conn->error;
            }
        }
    }
} else {
    // Si la solicitud no es POST, redirigir o mostrar un mensaje de error
    // Reemplaza con la página correcta o muestra un mensaje de error
    exit();
}

// Cerrar la conexión al final del script
$conn->close();
?>

?>