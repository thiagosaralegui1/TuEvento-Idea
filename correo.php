<?php
require("header.php");
?>

<header class="contenedorDatos">
    <a href="inicio.php"><img src="imagenes/logo.png" alt=""> </a>
</header>
<main class="mainCorreo">
    <div class="contieneFormulario">
        <div id="formularioContactanos" class="formulario">
            <!--Agregar correo-->
            <h1>Contáctanos</h1>
            <!--   <p class="why-contact">Nos encantaría saber de ti. Ya sea para recomendaciones, consultas o simplemente para decir
            hola, ¡estamos aquí para ayudarte!</p>
 -->
            <form action="https://formsubmit.co/3865109db96cf35ed369809efa9057d3" method="POST">
                <div class="datos">
                    <input type="text" name="name" id="name" required>
                    <label for="name">Nombre</label>
                </div>
                <div class="datos">
                    <input type="tel" name="phone" id="phone" required>
                    <label for="phone">Teléfono</label>
                </div>
                <div class="datos">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="datos">
                    <input type="mensaje" name="mensaje" id="mensaje" required>
                    <label for="message">Mensaje</label>
                    <!-- <textarea name="message" id="message" placeholder="Deja tu mensaje" cols="30" rows="5"></textarea> -->
                </div>



                <input class="boton-form" type="submit" value="Enviar">
                <input type="hidden" name="_captcha" value="false">
                <!--Agregar dominio-->
                <input type="hidden" name="_next" value="https://app.tuevento.online">
               

            </form>
        </div>
    </div>
</main>