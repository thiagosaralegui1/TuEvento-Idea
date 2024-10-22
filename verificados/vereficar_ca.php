<?php require("validar_sesion.php"); ?>

<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_camarografo = (int)$_POST['id_camarografo'];

    if ($_POST['action'] == 'verificar') {

        $query_verificar = "UPDATE camarografo SET verificado = 1 WHERE id_camarografo = $id_camarografo"; 
        $result_verificar = pg_query($con, $query_verificar);

        if ($result_verificar) {
            echo "Camarógrafo verificado correctamente.";
        } else {
            echo "Error al verificar al camarógrafo: " . pg_last_error($con);
        }
    } elseif ($_POST['action'] == 'cancelar') {
        
        $query_eliminar = "DELETE FROM camarografo WHERE id_camarografo = $id_camarografo"; 
        $result_eliminar = pg_query($con, $query_eliminar);

        if ($result_eliminar) {
            echo "Camarógrafo eliminado correctamente.";
        } else {
            echo "Error al eliminar al camarógrafo: " . pg_last_error($con);
        }
    }
}

pg_close($con);
?>
