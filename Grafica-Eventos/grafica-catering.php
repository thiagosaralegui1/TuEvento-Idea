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
            <h4>Catering</h4>
            <p style="text-align: center;">Bienvenido a las estadísticas y datos del catering.<br>
                Estas gráficas muestran la capacidad máxima de cada catering</p>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>


        <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ['Pascuariello Catering', 'Ximena Callorda', 'Manjares', 'Oliva y miel', 'Reyes', 'M&B'],
                    datasets: [{
                        label: 'Capacidad máxima',
                        data: [1000, 1000, 800, 1000, 600, 350],
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
  
</body>

</html>