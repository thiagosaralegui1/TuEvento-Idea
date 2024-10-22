<?php



function conectar_bd(){

    $host = "localhost";
    $dbname = "tuEventoFinal";//pone el nombre de tu base de datos que se tendria que llamar tuEvento en mi caso
    $user = "postgres";
    $password = "12345"; //pone tu contraseña chapuis no la mia 
    
    
    
    $conn = pg_connect("host=localhost dbname=tuEventoFinal user=postgres password=12345");
    
    
    
    if (!$conn) {
        die("Error de conexion " . pg_last_error());
    }
    
    return $conn;
     
    }
    
    
    $con= conectar_bd();



?>