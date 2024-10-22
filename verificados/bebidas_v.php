<?php require("../header.php"); ?>
<?php require("../validar_sesion.php"); ?>
<?php
include("../conexion.php");

// Consulta para obtener las bebidas no verificadas
$query_bebidas = "SELECT * FROM bebidas WHERE verificado = 0";
$result_bebidas = pg_query($con, $query_bebidas);

if (!$result_bebidas) {
    echo "Error al realizar la consulta: " . pg_last_error($con);
    exit;
}

// Contenedor general que agrupa todas las bebidas
echo "<div class='contiene-Verificacion'>";

if (pg_num_rows($result_bebidas) > 0) {
    while ($row = pg_fetch_assoc($result_bebidas)) {
        // Contenedor de cada bebida con la clase 'salon' para aplicar el estilo
        echo "<div class='salon'>";
        echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";

        // Mostrar información de la bebida
        echo "<p><b>Teléfono: </b>" . htmlspecialchars($row['telefono']) . "</p>";
        echo "<p><b>Correo: </b>" . htmlspecialchars($row['correo']) . "</p>";
        echo "<p><b>Especialidad: </b>" . htmlspecialchars($row['especialidades']) . "</p>";
        echo "<p><b>Con alcohol: </b>" . ($row['con_alcohol'] == 'TRUE' ? 'Sí' : 'No') . "</p>";
        echo "<p><b>Sin alcohol: </b>" . ($row['sin_alcohol'] == 'TRUE' ? 'Sí' : 'No') . "</p>";
        echo "<p><b>Precio: </b>$" . (float)$row['precio'] . "</p>";

        // Botón para verificar la bebida
        echo "<form method='POST' action='vereficar_b.php'>";
        echo "<input type='hidden' name='id_bebida' value='" . (int)$row['id_bebidas'] . "'>";
        echo "<button type='submit'>verificar</button>";
        echo "<button type='submit' name='action' value='cancelar'>Cancelar</button>"; 
        echo "</form>";
        echo "</div>"; // Cierra el contenedor de la bebida
    }
} else {
    echo "No se encontraron servicios de bebidas pendientes.";
}

echo "</div>"; // Cierra el contenedor general de las bebidas
pg_close($con);
?>
