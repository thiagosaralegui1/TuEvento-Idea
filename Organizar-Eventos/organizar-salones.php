<?php

include("header.php");
require_once("conexion-organizar.php");
include_once("recibir-datos-salones.php");


/* $resultado = consultar_salones($con, $inv_tot); */

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
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary active">Salones</button></a>
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary">Catering</button></a>
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary">DJ</button></a>
    <a href="organizar-salones.php"><button type="button" class="boton-org boton-outline-primary">Fotografo</button></a>
    <a href="organizar-salones.php"> <button type="button" class="boton-org boton-outline-primary">Bebidas</button></a>
    <a href="organizar-salones.php"> <button type="button" class="boton-org boton-outline-primary">Cotillon</button></a>
</div>
<div class="contenedor-funciones">
    <h3 class="tit-org">Salones</h3>
    <?php echo "En base a $inv_tot invitados te recomendamos:"; ?>
    <p class="opac"> (Debes seleccionar al menos un salón)</p>
    <hr>
    <form id="evento-form" action="guardar-seleccion.php" method="post">
        <input type="hidden" name="totalinvitados" value="<?php echo $inv_tot; ?>">
        <div class="contenedor-salones">
            <?php
            $salones = consultar_salones($con, $inv_tot);
            $nombres = $salones['nombres'];
            $fotos = $salones['fotos'];
            $capacidad_salones = $salones['capacidad'];
            $medida_salones = $salones['medida'];
            $precio_salones = $salones['precio'];
            $serv_incluido_salones = $salones['serv_incluido'];



            if (count($nombres) > 0) {
                foreach ($nombres as $arr => $nombre) { ?>
                    <div class="contenedor-imagen-nombre">
                        <img src="<?php echo $fotos[$arr]; ?>" class="imagen-salones"> <br>
                        <div class="contenedor-texto-boton">
                            <p class="texto-salones"><?php echo $nombre; ?></p>
                            <p class="texto-datos-salones"><b>Capacidad:</b> <?php echo $capacidad_salones[$arr] ?> personas</p>
                            <p class="texto-datos-salones"><b>Medida:</b> <?php echo $medida_salones[$arr] ?> m²</p>
                            <p class="texto-datos-salones"><b>Precio:</b> $<?php echo $precio_salones[$arr] ?></p>
                            <p class="texto-datos-salones"><b>Servicio incluido:</b> <?php echo $serv_incluido_salones[$arr] ?></p>
                            <input type="radio" id="salon<?php echo ($arr + 1); ?>" name="salon_seleccionado" value="<?php echo $nombre; ?>" data-imagen="<?php echo $fotos[$arr]; ?>">
                        </div>
                    </div>
                <?php }
            } else { ?>
                <p>No hay salones con la capacidad ingresada.</p>
            <?php } ?>

        </div>
        <!-- Campo oculto para almacenar la imagen seleccionada -->
        <input type="hidden" name="imagen_salon" id="imagen_salon_seleccionada">

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
        </div>
    </form>
</div>

<script src="app-organizar.js"></script>
<script>
    document.querySelectorAll('input[type="radio"][name="salon_seleccionado"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var imagen = this.getAttribute('data-imagen');
            document.getElementById('imagen_salon_seleccionada').value = imagen;
        });
    });
</script>