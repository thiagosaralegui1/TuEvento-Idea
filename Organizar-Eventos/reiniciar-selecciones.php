<?php


session_start();
require_once("conexion-organizar.php");

if (!isset($_SESSION['email'])) {
    header("Location: ../ingreso_login.php");
    exit();
}

$email = $_SESSION['email'];

// Borrar las selecciones del evento para el usuario
$queryDelete = "DELETE FROM selecciones_evento WHERE email = '$email'";
$resultDelete = pg_query($con, $queryDelete);

if ($resultDelete) {
    header("Location: organizar-invitados.php");
    exit();
} else {
    header("Location: error.php");
}
?>