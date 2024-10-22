<?php require("validar_sesion.php"); ?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_bebida = (int)$_POST['id_bebida'];

    if ($_POST['action'] == 'verificar') {
      
        $query_verificar = "UPDATE bebidas SET verificado = 1 WHERE id_bebida = $id_bebida"; 
        $result_verificar = pg_query($con, $query_verificar);

        if ($result_verificar) {
            echo "Bebida verificada correctamente.";
        } else {
            echo "Error al verificar la bebida: " . pg_last_error($con);
        }
    } elseif ($_POST['action'] == 'cancelar') {
       
        $query_eliminar = "DELETE FROM bebidas WHERE id_bebida = $id_bebida"; 
        $result_eliminar = pg_query($con, $query_eliminar);

        if ($result_eliminar) {
            echo "Bebida eliminada correctamente.";
        } else {
            echo "Error al eliminar la bebida: " . pg_last_error($con);
        }
    }
}

pg_close($con);
?>
