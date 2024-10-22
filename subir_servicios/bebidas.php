<?php require("../validar_sesion.php");
require("../header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>

<body>
    <form action="datos_servicios.php" method="post">
        <section class="mainBebidas">

            <video class="video-background" autoplay muted loop>
                <source src="imagenes/videoFondo1.mp4" type="video/mp4">
            </video>
            <div class="conte_bebidas">
                <h1>Bebidas</h1>

                <label for="nombre">Nombre del proveedor</label>
                <br>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre...">
                <br>
                <label for="telefono">telefono</label>
                <br>
                <input type="number" id="tel_catering" name="telefono" min="0" placeholder="Ingrese su telefono...">
                <br>
                <label for="correo electronico">correo electronico</label>
                <br>
                <input type="text" id="correo" name="correo" placeholder="Ingrese su correo...">
                <br>
                <label for="descripcion">Especialidades</label>
                <br>
                <input type="text" id="descrip_bebidas" name="descripcion" placeholder="Ingrese la especialidad...">
                <br>
                <label for="alcohol">Con alcohol</label>
                <br>
                <input type="checkbox" id="tipo" name="tipo bebida">
                <br>
                <label for="alcohol">Sin alcohol</label>
                <br>
                <input type="checkbox" id="tipo" name="tipo bebida">
                <br>
                <label for="precio">Precio</label>
                <br>
                <input type="number" id="precio_bebida" name="precio" min="0" placeholder="Ingrese el precio...">
                <br>
                <br>
                <input type="submit" id="enviar" name="enviar" value="Enviar">
                <a href="servicios.php">
                    <input type="button" id="cancelarSalon" name="cancelarSalon" value="Cancelar">
                </a>
            </div>
        </section>
    </form>


</body>

</html>