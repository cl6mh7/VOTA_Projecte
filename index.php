
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Votaieti</title>
        <link rel="shortcut icon" href="logosinfondo.png" />
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>


    </head>
    <body class="bodyIndex">

        <!-- HEADER -->
        <div class="contenedorHeader">
            <?php include 'header.php'; ?>
        </div>

        <div class="contenedor">
            <div class="imagenCabecera">
                <h1>VOTAIETI</h1>
                <h2>Eslogan eslogan eslogan</h2>
            </div>

            <div class="circulosExplicativos">
                <div>
                    <img src="Placeholder.png" alt="">
                    <p>Crea y diseña tus propias encuestas</p>
                </div>

                <div>
                    <img src="Placeholder.png" alt="">
                    <p>Registra tu voto en encuestas creadas por usuarios</p>
                </div>

                <div>
                    <img src="Placeholder.png" alt="">
                    <p>Tu voto, completamente seguro</p>
                </div>
            </div>

            <div class="contenedorInfo">
            <img class="imgExplicativo" src="votacion.jpg" alt="">
            <div class="contenedorTexto">
                <p class="textoExplicativo">
                    Votaieti es una plataforma dedicada a facilitar el proceso de votación en línea, comprometida con la protección de la privacidad de nuestros usuarios. Nuestro enfoque se centra en proporcionar una experiencia de votación segura y transparente, donde los usuarios pueden participar en encuestas y elecciones con la confianza de que sus datos personales son tratados con la máxima confidencialidad. En Votaieti, valoramos y respetamos la privacidad de cada individuo. Implementamos rigurosas medidas de seguridad para garantizar la integridad y confidencialidad de la información del usuario. Nos esforzamos por establecer un entorno en el que la participación en encuestas y votaciones sea accesible, intuitiva y, sobre todo, seguro. Nuestra misión es proporcionar una plataforma confiable que permita a los usuarios expresar sus opiniones de manera anónima y sin comprometer la seguridad de su información personal. Creemos en la importancia de la transparencia y la privacidad en el proceso de toma de decisiones, y trabajamos constantemente para garantizar que cada usuario se sienta protegido al ejercer su derecho a votar en línea.<br>
                </p>
                <a id="buttontextoExplicativo" href="login.php">¿Ya tienes cuenta? ¡Inicia sesión!</a>
            </div>
            </div>


            <div class="textoFinal">
                <h2>Votaieti</h2>    
                <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum  lorem ipsum  lorem ipsum </p>
                <a id="buttonFinalIndex" href="register.php">¡Comienza a crear!</a>
            </div>

        </div>
        <div class="contenedorFooter">
            <?php include 'footer.php'; ?>
        </div>


       

    </body>
</html>