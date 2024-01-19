<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal de votaciones</title>
        <link rel="shortcut icon" href="logosinfondo.png" />
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>

    <body class="registerBody">
        <?php include 'header.php'; ?>

        <div class="containerRegister">

            <form class="creacuentaRegister">
                <h1>INICIA SESIÓN</h1>
                <img class="logoLogin" src="logosinfondo.png" alt="">
                
                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="text" id="username" required>
                    <label for="username">Usuario</label>
                </div>

                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="email" id="email" required>
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="password" id="password" required>
                    <label for="password">Contraseña</label>
                </div>

                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="password" id="confirmPassword" required>
                    <label for="confirmPassword">Repetir contraseña</label>
                </div>

                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="tel" id="telephone" required>
                    <label for="telephone">Número de teléfono</label>
                </div>

                <div class="datosUsuarioRegister">
                    <label for="country">País</label><br>
                    <select class="inputRegisterPHP" id="country" required>
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                    </select>
                </div>

                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="text" id="city" required>
                    <label for="city">Ciudad</label>
                </div>

                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="text" pattern="[0-9]{5}" id="zipcode" required>
                    <label for="zipcode">Código postal</label>
                </div>

                <button id="siguienteBotonRegister" type="submit">Siguiente</button>        
            </form>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="register.js"></script>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<h2>Registro de Usuarios</h2>

<form id="registrationForm" method="POST">
    <button id="formbtn" type="submit">Enviar</button>
</form>

</body>
</html>

<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    // Realizar la validación (puedes agregar reglas específicas según tus necesidades)
    if (empty($username) || empty($password) || empty($passwordConfirm)) {
        echo 'Todos los campos son obligatorios';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        echo 'El nombre de usuario solo puede contener letras, números y guiones bajos';
    } elseif ($password != $passwordConfirm) {
        echo 'Las contraseñas no coinciden';
    } else {
        // Consulta para verificar si el nombre de usuario ya existe
        $query = "SELECT * FROM users WHERE user_name = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // El nombre de usuario ya existe en la base de datos
            echo 'Error: El nombre de usuario ya está en uso';
        } else {
            // Hash de la contraseña antes de almacenarla en la base de datos
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // El nombre de usuario no existe, insertarlo en la base de datos
            $insert_query = "INSERT INTO users (user_name, password) VALUES ('$username', '$hashedPassword')";
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



