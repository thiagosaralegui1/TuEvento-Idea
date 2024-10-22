<?php require("../validar_sesion.php"); ?>
<?php require("../header.php"); ?>
<?php
include("../conexion.php");


$query_salon = "SELECT * FROM salon WHERE verificado = 0";
$result_salon = pg_query($con, $query_salon);

if (!$result_salon) {
    echo "Error al realizar la consulta: " . pg_last_error($con);
    exit;
}
echo "<div class='contiene-Verificacion'>";
if (pg_num_rows($result_salon) > 0) {
  
    while ($row = pg_fetch_assoc($result_salon)) {
        echo "<div class='salon'>";
        echo "<h2>" . htmlspecialchars($row['nombre_salon']) . "</h2>";
        $fotos = explode(',', $row['fotos']);
        if (!empty($fotos)) {
            echo "<div class='salon-fotos'>";
            foreach ($fotos as $foto) {
                echo "<img src='uploads/" . htmlspecialchars(trim($foto)) . "' alt='Foto de " . htmlspecialchars($row['nombre_salon']) . "' class='salon-img'>";
            }
            echo "</div>";  
        }
        echo "<div class='datos-verificar'>";
        echo "<p> <b>Dirección:</b> " . htmlspecialchars($row['direccion']) . "</p>";
        echo "<p> <b>Teléfono: </b>" . htmlspecialchars($row['telefono']) . "</p>";
        echo "<p> <b>Capacidad: </b>" . (int)$row['capacidad'] . " personas</p>";
        echo "<p> <b>Medida: </b>" . (float)$row['medida'] . " m²</p>";
        echo "<p> <b>Precio: $</b>" . (float)$row['precio'] . "</p>";
        echo "<p> <b>Servicio incluido: </b>" . ($row['serv_incluido'] == 'TRUE' ? 'Sí' : 'No') . "</p>";
        echo "<form method='POST' action='verificar_s.php'>";
        echo "<input type='hidden' name='id_salon' value='" . (int)$row['id_salon'] . "'>";
        echo "<button type='submit'>Verificar</button>";
        echo "<button type='submit' name='action' value='cancelar'>Cancelar</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>"; // Cierra el contenedor del salón
    }
    
} else {
    echo "No se encontraron salones pendientes.";
}
echo "</div>";
pg_close($con);
?>
