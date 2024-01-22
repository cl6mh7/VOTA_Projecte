<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="votaieti, votación en línea, votación, encuestas, elecciones, privacidad, seguridad">
        <meta name="description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:title" content="Regístrate — Votaieti">
        <meta property="og:description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:image" content="../imgs/votaietilogo.png">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="author" content="Arnau Mestre, Claudia Moyano i Henry Doudo">
        <title>Regístrate — Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
        <link rel="stylesheet" href="../styles + scripts/styles.css">
        <script src="../styles + scripts/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>

    <body class="registerBody">    
        <?php
            /*include 'db_connection.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $passwordConfirm = $_POST['passwordConfirm'];
                $email = $_POST['email'];
                $telefon = $_POST['telefon'];

                if (empty($username) || empty($password) || empty($passwordConfirm) || empty($email)) {
                    echo '¡Todos los campos son obligatorios!';
                
                } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                    echo 'El nombre de usuario solo puede contener letras, números y guiones bajos.';
                
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
                    echo 'El formato del correo no es válido.';
                } elseif ($password != $passwordConfirm) {
                    echo 'Las contraseñas no coinciden';
                
                } else {
                    $query = "SELECT * FROM users WHERE user_name = '$username'";
                    $result = $conn->query($query);

                    $emailQuery = "SELECT * FROM users WHERE email = '$email'";
                    $emailResult = $conn->query($emailQuery);

                    $telefonQuery = "SELECT * FROM users WHERE phone_number = '$telefon'";
                    $telefonResult = $conn->query($telefonQuery);

                    if ($result->num_rows > 0) {
                        echo '¡Error! El nombre de usuario ya está en uso.';
                    
                    } elseif ($emailResult->num_rows > 0) {
                        echo '¡Error! El correo ya está en uso.';
                    
                    } elseif ($telefonResult->num_rows > 0) {
                        echo '¡Error! El telefono ya está en uso';
                    
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $insert_query = "INSERT INTO users (user_name, password, email,phone_number) VALUES ('$username', '$hashedPassword', '$email','$telefon')";
                        if ($conn->query($insert_query) === TRUE) {
                            echo 'Usuario registrado con éxito';
                        } else {
                            echo 'Error al registrar el usuario ' . $conn->error . '.';
                        }}}} else { exit(); }

            $conn->close();*/
        ?>

        <?php include 'header.php'; ?>
        <div class="containerRegister">
            
            <form class="creacuentaRegister">
                <h1>CREA TU CUENTA</h1>
                <img class="logoLogin" src="../imgs/logosinfondo.png" alt="La imagen muestra un paisaje natural con un filtro azul aplicado, lo que le da una apariencia monocromática con tonos de azul predominantes. En primer plano, hay rocas grandes y pequeñas que emergen del agua tranquila del lago. El lago es calmado y claro, ofreciendo un reflejo casi perfecto de la escena circundante. Una montaña imponente se erige en el fondo, su silueta nítida contra el cielo azul oscuro. Los contornos de los árboles son visibles a lo largo de las orillas del lago, añadiendo profundidad a la escena. La paleta de colores es monocromática con tonos de azul predominantes, transmitiendo una sensación de calma y tranquilidad.">
                
                <div class="datosUsuarioRegister">
                    <input class="inputRegisterPHP" type="text" id="username" required>
                    <label for="username">Usuario</label>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <input class="inputRegisterPHP" type="email" id="email" required>
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <input class="inputRegisterPHP" type="password" id="password" required>
                    <label for="password">Contraseña</label>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <input class="inputRegisterPHP" type="password" id="confirmPassword" required>
                    <label for="confirmPassword">Repetir contraseña</label>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <input class="inputRegisterPHP" type="tel" id="telephone" required>
                    <label for="telephone">Número de teléfono</label>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <label for="country">País</label><br>
                    <select class="inputRegisterPHP" id="country" required>
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                    </select>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <input class="inputRegisterPHP" type="text" id="city" required>
                    <label for="city">Ciudad</label>
                </div>

                <div class="datosUsuarioRegister hidden">
                    <input class="inputRegisterPHP" type="text" pattern="[0-9]{5}" id="zipcode" required>
                    <label for="zipcode">Código postal</label>
                </div>

                <button id="siguienteBotonRegister" type="submit">Siguiente</button>        
            </form>
        </div>

        <div class="contenedorFooter">
            <?php include 'footer.php'; ?>
        </div>

        <div id="loaderRegister" class="loaderRegister">
            <img src="../imgs/logosinfondo.png" alt="Logo de Votaieti. Se trata de un círculo azul no muy oscuro con el nombre en fuente sans-serif azul oscuro debajo. El fondo es blanco.">
        </div>
    </body>
</html>
