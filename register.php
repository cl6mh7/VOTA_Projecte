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

            <form class="creacuentaRegister" action="register.php" method="post">
                <h1>REGÍSTRATE</h1>
                <img class="logoLogin" src="logosinfondo.png" alt="">

        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
<?php

    $servername = "localhost";
    $dbusername = "root";
    $password= "root";
    $dbname = "VOTE";

    // Crear conexión
    $conn = new mysqli($servername, $dbusername,$password, $dbname);

if(!empty($_POST)){


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Encripta la contraseña con SHA-256
    $telephone = $_POST['telephone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];

    $token = bin2hex(random_bytes(16)); // Genera un token aleatorio

    // Verificar conexión
   

    // Preparar la sentencia SQL
    $sql = "INSERT INTO users (user_name, email, password, phone_number, country, city, zipcode, token)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $username, $email, $password, $telephone, $country, $city, $zipcode, $token);

    // Ejecutar la sentencia
    $stmt->execute();

    // Cerrar la sentencia y la conexión
 
    if ($stmt->affected_rows > 0) {
        echo "<script>
                function showSuccesPopup(message) {
                    // Crear la ventana flotante
                    var successPopup = $('<div/>', {
                        id: 'successPopup',
                        text: message,
                        style: 'position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: green; color: white; padding: 20px; border-radius: 5px;'
                    });

                    // Crear el botón 'X'
                    var closeButton = $('<button/>', {
                        text: 'X',
                        style: 'position: absolute; top: 0; right: 0; background-color: transparent; color: white; border: none; font-size: 20px; cursor: pointer;'
                    });

                    // Añadir el botón 'X' a la ventana flotante
                    successPopup.append(closeButton);

                    // Añadir la ventana flotante al cuerpo del documento
                    $('body').append(successPopup);

                    // Manejador de eventos para el botón 'X'
                    closeButton.click(function () {
                        successPopup.remove();
                    });
                }
                window.onload = function () {
                    showSuccesPopup('Usuario registrado con éxito');
                };
              </script>";
    }
    $stmt->close();
    $conn->close();
}


?>