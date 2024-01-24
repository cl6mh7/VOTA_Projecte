
<?php
session_start(); // Inicia una nueva sesión o reanuda la existente

// Verifica si el usuario ha iniciado sesión
if(!isset($_SESSION['email'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de error
    header('Location: errores/error403.php');
    exit;
}
?> 
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow">
        <meta name="keywords" content="votaieti, votación en línea, votación, encuestas, elecciones, privacidad, seguridad">
        <meta name="description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:title" content="Panel de control — Votaieti">
        <meta property="og:description" content="Plataforma de votación en línea comprometida con la privacidad y seguridad de los usuarios. Regístrate ahora y participa en encuestas y elecciones de manera segura.">
        <meta property="og:image" content="../imgs/votaietilogo.png">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="author" content="Arnau Mestre, Claudia Moyano i Henry Doudo">
        <title>Panel de control —Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
        <link rel="stylesheet" href="styles.css">
        <script src="../styles + scripts/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    </head>

    <body class="bodyDashboard">
        <!-- HEADER -->
        <div class="contenedorHeader">
            <?php include 'header.php'; ?>
        </div>

        <div class="imagenCabecera">
            <h1>VOTAIETI</h1>
            <h2>Panel de control</h2>
        </div>

        <div class="dashboardContenedor">
            
            <div class="circulosDashboard">
                <div id="creaEncuesta">
                    <a href="https://aws21.ieti.site/create_poll.php">
                        <div class="imagenConTexto">
                            <img src="../imgs/aura.jpg" alt="La imagen que me has enviado es un fondo de pantalla abstracto y colorido. Los colores se mezclan suavemente entre sí, creando un efecto visual atractivo. Predominan los tonos de rosa y amarillo en el centro, mientras que hay matices de azul y morado que se mezclan en los bordes. La imagen no tiene objetos o elementos definidos; es puramente una exhibición de color. El efecto general es vibrante, cálido y visualmente estimulante.">
                            <p><strong>Crea tu encuesta</strong></p>
                            <p><em>Diseña tu mundo de opiniones</em></p>
                        </div>
                    </a>
                </div>


                <div id="editaEncuesta">
                    <a href="#paginaEditaEncuesta">
                        <div class="imagenConTexto">
                            <img src="../imgs/aura1.jpg" alt="La imagen que me has enviado es un fondo abstracto con un suave degradado de colores. Predominan los tonos azules que se mezclan armoniosamente con verdes y un toque de amarillo. El efecto general es calmante y etéreo, sin elementos distintivos o detalles específicos. La transición entre los colores es fluida, sin líneas duras o bordes definidos.">
                            <p><strong>Edita tu encuesta</strong></p>
                            <p><em>Transforma tu encuesta en una maravilla digital</em></p>
                        </div>
                    </a>
                </div>

                <div id="invitarAmigos">
                    <div class="imagenConTexto">
                        <img src="../imgs/aura2.jpg" alt="La imagen que me has enviado es un fondo abstracto con un suave degradado de colores. Los colores predominantes son tonos de rosa, rojo y naranja que se mezclan armoniosamente. No hay objetos o elementos distintivos en la imagen; es puramente una mezcla colorida y etérea de tonos cálidos. La textura parece suave, sin líneas duras o bordes definidos, creando una sensación calmante.">
                        <p><strong>Invita a tus amigos a votar</strong></p>
                        <p><em>Haz que tus amigos se unan a la fiesta de opiniones</em></p>
                    </div>
                </div>

                <div class="verVotos">
                    <a href="#paginaVerVotos">
                        <div class="imagenConTexto">
                            <img src="../imgs/aura3.jpg" alt="La imagen que me has enviado es un fondo abstracto con un degradado suave y fluido. Los colores predominantes son tonos de rosa, rojo y naranja que se mezclan armoniosamente. No hay objetos o elementos distintivos en la imagen; es puramente una mezcla colorida y etérea de tonos cálidos. La textura parece suave, sin líneas duras o bordes definidos, creando una sensación calmante.">
                            <p><strong>Ver mis votos</strong></p>
                            <p><em>Descubre tus decisiones con la visualización de votos</em></p>
                        </div>
                    </a>
                </div>

                <div class="listarEncuestas">
                    <a href="https://aws21.ieti.site/list_poll.php">
                        <div class="imagenConTexto">
                            <img src="../imgs/aura5.jpg" alt="">
                            <p><strong>Listar encuestas</strong></p>
                            <p><em>Visita de nuevo tus encuestas creadas</em></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- PÁGINAS INTERNAS -->
        <div id="paginaCreaEncuesta" class="paginaInterna">
            <h3><em>Crea tu encuesta</em></h3>
            <p>Prueba.</p>
        </div>

        <div id="paginaEditaEncuesta" class="paginaInterna">
            <h3><em>Edita tu encuesta</em></h3>
            <p>Prueba.</p>
        </div>

        <div id="paginaVerVotos" class="paginaInterna">
            <h3><em>Ver mis votos</em></h3>
            <?php
                /* TO DO: Hay que hacer un bucle para que muestre en la pantalla la cantidad de votos del usuario. */
                echo '<p>Votaste “X” en la encuesta “Y” el día X del mes Y del año Z a las XX:XX.</p>';
            ?>
        </div>

        <div id="paginaListarEncuestas" class="paginaInterna">
            <h3><em>Listar encuestas</em></h3>
            <?php
                /* TO DO: Hay que hacer un bucle para que muestre en la pantalla la cantidad de encuestas creada por el usuario. */
                echo '<p>Creaste X encuesta.</p>';
            ?>
        </div>

        <div class="contenedorFooter">
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>