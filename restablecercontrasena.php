<?php
session_start();
include 'conexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Asegúrate de que PHPMailer esté instalado

$message = ''; // Variable para almacenar el mensaje

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $nueva_contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    
    // Verificar el token y su expiración
    $stmt = $con->prepare("SELECT cedula FROM usuarios WHERE token = ? AND token_recupery > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Restablecer la contraseña
        $stmt = $con->prepare("UPDATE usuarios SET contraseña = ?, token = NULL, token_recupery = NULL WHERE token = ?");
        $stmt->bind_param("ss", $nueva_contrasena, $token);
        if ($stmt->execute()) {
            // Mensaje de éxito
            $message = "<div class='alert alert-success' role='alert' style='text-align: center;'>
                            Contraseña actualizada exitosamente.
                        </div>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'ingreso_login.php'; // Redirige después de 3 segundos
                    }, 3000); // 3000 ms = 3 segundos
                  </script>";
        } else {
            // Mensaje de error
            $message = "<div class='alert alert-danger' role='alert' style='text-align: center;'>
                            No se pudo actualizar la contraseña. Intenta nuevamente.
                        </div>";
        }
    } else {
        // Mensaje de token inválido
        $message = "<div class='alert alert-danger' role='alert' style='text-align: center;'>
                        El enlace para restablecer la contraseña no es válido o ha caducado.
                    </div>";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Fondo suave */
        }
        .container {
            max-width: 600px;
            margin-top: 100px; /* Espacio superior */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #28a745; /* Color verde */
        }
        .form-label {
            font-weight: bold; /* Resaltar etiquetas */
        }
        .btn-primary {
            background-color: #28a745; /* Color verde */
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838; /* Verde más oscuro al pasar el mouse */
            border-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Restablecer Contraseña</h2>
        <?php if ($message) echo $message; // Mostrar el mensaje ?>
        <form action="restablecercontrasena.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <div class="mb-3">
                <label for="contrasena" class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Restablecer Contraseña</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
