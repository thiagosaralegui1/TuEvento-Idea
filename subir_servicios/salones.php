
<?php require("../validar_sesion.php");
require("../header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include("datos_servicios.php");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <form action="datos_servicios.php" method="POST" enctype="multipart/form-data">

    <section class="mainSalones">
      <video class="video-background" autoplay muted loop>
        <source src="imagenes/videoFondo1.mp4" type="video/mp4">
      </video>
      <div class="conte_salon">
        <h1>Salones</h1>
        <label  for="nombre">Nombre del salon</label>
        <br>
        <input class="label" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre..." required>
        <br>
        <label for="direccion">Dirección</label>
        <br>
        <input class="label" type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección...">
        <br>
        <label for="telefono">telefono</label>
        <br>
        <input class="label" type="number" id="tel_s" name="tel_s" min="0" placeholder="Ingrese su telefono..." required>
        <br>
        <label for="capacidad_maxima">Capacidad maxima</label>
        <br>
        <input class="label" type="number" id="capacidad_maxima" name="capacidad" min="0" placeholder="Ingrese la capacidad..." required>
        <br>
        <label for="metros cuadrdos">Medida</label>
        <br>
        <input class="label" type="number" id="medida" name="medida" min="0" placeholder="Ingrese la medida..." required>
        <br>
        <label for="precio">Precio</label>
        <br>
        <input class="label" type="number" id="precio" name="precio" min="0" placeholder="Ingrese el precio..." required>
        <br>
        <label for="serv_incluido">Servicio incluido</label>
        <br>
        <input type="checkbox" id="servinclu" name="servinclu">
        <br>
        <p>En el caso de que sea sí, indique cuál es</p>
        <label for="servicio">Servicio</label>
        <br>
        <input class="label" type="text" id="serv" name="serv" placeholder="Ingrese los servicios...">
        <br>
        
        <label class="labelFotoSalon" for="fotos">Fotos</label>
        <p>Ingrese una foto de tu salon</p>

        <input type="file" id="fotos" name="fotos[]" multiple required>
        
        <br>
        <br>

        <input type="submit" id="enviar" name="enviar_s" value="Enviar">
        
        <a href="servicios.php">
          <input type="button" id="cancelarSalon" name="cancelarSalon" value="Cancelar">
        </a>

      </div>

    </section>
  </form>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>