
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
    <section class="mainCatering">
      <video class="video-background" autoplay muted loop>
        <source src="imagenes/videoFondo1.mp4" type="video/mp4">
      </video>
      <div class="conte_catering">
        <h1>Catering</h1>
        <label for="nombre">Nombre del proveedor</label>
        <br>
        <input class="label" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre...">
        <br>
        <label for="telefono">telefono</label>
        <br>
        <input class="label" type="number" id="tel_catering" name="telefono" min="0" placeholder="Ingrese su telefono...">
        <br>
        <label for="correo electronico">correo electronico</label>
        <br>
        <input class="label" type="text" id="correo" name="correo" placeholder="Ingrese su correo...">
        <br>
        <label  for="Menús disponibles">Menús disponibles (opciones y dietas especiales)</label>
        <br>
        <input class="label" type="text" id="menu" name="menu catering" placeholder="Ingrese el menu...">
        <br>
        <label for="cantidad comida">Cantidad de comida por persona</label>
        <br>
        <input class="label" type="text" id="cant_comida" name="cantidad" placeholder="Ingrese la cantidad...">
        <br>
        <label for="precio">Precio</label>
        <br>
        <input class="label" type="number" id="precio_catering" name="precio" min="0" placeholder="Ingrese el precio...">
        <h2>Tipo de comida</h2>
        <label for="dulce">Dulce</label>
        <br>
        <input type="checkbox" id="tipo" name="tipo comida">
        <br>
        <label for="salado">Salado</label>
        <br>
        <input type="checkbox" id="tipo" name="tipo comida">
        <br>
        <label for="agridulce">Agridulce</label>
        <br>
        <input type="checkbox" id="tipo" name="tipo comida">
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