
<?php require("validar_sesion.php"); ?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_catering = (int)$_POST['id_catering'];

    if ($_POST['action'] == 'verificar') {
   
        $query_verificar = "UPDATE catering SET verificado = 1 WHERE id_catering = $id_catering"; 
        $result_verificar = pg_query($con, $query_verificar);

        if ($result_verificar) {
            echo "Catering verificado correctamente.";
        } else {
            echo "Error al verificar el catering: " . pg_last_error($con);
        }
    } elseif ($_POST['action'] == 'cancelar') {
      
        $query_eliminar = "DELETE FROM catering WHERE id_catering = $id_catering"; 
        $result_eliminar = pg_query($con, $query_eliminar);

        if ($result_eliminar) {
            echo "Catering eliminado correctamente.";
        } else {
            echo "Error al eliminar el catering: " . pg_last_error($con);
        }
    }
}

pg_close($con);
?>
