<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="votaieti, votación en línea, votación, encuestas, elecciones, privacidad, seguridad">
        <meta name="description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:title" content="Votaieti">
        <meta property="og:description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:image" content="../imgs/votaietilogo.png">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="author" content="Arnau Mestre, Claudia Moyano i Henry Doudo">
        <title>Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
        <link rel="stylesheet" href="styles.css">
        <script src="../styles + scripts/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>
    <body class="bodyIndex">
        <?php

        session_start();
        $link = "register.php";
        if(isset($_SESSION['email'])) {
            $link = "dashboard.php";
        }
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
            } */
        ?>

        <!-- HEADER -->
        <div class="contenedorHeader">
            <?php include 'header.php'; ?>
        </div>

        <div class="contenedor">
            <div class="imagenCabecera">
                <h1>VOTAIETI</h1>
                <h2>Tu elección, nuestro compromiso global</h2>
            </div>

            <div class="circulosExplicativos">
                <div>
                    <img src="../imgs/votarHombre.jpeg" alt="La imagen muestra a una persona señalando una tarjeta que tiene impresa otra foto de alguien, delante de una bandera estadounidense. En la tarjeta hay un cuadro marcado junto a la palabra “VOTING”. La persona lleva puesto un pin azul con letras blancas que dicen “9DD” en su pecho. El individuo viste formalmente y lleva puesta una banda roja sobre el hombro. Dado que la imagen parece estar relacionada con la votación, es posible que la persona esté involucrada en algún tipo de campaña política o actividad relacionada con la votación. Sin embargo, no tengo información adicional sobre el contexto o la situación de la imagen.">
                    <p>Crea y diseña tus propias encuestas</p>
                </div>

                <div>
                    <img src="../imgs/votarMujeres.jpeg" alt="Hay un grupo de personas. Cada persona levanta un dedo, lo que puede indicar silencio o atención. La figura central viste un abrigo de color claro adornado con un emblema de flor roja bordado en el lado izquierdo. Las otras personas están vestidas con ropa diferente, lo que sugiere diversidad, pero sus características y detalles de ropa específicos no son distinguibles debido al borroso. El fondo es neutral y no proporciona contexto adicional sobre el entorno o la situación.">
                    <p>Registra tu voto en encuestas creadas por usuarios</p>
                </div>

                <div>
                    <img src="../imgs/votarMujeres1.jpeg" alt="La imagen muestra a una persona en primer plano, sosteniendo un papel con una marca de verificación y levantando un dedo. El rostro de la persona en primer plano, así como los de las personas en el fondo, están pixelados para ocultar sus identidades. Las personas del fondo también sostienen papeles con marcas de verificación. Todos parecen estar participando en algún tipo de votación o aprobación, indicado por las marcas de verificación. La imagen tiene un tono serio y formal.">
                    <p>Tu voto, completamente seguro</p>
                </div>
            </div>

            <div class="contenedorInfo">
                <img class="imgExplicativo" src="../imgs/votosUrnas.jpg" alt="La imagen muestra una mano insertando una papeleta en una urna de votación. La mano y la urna están silueteadas contra un fondo blanco brillante. La urna es rectangular y está colocada sobre una superficie plana. No hay detalles visibles en la mano o la urna debido a que están silueteadas, pero se puede ver un reloj pulsera en la muñeca de la persona. El ambiente general transmite el acto cívico del voto.">
                <div class="contenedorTexto">
                    <p class="textoExplicativo">Votaieti es una plataforma dedicada a facilitar el proceso de votación en línea, comprometida con la protección de la privacidad de nuestros usuarios. Nuestro enfoque se centra en proporcionar una experiencia de votación segura y transparente, donde los usuarios pueden participar en encuestas y elecciones con la confianza de que sus datos personales son tratados con la máxima confidencialidad. En Votaieti, valoramos y respetamos la privacidad de cada individuo. Implementamos rigurosas medidas de seguridad para garantizar la integridad y confidencialidad de la información del usuario. Nos esforzamos por establecer un entorno en el que la participación en encuestas y votaciones sea accesible, intuitiva y, sobre todo, seguro. Nuestra misión es proporcionar una plataforma confiable que permita a los usuarios expresar sus opiniones de manera anónima y sin comprometer la seguridad de su información personal. Creemos en la importancia de la transparencia y la privacidad en el proceso de toma de decisiones, y trabajamos constantemente para garantizar que cada usuario se sienta protegido al ejercer su derecho a votar en línea.<br></p>
                    <a id="buttontextoExplicativo" href="https://aws21.ieti.site/login.php">¿Ya tienes cuenta? ¡Inicia sesión!</a>
                </div>
            </div>

            <div class="textoFinal">
                <h2>¡Únete a Votaieti y sé parte del cambio!</h2>    
                <p>En Votaieti, creemos en el poder de tu voz. Tu opinión importa y puede marcar la diferencia. Regístrate ahora y forma parte de una comunidad comprometida con el cambio positivo.</p>
                <a id="buttonFinalIndex" href="https://aws21.ieti.site/<?php echo $link; ?>">Comienza a crear</a>
            </div>
        </div>

        <div class="contenedorFooter">
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>