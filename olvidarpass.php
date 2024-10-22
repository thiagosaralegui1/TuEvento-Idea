<?php
session_start();
include 'conexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// Limpiar mensajes anteriores
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Verificar si el correo electrónico existe en la base de datos
    $stmt = $con->prepare("SELECT cedula FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generar un token único
        $token = bin2hex(random_bytes(50));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // El token expira en 1 hora

        // Guardar el token y la hora de expiración en la base de datos
        $stmt = $con->prepare("UPDATE usuarios SET token = ?, token_recupery = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expiry, $email);

        if ($stmt->execute()) {
            // Configurar PHPMailer para enviar el correo de restablecimiento
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; 
                $mail->SMTPAuth = true;
                $mail->Username = 'tueventouy0@gmail.com';
                $mail->Password = 'nkww hkab kzat ejka'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Destinatario y contenido del correo
                $mail->setFrom('tueventouy0@gmail.com', 'Restablecimiento de clave | TuEvento!');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Restablecimiento de clave | Encontrando Hogares!';
                $mail->Body = '
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #28a745; /* Color verde */
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            color: #ffffff;
            background-color: #28a745; /* Color verde */
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        a:hover {
            background-color: #218838; /* Color verde más oscuro */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Restablecimiento de Contraseña</h2>
        <p>Para restablecer tu contraseña, haz clic en el siguiente enlace:</p>
        <a href="https://app.tuevento.online/restablecercontrasena.php?token=' . $token . '">Restablecer contraseña</a>
        <p>Este enlace expira en 1 hora.</p>
        <p>Si no solicitaste este cambio, ignora este mensaje.</p>
    </div>
</body>
</html>';

                $mail->send();
                
                // Mensaje de éxito
                $_SESSION['message'] = "<div class='alert alert-success' role='alert'>
                                            Correo enviado. Revisa tu correo para restablecer la contraseña.
                                         </div>";
                header("Location: olvidarpass.php"); // Redirige a la misma página
                exit;
            } catch (Exception $e) {
                $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>
                                            Error al enviar el correo: {$mail->ErrorInfo}.
                                         </div>";
                header("Location: olvidarpass.php"); // Redirige a la misma página
                exit;
            }
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>
                                        No se pudo actualizar el token. Intenta nuevamente.
                                    </div>";
            header("Location: olvidarpass.php"); // Redirige a la misma página
            exit;
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>
                                    Este correo no está registrado.
                                </div>";
        header("Location: olvidarpass.php"); // Redirige a la misma página
        exit;
    }
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h2>Recuperar Contraseña</h2>
        <?php if ($message) echo $message; // Mostrar el mensaje ?>
        <form action="olvidarpass.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Enviar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($message) : ?>
        <script>
            // Redirige después de 3 segundos
            setTimeout(function() {
                window.location.href = 'ingreso_login.php'; // Cambia a la página deseada
            }, 3000);
        </script>
    <?php endif; ?>
</body>
</html>
