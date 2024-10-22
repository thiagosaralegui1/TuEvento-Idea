<?php require("validar_sesion.php"); ?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_salon = (int)$_POST['id_salon'];

    if ($_POST['action'] == 'verificar') {
     
        $query_verificar = "UPDATE salon SET verificado = 1 WHERE id_salon = $id_salon"; 
        $result_verificar = pg_query($con, $query_verificar);

        if ($result_verificar) {
            echo "Salón verificado correctamente.";
        } else {
            echo "Error al verificar el salón: " . pg_last_error($con);
        }
    } elseif ($_POST['action'] == 'cancelar') {
  
        $query_eliminar = "DELETE FROM salon WHERE id_salon = $id_salon"; 
        $result_eliminar = pg_query($con, $query_eliminar);

        if ($result_eliminar) {
            echo "Salón eliminado correctamente.";
        } else {
            echo "Error al eliminar el salón: " . pg_last_error($con);
        }
    }
}

pg_close($con);
?>
