<?php
require("conexion.php"); // Asegúrate de incluir tu archivo de conexión

session_start();

if (!isset($_SESSION['email'])) {
    exit('Error: no se ha iniciado sesión correctamente.');
} else {
    $email = $_SESSION['email']; // Usamos el email para identificar el registro
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Conectar a la base de datos
    $con = conectar_bd();

    // Preparar los campos que se van a actualizar
    $fields_to_update = [];

    // Solo agregar los campos que no están vacíos
    if (!empty($_POST['nombre'])) {
        $nombre = pg_escape_string($con, $_POST['nombre']);
        $fields_to_update[] = "nombre = '$nombre'";
    }
    if (!empty($_POST['apellido'])) {
        $apellido = pg_escape_string($con, $_POST['apellido']);
        $fields_to_update[] = "apellido = '$apellido'";
    }
    if (!empty($_POST['telefono'])) {
        $telefono = pg_escape_string($con, $_POST['telefono']);
        $fields_to_update[] = "telefono = '$telefono'";
    }

    // Verificar si se ha introducido la contraseña actual
    if (!empty($_POST['pass_actual'])) {
        $pass_actual = $_POST['pass_actual'];

        // Consultar la contraseña actual desde la base de datos
        $query = "SELECT contraseña FROM usuarios WHERE email = '$email'";
        $result = pg_query($con, $query);
        $row = pg_fetch_assoc($result);

        if ($row) {
            $password_hash = $row['contraseña'];

            // Verificar si la contraseña actual coincide
            if (password_verify($pass_actual, $password_hash)) {

                // Si se ha proporcionado una nueva contraseña
                if (!empty($_POST['pass_nueva'])) {
                    $pass_nueva = password_hash($_POST['pass_nueva'], PASSWORD_BCRYPT);
                    $fields_to_update[] = "contraseña = '$pass_nueva'";
                }

            } else {
                // Contraseña actual incorrecta
                echo "La contraseña actual es incorrecta.";
                exit();
            }

        } else {
            echo "Error al obtener los datos del usuario.";
            exit();
        }
    }

    // Verificar si hay campos para actualizar
    if (count($fields_to_update) > 0) {
        // Unir los campos para la consulta
        $set_clause = implode(", ", $fields_to_update);

        // Crear la consulta SQL de actualización
        $query = "UPDATE usuarios SET $set_clause WHERE email = '$email'";

        // Ejecutar la consulta
        $result = pg_query($con, $query);

        if ($result) {
            echo "Los datos se han actualizado correctamente.";
            
            // Redirigir a la página deseada (por ejemplo, perfil.php)
            header("Location: inicio_usuario.php"); 
            exit();
        } else {
            echo "Error al actualizar los datos: " . pg_last_error($con);
        }
    }
    // Cerrar la conexión
    pg_close($con);
}
?>
