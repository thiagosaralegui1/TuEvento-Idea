<?php require("../header.php"); ?>
<?php require("../validar_sesion.php"); ?>
<?php
include("../conexion.php");

// Consulta para obtener los camarógrafos no verificados
$query_camarografo = "SELECT * FROM camarografo WHERE verificado = 0";
$result_camarografo = pg_query($con, $query_camarografo);

if (!$result_camarografo) {
    echo "Error al realizar la consulta: " . pg_last_error($con);
    exit;
}

// Contenedor general que agrupa todos los camarógrafos
echo "<div class='contiene-Verificacion'>";

if (pg_num_rows($result_camarografo) > 0) {
    while ($row = pg_fetch_assoc($result_camarografo)) {
        // Contenedor de cada camarógrafo con la clase 'salon' para aplicar el estilo
        echo "<div class='salon'>";
        echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";

        // Mostrar información del camarógrafo
        echo "<p><b>Teléfono: </b>" . htmlspecialchars($row['telefono']) . "</p>";
        echo "<p><b>Correo: </b>" . htmlspecialchars($row['correo']) . "</p>";
        echo "<p><b>Descripción: </b>" . htmlspecialchars($row['descripcion']) . "</p>";
        echo "<p><b>Precio: </b>$" . (float)$row['precio'] . "</p>";

        // Botón para verificar el camarógrafo
        echo "<form method='POST' action='verificar_ca.php'>";
        echo "<input type='hidden' name='id_camarografo' value='" . (int)$row['id_camarografo'] . "'>";
        echo "<button type='submit'>Verificar</button>";
        echo "<button type='submit' name='action' value='cancelar'>Cancelar</button>";
        echo "</form>";
        echo "</div>"; // Cierra el contenedor del camarógrafo
    }
} else {
    echo "No se encontraron servicios de camarógrafo pendientes.";
}

echo "</div>"; // Cierra el contenedor general de los camarógrafos
pg_close($con);
?>
