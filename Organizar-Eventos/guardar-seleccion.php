<?php
session_start();
require_once("conexion-organizar.php");

if (!isset($_SESSION['email'])) {
    header("Location: ../ingreso-login.php");
    exit();
}

$email = $_SESSION['email'];

// Procesar selección de salón
if (isset($_POST['salon_seleccionado']) && isset($_POST['imagen_salon'])) {
    $salon_seleccionado = $_POST['salon_seleccionado'];
    $imagen_salon = $_POST['imagen_salon'];
    $inv_tot = $_POST['totalinvitados'];

    // Comprobar si ya existe una selección
    $queryCheck = "SELECT * FROM selecciones_evento WHERE email = '$email'";
    $resultCheck = pg_query($con, $queryCheck);

    if (pg_num_rows($resultCheck) > 0) {
        // Actualizar la selección existente
        $query = "UPDATE selecciones_evento SET salon_seleccionado = '$salon_seleccionado', imagen_salon = '$imagen_salon', total_invitados = '$inv_tot' WHERE email = '$email'";
    } else {
        // Insertar nueva selección
        $query = "INSERT INTO selecciones_evento (email, salon_seleccionado, imagen_salon, total_invitados) VALUES ('$email', '$salon_seleccionado', '$imagen_salon', '$inv_tot')";
    }

    if (!pg_query($con, $query)) {
        echo "Error en la consulta: " . pg_last_error($con);
        exit();
    }

    // Redirigir a la página de catering después de seleccionar el salón
    header("Location: organizar-catering.php");
    exit();
}

// Procesar selección de catering
if (isset($_POST['catering_seleccionado'])) {
    $catering_seleccionado = $_POST['catering_seleccionado'];

    // Actualizar la selección de catering en la tabla
    $query = "UPDATE selecciones_evento SET catering_seleccionado = '$catering_seleccionado' WHERE email = '$email'";
    pg_query($con, $query);
    
    // Redirigir a la página del DJ después de seleccionar el catering
    header("Location: organizar-dj.php");
    exit();
}

// Omitir catering
if (isset($_POST['omit_catering'])) {
    // Redirigir a la página del DJ si se omite el catering
    header("Location: organizar-dj.php");
    exit();
}

// Procesar selección de DJ
if (isset($_POST['dj_seleccionado'])) {
    $dj_seleccionado = $_POST['dj_seleccionado'];

    // Actualizar la selección de DJ en la tabla
    $query = "UPDATE selecciones_evento SET dj_seleccionado = '$dj_seleccionado' WHERE email = '$email'";
    pg_query($con, $query);

    // Redirigir a la página del fotógrafo después de seleccionar el DJ
    header("Location: organizar-fotografo.php");
    exit();
}

// Omitir DJ
if (isset($_POST['omit_dj'])) {
    // Redirigir a la página del fotógrafo si se omite el DJ
    header("Location: organizar-fotografo.php");
    exit();
}

// Procesar selección de fotógrafo
if (isset($_POST['camarografo_seleccionado'])) {
    $camarografo_seleccionado = $_POST['camarografo_seleccionado'];

    // Actualizar la selección de fotógrafo en la tabla
    $query = "UPDATE selecciones_evento SET camarografo_seleccionado = '$camarografo_seleccionado' WHERE email = '$email'";
    pg_query($con, $query);

    // Redirigir a la página de bebidas después de seleccionar el fotógrafo
    header("Location: organizar-bebidas.php");
    exit();
}

// Omitir fotógrafo
if (isset($_POST['omit_fotografo'])) {
    // Redirigir a la página de bebidas si se omite el fotógrafo
    header("Location: organizar-bebidas.php");
    exit();
}

// Procesar selección de bebidas
if (isset($_POST['bebidas_seleccionadas'])) {
    $bebidas_seleccionadas = $_POST['bebidas_seleccionadas'];

    // Actualizar la selección de bebidas en la tabla
    $query = "UPDATE selecciones_evento SET bebidas_seleccionadas = '$bebidas_seleccionadas' WHERE email = '$email'";
    pg_query($con, $query);

    // Redirigir a la página de cotillón después de seleccionar bebidas
    header("Location: organizar-cotillon.php");
    exit();
}

// Omitir bebidas
if (isset($_POST['omit_bebidas'])) {
    // Redirigir a la página de cotillón si se omite las bebidas
    header("Location: organizar-cotillon.php");
    exit();
}

// Procesar selección de cotillón
if (isset($_POST['cotillon_seleccionado'])) {
    $cotillon_seleccionado = $_POST['cotillon_seleccionado'];

    // Actualizar la selección de cotillón en la tabla
    $query = "UPDATE selecciones_evento SET cotillon_seleccionado = '$cotillon_seleccionado' WHERE email = '$email'";
    pg_query($con, $query);

    // Redirigir a la página de resultados después de seleccionar cotillón
    header("Location: mostrar-resultados.php");
    exit();
}

// Omitir cotillón
if (isset($_POST['omit_cotillon'])) {
    // Redirigir a la página de resultados si se omite el cotillón
    header("Location: mostrar-resultados.php");
    exit();
}

// Si no se selecciona nada, redirigir a una página de error o inicio
header("Location: error.php");
exit();
?>
