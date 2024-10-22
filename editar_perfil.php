
<?php require("header.php"); ?>
<?php require("validar_sesion.php"); ?>
<header class="contenedorDatos">
    <a href="inicio.php"> <img src="imagenes/logo.png"> </a>
</header>

<main class="main2">
    <div class="contieneFormulario">
        <div class="formulario2">
            <h1>Cambiar Datos de Usuario</h1>
            <form action="RF_edit_usr.php" method="POST">
    <div class="datos2">
        <input type="text" name="nombre" id="nombre">
        <label for="nombre">Nombre</label>
    </div>
    <div class="datos2">
        <input type="text" name="apellido" id="apellido">
        <label for="apellido">Apellido</label>
    </div>
    <div class="datos2">
        <input type="text" name="telefono" id="telefono">
        <label for="telefono">Teléfono</label>
    </div>

    <!-- Campo para la contraseña actual -->
    <div class="datos2">
        <input type="password" name="pass_actual" id="pass_actual" required>
        <label for="pass_actual">Contraseña Actual</label>
    </div>

    <!-- Campo para la nueva contraseña -->
    <div class="datos2">
        <input type="password" name="pass_nueva" id="pass_nueva">
        <label for="pass_nueva">Nueva Contraseña</label>
    </div>

    <input type="submit" value="Guardar Cambios" name="envio" class="cargar">
</form>

        </div>
    </div>
</main>

<?php require("footer.php"); ?>