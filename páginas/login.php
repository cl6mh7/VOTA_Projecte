<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="votaieti, votación en línea, votación, encuestas, elecciones, privacidad, seguridad">
        <meta name="description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:title" content="Inicia Sesión —Votaieti">
        <meta property="og:description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:image" content="../imgs/votaietilogo.png">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="author" content="Arnau Mestre, Claudia Moyano i Henry Doudo">
        <title>Inicia Sesión — Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png"/>
        <link rel="stylesheet" href="../styles + scripts/styles.css">
        <script src="../styles + scripts/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>

    <?php
        /* include 'db_connection.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $contraseña = $_POST["password"];
            $querystr = "SELECT email FROM users WHERE email = :email AND password = SHA2(:contrasena, 256)";
            $query = $pdo->prepare($querystr);

            $query->bindParam(':email', $email);
            $query->bindParam(':contrasena', $contraseña);

            $query->execute();
            
            $filas = $query->rowCount();
            if ($filas > 0) {
                session_start();
                $_SESSION['email'] = $email;
                echo '<script type="text/javascript">window.location = "dashboard.php";</script>';
                exit;
            } else {
                echo "<script type='text/javascript'>alert('Correo electrónico o contraseña incorrectos');</script>";
            }
            unset($pdo);
            unset($query);
        }*/
    ?>

    <body class="loginBody">
        <?php include 'header.php'; ?>

        <div class="containerLogin">

            <form class="iniciasesionLogin">
                <h1>INICIA SESIÓN</h1>
                <img class="logoLogin" src="../imgs/logosinfondo.png" alt="Logo de Votaieti. Se trata de un círculo azul no muy oscuro con el nombre en fuente sans-serif azul oscuro debajo. El fondo es blanco.">
                <div class="datosUsuarioLogin">
                    <input class="inputLoginPHP" type="text" id="username" required>
                    <label for="username">Usuario</label>
                </div>

                <div class="datosUsuarioLogin">
                    <input class="inputLoginPHP" type="password" id="password" required>
                    <label for="password">Contraseña</label>
                </div>

                <a id="tienescuentaBotonLogin" href="register.php">¿No tienes cuenta?</a>
                <a id="siguienteBotonLogin" href="dashboard.php">Siguiente</a>
            </form>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
