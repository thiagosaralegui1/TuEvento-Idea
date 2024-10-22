<?php require("validar_sesion.php"); ?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_dj = (int)$_POST['id_dj'];

    if ($_POST['action'] == 'verificar') {
       
        $query_verificar = "UPDATE dj SET verificado = 1 WHERE id_dj = $id_dj"; 
        $result_verificar = pg_query($con, $query_verificar);

        if ($result_verificar) {
            echo "DJ verificado correctamente.";
        } else {
            echo "Error al verificar el DJ: " . pg_last_error($con);
        }
    } elseif ($_POST['action'] == 'cancelar') {
      
        $query_eliminar = "DELETE FROM dj WHERE id_dj = $id_dj"; 
        $result_eliminar = pg_query($con, $query_eliminar);

        if ($result_eliminar) {
            echo "DJ eliminado correctamente.";
        } else {
            echo "Error al eliminar el DJ: " . pg_last_error($con);
        }
    }
}

pg_close($con);
?>
