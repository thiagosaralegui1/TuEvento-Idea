<?php


require("conexion.php");

$con = conectar_bd();



if (isset($_POST["envio_proveedor"])) {
    //Atributos Proveedor
        $nombreProveedor = $_POST["nombreProveedor"];
        $apellidoProveedor = $_POST["apellidoProveedor"];
        $cedulaProveedor = $_POST["cedulaProveedor"];
        $telefonoProveedor = $_POST["telefonoProveedor"];
        $emailProveedor = $_POST["emailProveedor"];
        $root = $_POST["rootProveedor"];
        $contraseniaProveedor = $_POST["passProveedor"];
        $fotoCedulaDELANTERA = $_POST["fotocedulaDELANTERA"];
        $fotoCedulaTRASERA = $_POST["fotocedulaTRASERA"];
    
        // Consultar si el usuario ya existe
        $existe_prov = consultar_existe_prov($con, $emailProveedor);
    
        // Insertar datos si el usuario no existe
        insertar_datos_prov($con,$root,$cedulaProveedor,$nombreProveedor, $apellidoProveedor,$emailProveedor, $contraseniaProveedor,$telefonoProveedor,$fotoCedulaDELANTERA,$fotoCedulaTRASERA, $existe_prov);
    }




 

    function consultar_existe_prov($con, $emailProveedor) {

        $emailProveedor = pg_escape_string($con, $emailProveedor); // Escapar los campos para evitar inyección SQL
        $consulta_existe_prov = "SELECT email FROM proveedor WHERE email = '$emailProveedor'";
        $resultado_existe_prov = pg_query($con, $consulta_existe_prov);
    
        if (pg_num_rows($resultado_existe_prov) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insertar_datos_prov($con,$root,$cedulaProveedor,$nombreProveedor,$apellidoProveedor,$emailProveedor,$contraseniaProveedor,$telefonoProveedor,$fotoCedulaDELANTERA,$fotoCedulaTRASERA,$existe_prov) {

        if ($existe_prov == false) {
           
            $cedulaProveedor = pg_escape_string($con, $cedulaProveedor);
            $emailProveedor = pg_escape_string($con, $emailProveedor);
    
            // Encripto la contraseña usando la función password_hash
            $contraseniaProveedor = password_hash($contraseniaProveedor, PASSWORD_DEFAULT);
    
            $consulta_insertar_prov = "INSERT INTO proveedor(root_proveedor,cedula,nombre,apellido,email,contraseña,telefono,cedula_adelante,cedula_atras) VALUES ('$root','$cedulaProveedor','$nombreProveedor','$apellidoProveedor','$emailProveedor', '$contraseniaProveedor','$telefonoProveedor','$fotoCedulaDELANTERA','$fotoCedulaTRASERA')";
    
            if (pg_query($con, $consulta_insertar_prov)) {
                $salida_prov = consultar_datos_prov($con);
                header("!!home_proveedor.php");
            } else {
                echo "Error: " . $consulta_insertar_prov . "<br>" . pg_last_error($con);
            }
        } else {
            echo "El Proveedor ya existe.";
        }
    }
    
    function consultar_datos_prov($con) {
        $consulta_prov = "SELECT * FROM proveedor";
        $resultado_prov = pg_query($con, $consulta_prov);
    
        // Inicializo una variable para guardar los resultados
        $salida_prov = "";
    
        // Si se encuentra algún registro de la consulta
        if (pg_num_rows($resultado_prov) > 0) {
            // Mientras haya registros
            while ($fila_prov = pg_fetch_assoc($resultado_prov)) {
                $salida_prov .= "Root: " . $fila_prov["root_proveedor"] . " - Cedula". $fila_prov["cedula"]. " - Nombre: " . $fila_prov["nombre"] ." - Apellido". $fila_prov["apellido"] ." - Email: " . $fila_prov["email"] . "<br> <hr>";
            }
        } else {
            $salida_prov = "Sin datos";
        }
    
        return $salida_prov;
    }

    pg_close($con);
