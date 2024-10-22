<?php

include("header.php");

?>
<div class="contenedor">
    <div class="header">
        <header>
            <nav>
                <div class="logo">
                    <img src="imagenes/logo.png" alt="">
                </div>
                <ul id="menuList">
                    <li><a class="inicio" href="../inicio.php">Inicio</a></li>
                    <li><a class="crearEvento" href="#crearEvento">Crea tu evento</a></li>
                </ul>
                <div class="menu-icon">
                    <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
                </div>
            </nav>
        </header>
    </div>
</div>
<h2 class="titulo-organizar">Organizar</h2>
<div class="grupo-boton" role="group" aria-label="Basic outlined example">
    <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary used">Invitados</button></a>
    <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary used">Salones</button></a>
    <a href="organizar-catering.php"><button type="button" class="boton-org boton-outline-primary used">Catering</button></a>
    <a href="organizar-dj.php"><button type="button" class="boton-org boton-outline-primary active">DJ</button></a>
    <a href="organizar-dj.php"><button type="button" class="boton-org boton-outline-primary">Fotografo</button></a>
    <a href="organizar-dj.php"> <button type="button" class="boton-org boton-outline-primary">Bebidas</button></a>
    <a href="organizar-dj.php"> <button type="button" class="boton-org boton-outline-primary">Cotillon</button></a>
</div>
<div class="contenedor-funciones">
    <h3 class="tit-org">DJ</h3>
    <p class="opac"> (Debes seleccionar al menos un DJ)</p>
    <hr>
    <form id="dj-form" action="guardar-seleccion.php" method="post">
        <?php
        include("conexion-organizar.php");
        $sql = "SELECT * FROM dj";
        $result = pg_query($con, $sql);

        if (pg_num_rows($result) > 0) {
            echo '<div class="dj-container item-organizar">';
            while ($row = pg_fetch_assoc($result)) { //obtiene una fila de resultados de la bdd
                //se ejecuta en bucle
                echo '<div class="dj-item">';
                echo '<h3>' . $row["nombre"] . '</h3>';
                echo '<p><b>Teléfono:</b> ' . $row["telefono"] . '</p>';
                echo '<p><b>Duración:</b> ' . $row["duracion_servicio"] . ' horas</p>';
                echo '<p><b>Precio:</b> $' . $row["precio"] . '</p>';
                echo '<input type="radio" id="dj_' . $row["id_dj"] . '" name="dj_seleccionado" value="' . $row["nombre"] . '">';
                echo '<label for="dj_' . $row["id_dj"] . '"></label>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No hay DJ disponibles.";
        }
        ?>
        <div class="cont-botones">
            <div class="anterior">
                <button class="ant">
                    <i class="fa-solid fa-left-long"></i>
                    <a href="organizar-invitados.php">Anterior</a>
                </button>
            </div>
            <div class="siguiente">
                <button class="sig" id="siguiente-btn" type="submit">
                    <i class="fa-solid fa-right-long"></i>
                    Siguiente
                </button>
            </div>
            <div class="omitir">
                <button class="omitir-btn" name="omit_dj" type="submit">
                    Omitir <i class="fa-solid fa-forward"></i>
                </button>
            </div>
        </div>
    </form>
</div>
