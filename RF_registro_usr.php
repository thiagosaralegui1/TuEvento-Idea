<?php

require("conexion.php");

$con = conectar_bd();

$email = $_POST["email"];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El formato del email es válido.";
} else {
    echo "El formato del email es inválido.";
}

// Comprobar que se envió un formulario por POST desde carga_datos
if (isset($_POST["envio"])) {
    // Atributos usuarios
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $contrasenia = $_POST["pass"];

    if (strlen($contrasenia) < 8) {
        die("La contraseña debe tener al menos 8 caracteres.");
    }
    if (!preg_match('/[0-9]/', $contrasenia)) {
        die("La contraseña debe contener al menos un número.");
    }
    if (!preg_match('/[A-Z]/', $contrasenia)) {
        die("La contraseña debe contener al menos una letra mayúscula.");
    }

    // Consultar si el usuario ya existe
    $existe_usr = consultar_existe_usr($con, $email);

    // Insertar datos si el usuario no existe
    insertar_datos($con, $cedula, $telefono, $nombre, $apellido, $email, $contrasenia, $existe_usr);
}

function consultar_existe_usr($con, $email) {

    $email = pg_escape_string($con, $email); // Escapar los campos para evitar inyección SQL
    $consulta_existe_usr = "SELECT email FROM usuarios WHERE email = '$email'";
    $resultado_existe_usr = pg_query($con, $consulta_existe_usr);

    if (pg_num_rows($resultado_existe_usr) > 0) {
        return true;
    } else {
        return false;
    }
}

function insertar_datos($con, $cedula, $telefono, $nombre, $apellido, $email, $contrasenia, $existe_usr) {

    if ($existe_usr == false) {
       
        $cedula = pg_escape_string($con, $cedula);
        $email = pg_escape_string($con, $email);

        // Encripto la contraseña usando la función password_hash
        $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

        $consulta_insertar = "INSERT INTO usuarios(cedula, telefono, nombre, apellido, email, contraseña) VALUES ('$cedula','$telefono','$nombre','$apellido', '$email', '$contrasenia')";

        if (pg_query($con, $consulta_insertar)) {
            // Redirigir a ingreso_usuario.php si la inserción fue exitosa
            header('Location: ingreso_login.php');
            exit(); // Asegúrate de detener la ejecución del script después de la redirección
        } else {
            echo "Error: " . $consulta_insertar . "<br>" . pg_last_error($con);
        }
    } else {
        echo "El usuario ya existe.";
    }
}

function consultar_datos($con) {
    $consulta = "SELECT * FROM usuarios";
    $resultado = pg_query($con, $consulta);

    // Inicializo una variable para guardar los resultados
    $salida = "";

    // Si se encuentra algún registro de la consulta
    if (pg_num_rows($resultado) > 0) {
        // Mientras haya registros
        while ($fila = pg_fetch_assoc($resultado)) {
            $salida .= "cedula: " . $fila["cedula"] . " - Telefono". $fila["telefono"]. " - Nombre: " . $fila["nombre"] ." - Apellido". $fila["apellido"] ." - Email: " . $fila["email"] . "<br> <hr>";
        }
    } else {
        $salida = "Sin datos";
    }

    return $salida;
}

pg_close($con);

?>
