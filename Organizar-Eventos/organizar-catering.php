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
    <a href="organizar-catering.php"><button type="button" class="boton-org boton-outline-primary active">Catering</button></a>
    <a href="organizar-catering.php"><button type="button" class="boton-org boton-outline-primary">DJ</button></a>
    <a href="organizar-catering.php"><button type="button" class="boton-org boton-outline-primary">Fotografo</button></a>
    <a href="organizar-catering.php"> <button type="button" class="boton-org boton-outline-primary">Bebidas</button></a>
    <a href="organizar-catering.php"> <button type="button" class="boton-org boton-outline-primary">Cotillon</button></a>
</div>
<div class="contenedor-funciones">
    <h3 class="tit-org">Catering</h3>
    <p class="opac"> (Debes seleccionar al menos un catering)</p>
    <hr>
    <form id="catering-form" action="guardar-seleccion.php" method="post">
        <?php
        include("conexion-organizar.php");
        $sql = "SELECT * FROM catering";
        $result = pg_query($con, $sql);

        if (pg_num_rows($result) > 0) {
            echo '<div class="catering-container">';
            while ($row = pg_fetch_assoc($result)) { //obtiene una fila de resultados de la bdd
                //se ejecuta en bucle
                echo '<div class="catering-item item-organizar">';
                echo '<img src="' . $row["imagen_dir"] . '" />';
                echo '<h3>' . $row["nombre"] . '</h3>';
                echo '<p><b>Teléfono:</b> ' . $row["telefono"] . '</p>';
                echo '<p><b>Máx de personas:</b> ' . $row["cant_personas"] . '</p>';
                echo '<p><b>Especialidad:</b> ' . $row["menu_disponible"] . '</p>';
                echo '<p><b>Precio:</b> $' . $row["precio"] . '</p>';
                echo '<input type="radio" id="catering_' . $row["id_catering"] . '" name="catering_seleccionado" value="' . $row["nombre"] . '">';
                echo '<label for="catering_' . $row["id_catering"] . '"></label>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No hay catering disponibles.";
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
                <button class="omitir-btn" name="omit_catering" type="submit">
                    Omitir <i class="fa-solid fa-forward"></i>
                </button>
            </div>
        </div>

    </form>
</div>