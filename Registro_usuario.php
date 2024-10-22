<?php require("header.php") ?>


<header class="contenedorDatos">
    <a href="inicio.php"> <img src="imagenes/logo.png"> </a>
</header>


<main class="main2">
    <div class="contieneFormulario">
        <div class="formulario2">
            <h1>Registrate</h1>
            <form action="RF_registro_usr.php" method="POST">
                <div class="datos2">
                    <input type="text" name="nombre" id="nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="datos2">
                    <input type="text" name="apellido" id="apellido" required>
                    <label for="apellido">Apellido</label>
                </div>
                <div class="datos2">
                    <input type="text" name="cedula" id="cedula" required>
                    <label for="nombre">Cedula</label>
                </div>
                <div class="datos2">
                    <input type="text" name="telefono" id="telefono" required>
                    <label for="nombre">Telefono</label>
                </div>
                <div class="datos2">
                    <input type="text" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="datos2">
                    <input type="password" name="pass" id="pass" required>
                    <label for="pass">Contraseña</label>
                </div>
                <div class="datos3">
                    <a href="terminos.php">términos y condiciones</a><input type="checkbox" name="aceptar_terminos" id="aceptar_terminos" required>
                    <label for="aceptar_terminos">

                    </label>
                </div>

                <div class="g-recaptcha" data-sitekey="6LfkhjcqAAAAAKqKDB4Qv1u3ShIUAbdAMPXHBf3t"></div>

                <input type="submit" value="Cargar" name="envio" class="cargar">


                <script src="app.js"></script>
            </form>
        </div>
    </div>
</main>