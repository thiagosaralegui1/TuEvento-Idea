<?php require("../validar_sesion.php"); ?>
<?php 
include("../conexion.php"); 

if (isset($_POST["enviar_s"])) {
    $nombre_salon = pg_escape_string($_POST["nombre"]);
    $direccion = pg_escape_string($_POST["direccion"]);
    $tel_s = pg_escape_string($_POST["tel_s"]); 
    $capmax = (int) $_POST["capacidad"]; 
    $medida = floatval($_POST["medida"]);
    $precio = floatval($_POST["precio"]);
    $serv_incluido = isset($_POST["servinclu"]) ? 'TRUE' : 'FALSE';
    $servicio = pg_escape_string($_POST["serv"]);

    $fotos = $_FILES['fotos'];
    $foto_nombres = [];
    
    if ($fotos && is_array($fotos['tmp_name'])) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        foreach ($fotos['tmp_name'] as $key => $tmp_name) {
            if (!in_array($fotos['type'][$key], $allowed_types)) {
                echo "El archivo " . $fotos['name'][$key] . " no es una imagen válida.";
                exit;
            }
            $filename = basename($fotos['name'][$key]);
           
            $upload_dir = '/var/www/html/Organizar-Eventos/imagenes/salones' . $filename; 
            if (move_uploaded_file($tmp_name, $upload_dir)) {
                $foto_nombres[] = $filename;
            } else {
                echo "Error al subir el archivo " . $filename;
                exit;
            }
        }
    }
    
    $fotos_string = implode(',', $foto_nombres);

    $consulta_insertar_salon = "INSERT INTO salon (nombre_salon, direccion, capacidad, medida, precio, serv_incluido, servicio, fotos, telefono) 
                                VALUES ('$nombre_salon', '$direccion', '$capmax', '$medida', '$precio', $serv_incluido, '$servicio', '$fotos_string', '$tel_s')";

    $result_salon = pg_query($con, $consulta_insertar_salon);
    if ($result_salon) {
        echo "Datos insertados correctamente en la tabla 'salon'.";
    } else {
        echo "Error al insertar los datos en la tabla 'salon': " . pg_last_error($con);
    }
}

// Datos del DJ
if (isset($_POST["enviar_d"])) {

    $nombre_dj = pg_escape_string($_POST["nombre_DJ"]);
    $telefono_dj = pg_escape_string($_POST["telefono_DJ"]); 
    $email_dj = pg_escape_string($_POST["email_DJ"]);
    $duracion_servicio = (int) $_POST["duracion_servicio"]; 
    $precio_dj = floatval ($_POST["precio_d"]);

    $consulta_insertar_dj = "INSERT INTO dj (nombre, telefono, correo, duracion_servicio, precio) 
                              VALUES ('$nombre_dj', '$telefono_dj', '$email_dj', '$duracion_servicio', '$precio_dj')";

    $result_dj = pg_query($con, $consulta_insertar_dj);
    if ($result_dj) {
        echo "Datos insertados correctamente en la tabla 'dj'.";
    } else {
        echo "Error al insertar los datos en la tabla 'dj': " . pg_last_error($con);
    }
} 

// Datos del catering
if (isset($_POST["enviar_c"])) {
    $nombre_c = pg_escape_string($_POST["nombre_c"]);
    $telefono_c = (int) $_POST["tel_c"];
    $email_c = pg_escape_string($_POST["correo_c"]);
    $menu = pg_escape_string($_POST["menu"]);
    $cant_c = (int) $_POST["cant_c"];
    $precio_c = (float) $_POST["precio_c"];
    $dulce = isset($_POST["dulce"]) ? 'TRUE' : 'FALSE';
    $salado = isset($_POST["salado"]) ? 'TRUE' : 'FALSE';
    $agridulce = isset($_POST["agridulce"]) ? 'TRUE' : 'FALSE';

    $consulta_insertar_catering = "INSERT INTO catering (nombre, telefono, correo, menu_disponible, cant_personas, precio, dulce, salado, agridulce) 
                                    VALUES ('$nombre_c', '$telefono_c', '$email_c', '$menu', '$cant_c', '$precio_c', '$dulce', '$salado', '$agridulce')";

    $result_catering = pg_query($con, $consulta_insertar_catering);
    if ($result_catering) {
        echo "Datos insertados correctamente en la tabla 'catering'.";
    } else {
        echo "Error al insertar los datos en la tabla 'catering': " . pg_last_error($con);
    }
}

// Datos del cotillón
if (isset($_POST["enviar_cotillon"])) {
    $nombre = pg_escape_string($_POST["nombre"]);
    $descripcion = pg_escape_string($_POST["descripcion"]);
    $telefono = (int) $_POST["tel_cotillon"];
    $email = pg_escape_string($_POST["correo"]);
    $precio = (float) $_POST["precio_cotillon"];

    $consulta_insertar_cotillon = "INSERT INTO cotillon (nombre, descripcion, telefono, correo, precio) 
                                    VALUES ('$nombre', '$descripcion', '$telefono', '$email', '$precio')";

    $result_cotillon = pg_query($con, $consulta_insertar_cotillon);
    if ($result_cotillon) {
        echo "Datos insertados correctamente en la tabla 'cotillon'.";
    } else {
        echo "Error al insertar los datos en la tabla 'cotillon': " . pg_last_error($con);
    }
}

// Datos de las bebidas
if (isset($_POST["enviar_b"])) {
    $nombre = pg_escape_string($_POST["nombre"]);
    $telefono = (int) $_POST["tel"];
    $email = pg_escape_string($_POST["correo"]);
    $especialidad = pg_escape_string($_POST["especialidad"]);
    $tipo = isset($_POST["tipo"]) ? 'TRUE' : 'FALSE';
    $tipo1 = isset($_POST["tipo1"]) ? 'TRUE' : 'FALSE';
    $precio = (float) $_POST["precio_bebidas"];

    $consulta_insertar_bebidas = "INSERT INTO bebidas (nombre, telefono, correo, especialidades, con_alcohol, sin_alcohol, precio) 
                                   VALUES ('$nombre', '$telefono', '$email', '$especialidad', '$tipo', '$tipo1', '$precio')";

    $result_bebidas = pg_query($con, $consulta_insertar_bebidas);
    if ($result_bebidas) {
        echo "Datos insertados correctamente en la tabla 'bebidas'.";
    } else {
        echo "Error al insertar los datos en la tabla 'bebidas': " . pg_last_error($con);
    }
}

// Datos del camarógrafo
if (isset($_POST["enviar_camara"])) {
    $nombre = pg_escape_string($_POST["nombre"]);
    $telefono = (int) $_POST["tel_foto"];
    $email = pg_escape_string($_POST["correo"]);
    $precio = (float) $_POST["precio"];

    $consulta_insertar_camarografo = "INSERT INTO camarografo (nombre, telefono, correo, precio) 
                                       VALUES ('$nombre', '$telefono', '$email', '$precio')";

    $result_camarografo = pg_query($con, $consulta_insertar_camarografo);
    if ($result_camarografo) {
        echo "Datos insertados correctamente en la tabla 'camarografo'.";
    } else {
        echo "Error al insertar los datos en la tabla 'camarografo': " . pg_last_error($con);
    }
}
?>