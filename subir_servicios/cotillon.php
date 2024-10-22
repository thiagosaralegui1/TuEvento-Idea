
<?php require("../validar_sesion.php"); 
require("../header.php");?>
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
    <section class="mainCotillon">
      <video class="video-background" autoplay muted loop>
        <source src="imagenes/videoFondo1.mp4" type="video/mp4">
      </video>
      <div class="conte_cotillon">
        <h1>Cotillon</h1>
        <label for="nombre">Nombre del proveedor</label>
        <br>
        <input class="label" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre...">
        <br>
        <label for="Descripción">Descripción del servicio <br>(tipos de artículos y temáticas)</label>
        <br>
        <input class="label" type="text" id="descripcion" name="descripcion cotillon" placeholder="Ingrese la descripción...">
        <br>
        <label for="telefono">telefono</label>
        <br>
        <input class="label" type="number" id="tel_catering" name="telefono" min="0" placeholder="Ingrese el telefono...">
        <br>
        <label for="correo electronico">correo electronico</label>
        <br>
        <input class="label" type="text" id="correo" name="correo" placeholder="Ingrese su correo...">
        <br>
        <label for="precio">Precio</label>
        <br>
        <input class="label" type="number" id="precio_catering" name="precio" min="0" placeholder="Ingrese el precio...">
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