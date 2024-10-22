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
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary used">Salones</button></a>
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary used">Catering</button></a>
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary used">DJ</button></a>
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary used">Fotografo</button></a>
    <a href="organizar-salones.php"> <button type="button" class="boton-org boton-outline-primary active">Bebidas</button></a>
    <a href="organizar-salones.php"> <button type="button" class="boton-org boton-outline-primary">Cotillon</button></a>
</div>
<div class="contenedor-funciones">
    <h3 class="tit-org">Servicio de bebidas</h3>
    <p class="opac"> (Debes seleccionar al menos un servicio de bebidas)</p>
    <hr>
    <form id="bebidas-form" action="guardar-seleccion.php" method="post">
        <?php
        include("conexion-organizar.php");
        $sql = "SELECT * FROM bebidas";
        $result = pg_query($con, $sql);

        if (pg_num_rows($result) > 0) {
            echo '<div class="bebidas-container">';
            while ($row = pg_fetch_assoc($result)) { //obtiene una fila de resultados de la bdd
                //se ejecuta en bucle
                echo '<div class="bebidas-item item-organizar">';
                echo '<h3>' . $row["nombre"] . '</h3>';
                echo '<p><b>Contacto:</b> ' . $row["telefono"] . '</p>';
                echo '<p><b>Precio: </b> $' . $row["precio"] . '</p>';
                echo '<p><b>Especialidad:</b> ' . $row["especialidades"] . '</p>';
                echo '<input type="radio" id="bebidas_' . $row["id_bebida"] . '" name="bebidas_seleccionadas" value="' . $row["nombre"] . '">';
                echo '<label for="bebidas_' . $row["id_bebida"] . '"></label>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No hay servicio de bebidas disponibles.";
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
                <button class="omitir-btn" name="omit_bebidas" type="submit">
                    Omitir <i class="fa-solid fa-forward"></i>
                </button>
            </div>
        </div>
    </form>
</div>