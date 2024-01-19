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

    <body class="registerBody">
        <?php include 'header.php'; ?>

        <div class="containerRegister">

            <form class="creacuentaRegister">
                <h1>INICIA SESIÓN</h1>
                <img class="logoLogin" src="../imgs/logosinfondo.png" alt="">
                
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
