<!DOCTYPE html>
<html lang="en">
<?php require("../validar_sesion.php"); 
require("../header.php");?>
<?php
include("datos_servicios.php");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <form action="datos_servicios.php" method="POST" enctype="multipart/form-data">
    <section class="mainCamarografo">

      <video class="video-background" autoplay muted loop>
        <source src="imagenes/videoFondo1.mp4" type="video/mp4">
      </video>
      <div class="conte_camarografo">
        <h1>Camarografo</h1>
        <label for="nombre">Nombre</label>
        <br>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre..." required>
        <br>
        <label for="telefono">telefono</label>
        <br>
        <input type="number" id="tel_foto" name="tel_foto" min="0" placeholder="Ingrese su telefono..." required>
        <br>
        <label for="correo electronico">correo electronico</label>
        <br>
        <input type="text" id="correo" name="correo" placeholder="Ingrese su correo..." required>
        <br>
        <label for="descripcion">descripcion</label>
        <br>
        <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción..." required>
        <br>
        <label for="precio">Precio</label>
        <br>
        <input type="number" id="precio" name="precio" min="0" placeholder="Ingrese el precio..." required>
        <br>
        <br>
        <input type="submit" id="enviar" name="enviar_camara" value="Enviar">
        <a href="servicios.php">
          <input type="button" id="cancelarCamara" name="cancelarCamara" value="Cancelar">
        </a>
      </div>
    </section>
  </form>
  <script src="app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>