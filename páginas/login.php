<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
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
                <img class="logoLogin" src="l../imgs/ogosinfondo.png" alt="">
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
