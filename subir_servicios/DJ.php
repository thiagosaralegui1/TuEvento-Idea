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
  <form action="datos_servocios.php" method="post">
    <section class="mainDJ">
      <video class="video-background" autoplay muted loop>
        <source src="imagenes/videoFondo1.mp4" type="video/mp4">
      </video>
      <div class="conte_dj">
        <h1>DJ</h1>
        <label for="nombre">Nombre completo o nombre artistico</label>
        <br>
        <input  class="label" type="text" id="nombre_DJ" name="nombre DJ" placeholder="Ingrese su nombre...">
        <br>
        <label for="telefono">Telefono</label>
        <br>
        <input class="label" type="number" id="tel_DJ" name="telefono DJ" min="0" placeholder="Ingrese su telefono...">
        <br>
        <label for="email">Correo electrónico</label>
        <br>
        <input class="label" type="email" id="email_DJ" name="email_DJ" placeholder="Ingrese su correo...">
        <br>
        <label for="equipo">Equipos que ofrece (sonido, luces, etc)</label>
        <br>
        <input class="label" type="text" id="euipo" name="equipo" placeholder="Ingrese el equipo...">
        <br>
        <label for="disponibilidad">disponibilidad</label>
        <br>
        <input class="label" type="text" id="dispo" name="disponibillidad" placeholder="Ingrese la disponibilidad...">
        <br>
        <label for="duracion_servicio">Duración del servicio (en horas)</label>
        <br>
        <input class="label" type="number" id="duracion_servicio" name="duracion_servicio" min="0" placeholder="Ingrese la duración...">
        <br>
        <label for="precio">Precio</label>
        <br>
        <input class="label" type="number" id="Precio" name="Precio" min="0" placeholder="Ingrese el precio...">
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