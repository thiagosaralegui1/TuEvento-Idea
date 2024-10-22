<?php require("../header.php"); ?>
<?php require("../validar_sesion.php"); ?>
<?php
include("../conexion.php");


$query_catering = "SELECT * FROM catering WHERE verificado = 0";
$result_catering = pg_query($con, $query_catering);

if (!$result_catering) {
    echo "Error al realizar la consulta: " . pg_last_error($con);
    exit;
} 

if (pg_num_rows($result_catering) > 0) {
    while ($row = pg_fetch_assoc($result_catering)) {
        echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";

  
        echo "<p>Teléfono: " . htmlspecialchars($row['telefono']) . "</p>";
        echo "<p>Correo: " . htmlspecialchars($row['correo']) . "</p>";
        echo "<p>Menú disponible: " . htmlspecialchars($row['menu_disponible']) . "</p>";
        echo "<p>Cantidad de personas: " . (int)$row['cant_personas'] . " personas</p>";
        echo "<p>Precio: $" . (float)$row['precio'] . "</p>";
        echo "<p>Dulce: " . ($row['dulce'] == 'TRUE' ? 'Sí' : 'No') . "</p>";
        echo "<p>Salado: " . ($row['salado'] == 'TRUE' ? 'Sí' : 'No') . "</p>";
        echo "<p>Agridulce: " . ($row['agridulce'] == 'TRUE' ? 'Sí' : 'No') . "</p>";


        echo "<form method='POST' action='vereficar_c.php'>";
        echo "<input type='hidden' name='id_catering' value='" . (int)$row['id_catering'] . "'>";
        echo "<button type='submit'>Verificar</button>";
        echo "<button type='submit' name='action' value='cancelar'>Cancelar</button>";
        echo "</form>";

        echo "<hr>"; 
    }
} else {
    echo "No se encontraron servicios de catering pendientes.";
}

pg_close($con);
?>
