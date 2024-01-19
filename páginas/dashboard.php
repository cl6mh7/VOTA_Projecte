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

    <body class="bodyDashboard">
        <!-- HEADER -->
        <div class="contenedorHeader">
            <?php include '../páginas/header.php'; ?>
        </div>

        <div class="imagenCabecera">
            <h1>VOTAIETI</h1>
            <h2>Eslogan eslogan eslogan</h2>
        </div>

        <div class="dashboardContenedor">
            <h3><em>Dashboard</em></h3>
            <div class="circulosDashboard">
                <div>
                    <img src="../imgs/Placeholder.png" alt="">
                    <p>Crea tu encuesta</p>
                </div>

                <div>
                    <img src="../imgs/Placeholder.png" alt="">
                    <p>Edita tu encuesta</p>
                </div>

                <div>
                    <img src="../imgs/Placeholder.png" alt="">
                    <p>Invita a tus amigos a votar</p>
                </div>

                <div>
                    <img src="../imgs/Placeholder.png" alt="">
                    <p>Ver mis votos</p>
                </div>
            </div>
        </div>

        <div class="contenedorFooter">
            <?php include '../páginas/footer.php'; ?>
        </div>
    </body>

    <style>
        /* ---------------------------------------------------- */
        /* INDEX.PHP */            
        .bodyDashboard h3{
            margin-top: 100px;
            text-align: center;
            font-size: 40px;
            color: #8D99AE;
        }
        .bodyDashboard {
            margin: 0;
            padding: 0;
        }

        .bodyDashboard .imagenCabecera {
            padding: 200px;
            background-image: url("../imgs/votacion.jpg");
        }

        .imagenCabecera h1 {
            margin-bottom: -30px;
            font-family: 'Playfair Display', serif;
            font-size: 100px;
            color: #EDF2F4;
        }

        .imagenCabecera h2 {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 30px;
            color: #EDF2F4;
            text-align: center;
        }

        .bodyDashboard p {
            font-family: 'Lato', sans-serif;
            font-size: 15px;
            color: #EDF2F4;
        }

        .circulosDashboard {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            align-items: center;
            justify-content: center;
            margin: 30px 0 100px 0;
        }

        .circulosDashboard div {
            text-align: center;
        }

        .circulosDashboard img {
            width: 200px;
            border: 1px solid transparent;
            border-radius: 100px;
            margin-top: 20px; /* Ajusta según sea necesario */
        }

        .circulosDashboard p {
            margin: 10px 0 20px 0;
            text-align: center;
            color: #2B2D42;
            overflow: visible;
            white-space: normal;
            width: 100%;
        }
    </style>
</html>