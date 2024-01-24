<?php
session_start();
 if (isset($_SESSION['email'])) {
    echo '<div class="contenedorHeader">
            <a href="https://aws21.ieti.site/index.php"><img class="imgHeader" src="imgs/logosinfondo.png" alt="Logo de Votaieti. Se trata de un círculo azul no muy oscuro con el nombre en fuente sans serif azul oscuro debajo. El fondo es blanco."></a>
        
            <div class="textoHeader">
                <h1 class="h1Header"><strong>VOTAIETI</strong></h1>
                <ul class="ulHeader">
                    <li class="liHeader"><a href="https://aws21.ieti.site/index.php">Inicio</a></li>
                    <li class="liHeader"><a href="https://aws21.ieti.site/dashboard.php">Panel de control</a></li>
                    <li id="btnLogOut"class="liHeader"><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                    
                </ul>
            </div>
        </div>';

    } else {
        // Si la variable de sesión 'email' no existe, mostrar contenido para usuarios no autenticados
        echo '<div class="contenedorHeader">
            <a href="https://aws21.ieti.site/index.php"><img class="imgHeader" src="../imgs/logosinfondo.png" alt="Logo de Votaieti. Se trata de un círculo azul no muy oscuro con el nombre en fuente sans serif azul oscuro debajo. El fondo es blanco."></a>
        
            <div class="textoHeader">
                <h1 class="h1Header"><strong>VOTAIETI</strong></h1>
                <ul class="ulHeader">
                    <li class="liHeader"><a href="https://aws21.ieti.site/index.php">Inicio</a></li>
                    <li class="liHeader"><a href="https://aws21.ieti.site/register.php">Regístrate</a></li>
                    <li class="liHeader"><a href="https://aws21.ieti.site/login.php">Iniciar sesión</a></li>
                </ul>
            </div>
        </div>';
    }

?>
