<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Votaieti</title>
        <link rel="shortcut icon" href="../imgs/logosinfondo.png" />
        <link rel="stylesheet" href="../styles + scripts/styles.css">
    </head>
    <body class="bodyError403">
        
        <!-- HEADER -->
        <div class="contenedorHeader">
            <?php include '../páginas/header.php'; ?>
        </div>

        <div class="containerError403">
            <img src="error403.gif" alt="">
            <p>¡Ups! No tienes permiso para acceder a esta página.<br>¿Qué intentabas hacer?</p>
            <a id="volverButton" href="index.php">Vuelve al inicio</a>
        </div>
        
        <div class="contenedorFooter">
            <?php include '../páginas/footer.php'; ?>
        </div>
    </body>
</html>