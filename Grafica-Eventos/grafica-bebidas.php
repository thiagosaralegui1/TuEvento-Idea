<?php
include("../header.php");
session_start();

// verifica que el usuario ha iniciado sesión y tiene el email guardado
if (!isset($_SESSION['email'])) {
    // si no tiene sesión activa, redirigir a la página de inicio de sesión
    header("Location: ../ingreso_login.php");
    exit();
}

$email = $_SESSION['email']; // obtener el email de la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <main class="graf-general">
        <div class="contenedor-global-graf">
            <h4>Bebidas</h4>
            <p style="text-align: center;">Bienvenido a las estadísticas y datos del servicio de bebidas.<br>
                Estas gráficas muestran una comparación de precios de cada Barra de tragos y distribuidor de bebidas</p>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>


        <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ['Jak Bar', 'M&B Eventos', 'Party Combi Bar', 'Party Cocktails'],
                    datasets: [{
                        label: 'Precio',
                        data: [11000, 11000, 8000, 12000],
                        backgroundColor: [
                            'rgba(66, 134, 244, 0.5)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Permitir que el gráfico se ajuste al tamaño del canvas
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            });
        </script>
        <div class="boton-back-home">
            <a href="../inicio_usuario.php">
                <button><i class="fa-solid fa-house"></i>Volver al inicio</button>
            </a>
        </div>
    </main>
  <!--   <footer>
        <div class="footerInicio">

            <div class="logoFooter">
                <div class="footerImg">
                    <img src="../imagenes/logo.png" class="img2">
                </div>



            </div>
            <div class="contenedorDeNav3">
                <div class="contieneNav3">
                    <a>Empresa</a>
                    <a class="aNav3" href="terminos.php">Terminos y condiciones</a>
                    <a class="aNav3" href="">Politicas de privacidad</a>
                    <a class="aNav3" href="correo.php">Contacto</a>
                    <a class="aNav3" href="nosotros.php">Sobre Nosotros</a>
                </div>
                <div class="contieneNav4">
                    <a>Usuario</a>
                    <a class="aNav3" href="Registro_usuario.php">Regístrate</a>
                    <a class="aNav3" href="ingreso_login.php">Loguéate</a>
                </div>


            </div>
         

            <div class="contieneRedes2">
                <a style="font-weight: bold;">Seguínos en</a>
                <div class="contieneRedes3">
                    <a class="IMG1" href="https://www.facebook.com/share/3JXpmysz1DGpNMsb/?mibextid=qi2Omg" target="_blank" rel="noopener noreferrer">
                        <img src="../imagenes/facebook.png" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/tueventouy_?utm_source=qr&igsh=MTFybG5rYnJmeDMxaA==" target="_blank" rel="noopener noreferrer">
                        <img src="../imagenes/instagram.png" alt="Instagram">
                    </a>
                </div>
            </div>

        </div>
        <div class="contieneFinalFooter">
            <hr class="hrFooter">
            <a>&copy; 2024 TuEvento. Todos los derechos reservados.</a>
        </div>
    </footer> -->
</body>

</html>