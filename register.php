<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_name = $_POST["username"];
    $phone_number = $_POST["telephone"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $zipcode = $_POST["zipcode"];
    $token = bin2hex(random_bytes(50)); // Generate a random token

    // Connect to the database
    include 'db_connection.php';

    // Check if the email already exists in the database
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        die('El correo electrónico ya está en uso. Por favor, introduce otro.');
    }

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO users (email, password, user_name, phone_number, country, city, zipcode, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Bind the form data to the SQL statement
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $hashed_password);
    $stmt->bindParam(3, $user_name);
    $stmt->bindParam(4, $phone_number);
    $stmt->bindParam(5, $country);
    $stmt->bindParam(6, $city);
    $stmt->bindParam(7, $zipcode);
    $stmt->bindParam(8, $token);

    // Execute the SQL statement
    $stmt->execute();
}
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
    </body>
</html>