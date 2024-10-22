<?php require("../header.php"); ?>
<?php require("../validar_sesion.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="contieneServicios">
    <div class="tituloServicios">
      <h1>vereficar servicios <br> 
    <i style="font-size: 20px;">Administrador</i></h1>
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Servicios
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" onclick="redirigir1('salon_v')">salon</a></li>
          <li><a class="dropdown-item" onclick="redirigir1('dj_v')">DJ</a></li>
          <li><a class="dropdown-item" onclick="redirigir1('catering_v')">catering</a></li>
          <li><a class="dropdown-item" onclick="redirigir1('cotillon_v')">cotillon</a></li>
          <li><a class="dropdown-item" onclick="redirigir1('bebidas_v')">bebidas</a></li>
          <li><a class="dropdown-item" onclick="redirigir1('camarografo_v')">camarografo</a></li>
        </ul>
      </div>
    </div>
  </div>

  <script>


    function redirigir1(servicio) {
      let url = '';

      switch (servicio) {
        case 'salon_v':
          url = 'salon_v.php';
          break;
        case 'dj_v':
          url = 'dj_v.php';
          break;
        case 'catering_v':
          url = 'catering_v.php';
          break;
        case 'cotillon_v':
          url = 'cotillon_v.php';
          break;
        case 'bebidas_v':
          url = 'bebidas_v.php';
          break;
        case 'camarografo_v':
          url = 'camarografo_v.php';
          break;
      }

      window.location.href = url;
    }
  </script>

</body>

</html>




<?php

?>