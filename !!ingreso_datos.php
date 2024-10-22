

<?php require("header.php") ?>


<header class="contenedorDatos">
    <a href="inicio.php"><img src="imagenes/logo.png" alt=""> </a>
</header>
<main class="mainRegistroProv">
    <div class="contieneFormulario">
        <div class="formularioRegistroProv">
        <h1>Registro <b style="color: rgb(114, 141, 187);">Proovedor</b> </h1>
            <form action="!!RF_registro_prov.php" method="POST">
                <div class="datos">
                    <input type="text" name="nombreProveedor" id="nombreProveedor"required>
                    <label for="nombreProveedor">Nombre</label>
                </div>
                <div class="datos">
                    
                    <input type="text" name="apellidoProveedor" id="apellidoProveedor"required>
                    <label for="apellidoProveedor">Apellido</label>
                </div>
                <div class="datos">
                    <input type="text" name="cedulaProveedor" id="cedulaProveedor" required>
                    <label for="nombreProveedor">Cedula</label>
                </div>
                <div class="datos">
                    <input type="text" name="telefonoProveedor" id="telefonoProveedor"required>
                    <label for="nombreProveedor">Telefono</label>
                </div>
                <div class="datos">
                    <input type="text" name="rootProveedor" id="rootProveedor"required>
                    <label for="rootProveedor">Root de la empresa</label>
                </div>
                <div class="datos">
                    <input type="text" name="emailProveedor" id="emailProveedor"required>
                <label for="emailProveedor">Email</label>
                </div>
                <div class="datos">
                    <input type="password" name="passProveedor" id="passProveedor"required>
                <label for="passProveedor">Pass</label>
                </div>

                <div class="datos">
                    <p>Cédula delantera</p>
                </div>

                <input type="file" name="fotocedulaDELANTERA" class="imageInput" accept="image/*" id="fotocedulaDELANTERA">
                
                <div class="datos">
                    <p>Cédula trasera</p>
                </div>

                <input type="file" name="fotocedulaTRASERA" class="imageInput" accept="image/*" id="fotocedulaTRASERA">

                <input style="margin-top: 15px;" type="submit" value="Cargar" name="envio_proveedor">
            </form>


            <script src="app.js"></script>
            </form>
        </div>
    </div>
</main>
