<?php
include("header.php");
session_start();

// verifica que el usuario ha iniciado sesión y tiene el email guardado
if (!isset($_SESSION['email'])) {
    // si no tiene sesión activa, redirigir a la página de inicio de sesión
    header("Location: ../ingreso_login.php");
    exit();
}

$email = $_SESSION['email']; // obtener el email de la sesión
?>
<div class="contenedor">
    <div class="header">

        <body>
            <div class="contenedor">
                <div class="header">
                    <header>
                        <nav>
                            <div class="logo">
                                <img src="imagenes/logo.png" alt="">
                            </div>
                            <ul id="menuList">
                                <li><a class="inicio" href="../inicio.php">Inicio</a></li>
                                <li><a class="crearEvento" href="#crearEvento">Crea tu evento</a></li>
                            </ul>
                            <div class="menu-icon">
                                <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
                            </div>
                        </nav>
                    </header>
                </div>
            </div>
            <h2 class="titulo-organizar">Organizar</h2>
            <div class="grupo-boton" role="group" aria-label="Basic outlined example">
                <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary active">Invitados</button></a>
                <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary">Salones</button></a>
                <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary">Catering</button></a>
                <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary">DJ</button></a>
                <a href="organizar-invitados.php"><button type="button" class="boton-org boton-outline-primary">Fotografo</button></a>
                <a href="organizar-invitados.php"> <button type="button" class="boton-org boton-outline-primary">Bebidas</button></a>
                <a href="organizar-invitados.php"> <button type="button" class="boton-org boton-outline-primary">Cotillon</button></a>
            </div>
            <div class="contenedor-padre">
                <div class="contenedor-funciones">
                    <form action="recibir-datos-salones.php" method="POST">
                        <h3 class="tit-org">Necesitamos saber sobre los invitados de tu evento</h3>
                        <p class="info">Estos datos son importantes para la recomendación de servicios en base a la cantidad de invitados.</p>
                        <p class="opac">(Los valores pueden ser aproximados)</p>
                        <hr>
                        <div class="grupo-input">
                            <label for="totalinvitados">Ingrese la cantidad de invitados total: </label>
                            <input type="number" name="totalinvitados" id="totalinvitados" placeholder="Ingresa cantidad" min="1" max="5000" step="1" required><br>
                            <div class="grupo-botones">
                                <input type="submit" class="envio" value="Enviar">
                                <input type="reset" class="cancelar" value="Cancelar">
                            </div>
                    </form>
                </div>
            </div>