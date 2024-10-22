<?php
session_start(); 
require("conexion-organizar.php");

$email = $_SESSION['email']; 

if (!isset($_POST['totalinvitados']) || empty($_POST['totalinvitados'])) {
    header("Location: error-solicitud-reset.php");
    exit;
}

$inv_tot = $_POST['totalinvitados'];

$query = "UPDATE selecciones_evento SET total_invitados = $inv_tot WHERE email = '$email'";
pg_query($con, $query);

include("organizar-salones.php");

function consultar_salones($con, $inv_tot) {
    // trae nombre e imagen de la tabla salones si la capacidad es mayor o igual a los invitados
    $consulta_salones = "SELECT nombre_salon, fotos, capacidad, medida, precio, serv_incluido FROM salon WHERE capacidad >= $inv_tot";
    $resultado_salones = pg_query($con, $consulta_salones);

    // almacena los nombres e imágenes en arrays
    $nombres_salones = [];
    $fotos_salones = [];
    $capacidad_salones = [];
    $medida_salones = [];
    $precio_salones = [];
    $serv_incluidos_salones = [];

    if (pg_num_rows($resultado_salones) > 0) {
        // recorrer los resultados y llenar los arrays
        while ($fila_salones = pg_fetch_assoc($resultado_salones)) {
            $nombres_salones[] = $fila_salones['nombre_salon'];
            $fotos_salones[] = $fila_salones['fotos'];
            $capacidad_salones[] = $fila_salones['capacidad'];
            $medida_salones[] = $fila_salones['medida'];
            $precio_salones[] = $fila_salones['precio'];
            $serv_incluidos_salones[] = ($fila_salones['serv_incluido'] == 't') ? 'Sí' : 'No'; //convierte t o f a Sí y no
        }
    } else {
        // manejar el caso sin resultados
        return array('nombres' => [], 'fotos' => [], 'capacidad' => [], 'medida' => [], 'precio' => [], 'serv_incluido' => []);
    }

    return array('nombres' => $nombres_salones, 'fotos' => $fotos_salones, 'capacidad' => $capacidad_salones, 'medida' => $medida_salones, 'precio' => $precio_salones, 'serv_incluido' => $serv_incluidos_salones);
}


?>
