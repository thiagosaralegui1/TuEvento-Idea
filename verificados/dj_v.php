<?php require("../validar_sesion.php"); ?>
<?php require("../header.php"); ?>
<?php
include("../conexion.php");

$query_dj = "SELECT * FROM dj WHERE verificado = 0";
$result_dj = pg_query($con, $query_dj);

if (!$result_dj) {
    echo "Error al realizar la consulta: " . pg_last_error($con);
    exit;
}

// Contenedor que agrupa a todos los DJs
echo "<div class='contiene-Verificacion'>";

if (pg_num_rows($result_dj) > 0) {
    while ($row = pg_fetch_assoc($result_dj)) {
        echo "<div class='salon'>";  // Usamos la clase 'salon' para cada DJ (igual que para los salones)
        echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";

        // Mostrar información del DJ
        echo "<p> <b>Teléfono: </b>" . htmlspecialchars($row['telefono']) . "</p>";
        echo "<p><b>Correo: </b>" . htmlspecialchars($row['correo']) . "</p>";
        echo "<p><b>El servicio dura: </b>" . (int)$row['duracion_servicio'] . " horas</p>";
        echo "<p><b>Precio: </b>$" . (float)$row['precio'] . "</p>";

        // Botón para verificar DJ
        echo "<form method='POST' action='dj_v.php'>";
        echo "<input type='hidden' name='id_dj' value='" . (int)$row['id_dj'] . "'>";
        echo "<button type='submit'>Verificar</button>";
        echo "<button type='submit' name='action' value='cancelar'>Cancelar</button>";
        echo "</form>";
        echo "</div>"; // Cierra el contenedor del DJ
    }
} else {
    echo "No se encontraron servicios de DJ pendientes.";
}

echo "</div>"; // Cierra el contenedor general de los DJs
pg_close($con);
?>
 