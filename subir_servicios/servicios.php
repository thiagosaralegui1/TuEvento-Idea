<?php require("../header.php"); ?>


<?php require("../validar_sesion.php"); ?>

<!DOCTYPE html>
<html lang="en">
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


  <header class="contenedorDatos">
    <a href="inicio.php"><img src="imagenes/logo.png" alt=""> </a>
  </header>

  <section>
    
    <div class="contieneServicios">
      <div class="tituloServicios">
        <h1>ingresa tu servicio</h1>
        <div class="dropdown">
          <a  class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Servicios
          </a>
    
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick="redirigir('salones')">salones</a></li>
            <li><a class="dropdown-item" onclick="redirigir('DJ')">DJ</a></li>
            <li><a class="dropdown-item" onclick="redirigir('catering')">catering</a></li>
            <li><a class="dropdown-item" onclick="redirigir('cotillon')">cotillon</a></li>
            <li><a class="dropdown-item" onclick="redirigir('bebidas')">bebidas</a></li>
            <li><a class="dropdown-item" onclick="redirigir('camarografo')">camarografo</a></li>
          </ul>
        </div>
      </div>
    </div>

  </section>
  <script>
    const cajaSalones = document.getElementById("cajaSalon");
    const seleccion = document.getElementById("salones");
    const cancelarSalones = document.getElementById("cancelarSalon");

    seleccion.addEventListener("click", mostrarSalones);
    cancelarSalones.addEventListener("click", ocultarSalones);

    function mostrarSalones() {
      cajaSalones.classList.remove("OcultarSalones");
    }

    function ocultarSalones() {
      cajaSalones.classList.add("OcultarSalones");
    }


    function redirigir(servicio) {
      let url = '';

      switch (servicio) {
        case 'salones':
          url = 'salones.php';
          break;
        case 'DJ':
          url = 'DJ.php';
          break;
        case 'catering':
          url = 'catering.php';
          break;
        case 'cotillon':
          url = 'cotillon.php';
          break;
        case 'bebidas':
          url = 'bebidas.php';
          break;
        case 'camarografo':
          url = 'camarografo.php';
          break;
      }

      window.location.href = url;
    }
  </script>
 <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script> -->
</body>

</html>