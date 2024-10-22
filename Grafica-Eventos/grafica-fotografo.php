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
            <h4>Fotografo</h4>
            <p style="text-align: center;">Bienvenido a las estadísticas y datos de los fotografos.<br>
                Estas gráficas muestra una comparación de precios de cada fotográfo</p>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>


        <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ['Foto Studio', 'David Volpe', 'Guille Pagano', 'Guille Coelho', 'Carla y Leo'],
                    datasets: [{
                        label: 'Precio',
                        data: [15000, 10000, 20000, 13000, 15000],
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