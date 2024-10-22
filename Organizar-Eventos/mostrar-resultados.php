<?php
session_start(); // Inicia la sesión
include("header.php");
require_once("conexion-organizar.php");

if (!isset($_SESSION['email'])) {
    header("Location: ../ingreso_login.php");
    exit();
}

// Almacena el email del usuario
$email = $_SESSION['email'];
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

<main class="fondo">
    <div class="contenedor-flex-resultados">
        <div class="muestra-resultados">
            <h2>¡Creaste tu evento!</h2>
            <div class="seleccion">
                <h3 style="font-size: 25px;">Estas fueron tus selecciones</h3>
                <?php
                // Consulta para obtener todas las selecciones del usuario
                $query = "SELECT salon_seleccionado, imagen_salon, catering_seleccionado, 
                          dj_seleccionado, camarografo_seleccionado, bebidas_seleccionadas, 
                          cotillon_seleccionado 
                          FROM selecciones_evento WHERE email = '$email'";
                $result = pg_query($con, $query);

                if ($result && pg_num_rows($result) > 0) {
                    $row = pg_fetch_assoc($result);

                    // Mostrar salón
                    if (!empty($row['salon_seleccionado'])) {
                        echo "<div class='seleccion-item tamtit'>";
                        echo "<h4><b>Salón Seleccionado:</b> {$row['salon_seleccionado']}</h4>";
                        echo "<img src='{$row['imagen_salon']}' alt='Imagen del salón' class='imagen-salon'>";
                        echo "</div>";
                    }

                    // Mostrar catering
                    if (!empty($row['catering_seleccionado'])) {
                        echo "<h4><b>Catering Seleccionado:</b> {$row['catering_seleccionado']}</h4>";
                    }

                    // Mostrar DJ
                    if (!empty($row['dj_seleccionado'])) {
                        echo "<h4><b>DJ Seleccionado:</b> {$row['dj_seleccionado']}</h4>";
                    }

                    // Mostrar camarógrafo
                    if (!empty($row['camarografo_seleccionado'])) {
                        echo "<h4><b>Camarógrafo Seleccionado:</b> {$row['camarografo_seleccionado']}</h4>";
                    }

                    // Mostrar bebidas
                    if (!empty($row['bebidas_seleccionadas'])) {
                        echo "<h4><b>Bebidas Seleccionadas:</b> {$row['bebidas_seleccionadas']}</h4>";
                    }

                    // Mostrar cotillón
                    if (!empty($row['cotillon_seleccionado'])) {
                        echo "<h4><b>Cotillón Seleccionado:</b> {$row['cotillon_seleccionado']}</h4>";
                    }
                } else {
                    echo "<p>No se encontraron selecciones para este usuario.</p>";
                }
                ?>
            </div>
        </div>

        <div class="contenedor-presupuesto">
            <h2 class="presupuesto1">Presupuesto:</h2>
            <p class="opac" style="text-align: left;">Se creó un presupuesto en base a tus selecciones</p>

            <?php
            $total = 0;

            // Función para calcular el precio de un servicio
            function obtenerPrecio($con, $tabla, $columna, $seleccion)
            {
                $query = "SELECT precio FROM $tabla WHERE $columna = '$seleccion'";
                $result = pg_query($con, $query);
                if ($result && pg_num_rows($result) > 0) {
                    $row = pg_fetch_assoc($result);
                    return $row['precio'];
                }
                return 0;
            }

            // Calcular precios y sumarlos al total
            $precioSalon = obtenerPrecio($con, 'salon', 'nombre_salon', $row['salon_seleccionado']);
            echo "<p class='tam-precio'><b>Precio Salón:</b> $$precioSalon</p>";
            $total += $precioSalon;

            $precioCatering = obtenerPrecio($con, 'catering', 'nombre', $row['catering_seleccionado']);
            echo "<p class='tam-precio'><b>Precio Catering:</b> $$precioCatering</p>";
            $total += $precioCatering;

            $precioDJ = obtenerPrecio($con, 'dj', 'nombre', $row['dj_seleccionado']);
            echo "<p class='tam-precio'><b>Precio DJ:</b> $$precioDJ</p>";
            $total += $precioDJ;

            $precioCamarografo = obtenerPrecio($con, 'camarografo', 'nombre', $row['camarografo_seleccionado']);
            echo "<p class='tam-precio'><b>Precio Camarógrafo:</b> $$precioCamarografo</p>";
            $total += $precioCamarografo;

            $precioBebidas = obtenerPrecio($con, 'bebidas', 'nombre', $row['bebidas_seleccionadas']);
            echo "<p class='tam-precio'><b>Precio Bebidas:</b> $$precioBebidas</p>";
            $total += $precioBebidas;

            $precioCotillon = obtenerPrecio($con, 'cotillon', 'nombre', $row['cotillon_seleccionado']);
            echo "<p class='tam-precio'><b>Precio Cotillón:</b> $$precioCotillon</p>";
            $total += $precioCotillon;

            // Mostrar total
            echo "<h3><b>Total:</b> $$total</h3>";
            ?>
            <p style="margin-top: 20px; font-size:20px;">Volvemos a recordar que todos estos son precios estimativos, recomendamos contactar con los proveedores para detallar su evento y que pueda darles un presupuesto exacto</p>
            <div class="boton-reiniciar">
                <form action="reiniciar-selecciones.php" method="post">
                    <button type="submit"><i class="fa-solid fa-rotate-right"></i> Reiniciar Selecciones</button>
                </form>
            </div>
            <div class="boton-back-home-resultados">
                <a href="../inicio_usuario.php">
                    <button><i class="fa-solid fa-house"></i> Volver al inicio</button>
                </a>
            </div>
        </div>
    </div>
</main>
<script src="lib-confettis/confetti.js"></script>
    <script>
        const start = () => {
            setTimeout(function() {
                confetti.start()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stop = () => {
            setTimeout(function() {
                confetti.stop()
            }, 6000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };

        start();
        stop();
    </script>