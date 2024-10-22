
<?php require("../header.php"); ?>
<?php require("../validar_sesion.php"); ?>
<?php
include("../conexion.php");

// Consulta para obtener los cotillones no verificados
$query_cotillon = "SELECT * FROM cotillon WHERE verificado = 0";
$result_cotillon = pg_query($con, $query_cotillon);

if (!$result_cotillon) {
    echo "Error al realizar la consulta: " . pg_last_error($con);
    exit;
}

// Contenedor general que agrupa todos los cotillones
echo "<div class='contiene-Verificacion'>";

if (pg_num_rows($result_cotillon) > 0) {
    while ($row = pg_fetch_assoc($result_cotillon)) {
        // Contenedor de cada cotillón con clase 'salon' para el mismo estilo de presentación
        echo "<div class='salon'>";
        echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";

        // Mostrar información del cotillón
        echo "<p><b>Descripción: </b>" . htmlspecialchars($row['descripcion']) . "</p>";
        echo "<p><b>Teléfono: </b>" . htmlspecialchars($row['telefono']) . "</p>";
        echo "<p><b>Correo: </b>" . htmlspecialchars($row['correo']) . "</p>";
        echo "<p><b>Precio: </b>$" . (float)$row['precio'] . "</p>";

        // Botón para verificar el cotillón
        echo "<form method='POST' action='verificar_co.php'>";
        echo "<input type='hidden' name='id_cotillon' value='" . (int)$row['id_cotillon'] . "'>";
        echo "<button type='submit'>Verificar</button>";
        echo "<button type='submit' name='action' value='cancelar'>Cancelar</button>";
        echo "</form>";
        echo "</div>"; // Cierra el contenedor del cotillón
    }
} else {
    echo "No se encontraron servicios de cotillón pendientes.";
}

echo "</div>"; // Cierra el contenedor general de los cotillones
pg_close($con);
?>
