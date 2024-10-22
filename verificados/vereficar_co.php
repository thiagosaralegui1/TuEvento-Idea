<?php require("validar_sesion.php"); ?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cotillon = (int)$_POST['id_cotillon'];

    if ($_POST['action'] == 'verificar') {
        $query_verificar = "UPDATE cotillon SET verificado = 1 WHERE id_cotillon = $id_cotillon"; 
        $result_verificar = pg_query($con, $query_verificar);

        if ($result_verificar) {
            echo "Cotillón verificado correctamente.";
        } else {
            echo "Error al verificar el cotillón: " . pg_last_error($con);
        }
    } elseif ($_POST['action'] == 'cancelar') {
        $query_eliminar = "DELETE FROM cotillon WHERE id_cotillon = $id_cotillon"; 
        $result_eliminar = pg_query($con, $query_eliminar);

        if ($result_eliminar) {
            echo "Cotillón eliminado correctamente.";
        } else {
            echo "Error al eliminar el cotillón: " . pg_last_error($con);
        }
    }
}

pg_close($con);
?>
