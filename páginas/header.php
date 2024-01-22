<?php
    echo '<div class="contenedorHeader">
            <a href="../páginas/index.php"><img class="imgHeader" src="../imgs/logosinfondo.png" alt="Logo de Votaieti. Se trata de un círculo azul no muy oscuro con el nombre en fuente sans-serif azul oscuro debajo. El fondo es blanco."></a>
        
            <div class="textoHeader">
                <h1 class="h1Header"><strong>VOTAIETI</strong></h1>
                <ul class="ulHeader">';

    if(isset($_SESSION['usuario_id'])) {
        echo '<li class="liHeader"><a href="../páginas/logout.php">Cerrar Sesión</a></li>';
    
    } else {
        echo '<li class="liHeader"><a href="../páginas/index.php">Inicio</a></li>';

        if (!isset($_SESSION['usuario_id'])) {
            echo '<li class="liHeader"><a href="../páginas/login.php">Acceder</a></li>
                  <li class="liHeader"><a href="../páginas/register.php">Regístrate</a></li>';
        }}

    echo '</ul>
          </div>
          </div>';
?>