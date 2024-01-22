<?php






    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Encripta la contraseña con SHA-256
    $telephone = $_POST['telephone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];

    $token = bin2hex(random_bytes(16)); // Genera un token aleatorio

    $servername = "localhost";
    $dbusername = "arnau";
    $dbpassword = "P@ssw0rd1234";
    $dbname = "VOTE";

    // Crear conexión
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Preparar la sentencia SQL
    $sql = "INSERT INTO users (user_name, email, password, phone_number, country, city, zipcode, token)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $username, $email, $password, $telephone, $country, $city, $zipcode, $token);

    // Ejecutar la sentencia
    $stmt->execute();

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();



?><!DOCTYPE html>
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
        <?php


if(!empty($_POST)){


    echo 'post: <pre>'.print_r($_POST,true).'</pre>';


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Encripta la contraseña con SHA-256
    $telephone = $_POST['telephone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];

    $token = bin2hex(random_bytes(16)); // Genera un token aleatorio

    $servername = "localhost";
    $dbusername = "arnau";
    $dbpassword = "P@ssw0rd1234";
    $dbname = "VOTE";

    // Crear conexión
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Preparar la sentencia SQL
    $sql = "INSERT INTO users (user_name, email, password, phone_number, country, city, zipcode, token)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $username, $email, $password, $telephone, $country, $city, $zipcode, $token);

    // Ejecutar la sentencia
    $stmt->execute();
    if ($stmt->execute()) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();


}
?>
    </body>
</html>