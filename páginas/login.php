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
    </head>

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

                <button id="tienescuentaBotonLogin" type="submit">¿No tienes cuenta?</button>        
                <button id="siguienteBotonLogin" type="submit">Siguiente</button>        
            </form>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
