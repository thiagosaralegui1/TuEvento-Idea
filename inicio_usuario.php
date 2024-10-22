<?php require("header.php");


session_start();

if (isset($_SESSION['root_proveedor'])  == true) {
    header('Location: !!home_proveedor.php');  // valida si esta iniciado sesion y te redirige al usuario parab
    exit;
}







if (!isset($_SESSION['email'])) {
    header("location:ingreso_login.php");
    exit();
} else {

    $email = $_SESSION["email"];
}













?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TuEvento</title>
</head>

<body>


    <div class="contenedor">
        <div class="header">
            <header>
                <nav>
                    <div class="logo">
                        <img src="imagenes/logo.png" alt="">
                    </div>
                    <ul class="listaMenu" id="menuList">
                        <li><a class="inicio" href="">Inicio</a></li>
                        <li><a class="crearEvento" href="#boton-presentacion-siguiente">Crea tu evento</a></li>
                        <button class="buttonPerfil" id="menuButton">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white">
                                <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
                            </svg>
                        </button>
                        <div class="menu" id="userMenu">
                            <?php echo $email ?>
                            <a href="editar_perfil.php">Editar Perfil</a>
                            <a href="!!ingreso_datos.php">Conviertete en proveedor</a><a href="!!ingreso_login_proveedor.php"> Inicia sesion</a>
                            <a href="logout.php">Cerrar sesión</a>
                        </div>
                    </ul>
                    <div class="menu-icon">
                        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
                    </div>
                </nav>
            </header>
        </div>


        <div class="contenedor2">
            <h1>CREA TU EVENTO<br>EN MINUTOS</h1>
        </div>
        <h5>Obtén un presupuesto de manera rápida y sencilla tan solo con unos clics</h5>

        <div class="contenedor3">
            <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">¿Qué es TuEvento?</div>
                <div class="card-body">
                    <p class="card-text">
                        Este sitio simplifica la organización de eventos importantes,
                        como cumpleaños de quince, bodas y fiestas en general. Genera
                        un presupuesto aproximado basado en las preferencias seleccionadas
                        y proporciona el contacto directo de los propietarios de los salones
                        para facilitar la comunicación.
                    </p>
                </div>
            </div>
            <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">¿Cómo funciona TuEvento?</div>
                <div class="card-body">
                    <p class="card-text">
                        Al crear tu evento, se te pedirá la cantidad de invitados y,
                        con base en ello, se te recomendarán servicios como salones,
                        catering, y DJ. Una vez seleccionados todos los servicios, podrás
                        calcular el presupuesto final, detallando todo lo necesario para
                        tener tu evento completamente organizado.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor-servicios">
        <div class="titulovich">
            <h4>Servicios que forman parte de TuEvento</h4>
        </div>
        <h4>Salones</h4>
        <!-- Presentacion -->
        <div class="contenedor-presentacion">

            <!-- Imagenes con width 100% -->
            <div class="diapositivas desvanecer">
                <div class="numerotexto">1 / 3</div>
                <img src="imagenes/Salones/la-camp.jpg" style="width:100%">
                <div class="text">La campaña</div>
            </div>

            <div class="diapositivas desvanecer">
                <div class="numerotexto">2 / 3</div>
                <img src="imagenes/Salones/casa-puerto.jpg" style="width:100%">
                <div class="text">Casa Puerto</div>
            </div>

            <div class="diapositivas desvanecer">
                <div class="numerotexto">3 / 3</div>
                <img src="imagenes/Salones/tata-dav.jpg" style="width:100%">
                <div class="text">Tata David</div>
            </div>

            <!-- Botones de siguiente/anterior -->
            <a class="presentacion-anterior" onclick="plusSlides(-1)">&#10094;</a>
            <a class="presentacion-siguiente" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- Puntos de el slide en el que se encuentra -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <div class="contenedor-boton-detalles">
                <button class="boton-detalles" id="mostrarInfo" type="button">
                    <a class="color-boton-no-bos">Ver más detalles</a>
                </button>
            </div>
            <div id="mostrarDetalles" class="contenedor-detalles" style="display: none;">
                <p class="subtit-det">¿Sobre qué salón estas buscando información?</p>
                <div class="opciones-info" id="detalles">
                    <button class="boton-opcion" type="button" data-info="casaPuerto">Casa puerto</button>
                    <button class="boton-opcion" type="button" data-info="laCamp">La campaña</button>
                    <button class="boton-opcion" type="button" data-info="laCastellana">Tata David</button><br>
                    <button id="cerrarInfo" class="btn-cerrar">X</button>
                </div>
                <div id="infoSalon" class="info-salon" style="margin-top: 20px; font-family: 'Arial', sans-serif; display: none;">
                    <div id="casaPuerto" class="info" style="display: none;">
                        <h3>Casa puerto</h3>
                        <div class="contiene-det">
                            <p class="det2"><b>Descripción:</b> Salón para fiestas y eventos. Para 200 personas max. con mesas, sillas, manteles, aire acondicionado, cocina, parrillero y más. Todo en un entorno natural rodeado de palmeras y variedad de plantas.</p>
                            <p class="det2"><b>Ubicación:</b> Av. Brasil 423</p>
                            <p class="det2"><b>Capacidad:</b> 200</p>
                            <p class="det2"><b>Telefono:</b> 099 740 910 </p>
                            <button type="button" href="Modelo3d.php">Modelo 3D</button>
                        </div>
                    </div>
                    <div id="laCamp" class="info" style="display: none;">
                        <h3>La campaña</h3>
                        <div class="contiene-det">
                            <p class="det2"><b>Descripción:</b> Si quieres que tu fiesta sea única, inolvidable y quede grabada en tus recuerdos, veni a La Campaña. </p>
                            <p class="det2"><b>Ubicación:</b> Av. Las Américas y Rodrigo Nolla</p>
                            <p class="det2"><b>Capacidad:</b> 200</p>
                            <p class="det2"><b>Telefono:</b> 098 785 607</p>
                            <button type="button" href="Modelo3d.php">Modelo 3D</button>
                        </div>
                    </div>
                    <div id="laCastellana" class="info" style="display: none;">
                        <h3>Tata David</h3>
                        <div class="contiene-det">
                            <p class="det2"><b>Descripción:</b> Salón de fiestas ubicado en Paysandú, con gran capacidad</p>
                            <p class="det2"><b>Ubicación:</b> Yapeyú, casi ruta 3</p>
                            <p class="det2"><b>Capacidad:</b> 250</p>
                            <p class="det2"><b>Telefono:</b> 092 215 970</p>
                            <button type="button" href="Modelo3d.php">Modelo 3D</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-hr">
            <hr>
        </div>
        <h4>Catering</h4>
        <!-- Presentacion -->
        <div class="contenedor-presentacion" id="servicios">

            <!-- Imagenes con width 100% -->
            <div class="diapositivas2 desvanecer">
                <div class="numerotexto">1 / 3</div>
                <img src="imagenes/Catering/oliva-y-miel.jpg" style="width:100%">
                <div class="text">Oliva y miel</div>
            </div>

            <div class="diapositivas2 desvanecer">
                <div class="numerotexto">2 / 3</div>
                <img src="imagenes/Catering/reyes.jpg" style="width:100%">
                <div class="text">Reyes</div>
            </div>

            <div class="diapositivas2 desvanecer">
                <div class="numerotexto">3 / 3</div>
                <img src="imagenes/Catering/ximena-callorda.jpg" style="width:100%">
                <div class="text">Ximena Callorda</div>
            </div>

            <!-- Botones de siguiente/anterior -->
            <a class="presentacion-anterior" onclick="plusSlides2(-1)">&#10094;</a>
            <a id="boton-presentacion-siguiente" class="presentacion-siguiente" onclick="plusSlides2(1)">&#10095;</a>
        </div>
        <br>

    </div>

    <div class="contenedor4">
        <div class="contenedor5">
            <h3>Comenzar a crear<br>tu evento con tan solo un click</h3>
            <div id="button3">
                <a href="Organizar-Eventos/organizar-invitados.php" class="btn shadow-effect" id="crearEvento"> Crear evento </a>
            </div>
        </div>
    </div>
    <div class="contenedor-promedios">
        <div class="promedios">
            <h4>Mira las estadísticas de los servicios</h4>
            <p>Selecciona el evento que quieres ver</p>
            <a href="Grafica-Eventos/grafica-salones.php"><button class="boton-grafica">Salones</button></a>
            <a href="Grafica-Eventos/grafica-catering.php"><button class="boton-grafica">Catering</button></a>
            <a href="Grafica-Eventos/grafica-fotografo.php"><button class="boton-grafica">Fotografo</button></a>
            <a href="Grafica-Eventos/grafica-dj.php"><button class="boton-grafica">DJ</button></a>
            <a href="Grafica-Eventos/grafica-cotillon.php"><button class="boton-grafica">Cotillon</button></a>
            <a href="Grafica-Eventos/grafica-bebidas.php"><button class="boton-grafica">Bebidas</button></a>
        </div>
    </div>


    <script>
        const menuButton = document.getElementById("menuButton");
        const userMenu = document.getElementById("userMenu");

        // Asegurarse de que el menú comience cerrado
        userMenu.style.display = "none";

        menuButton.addEventListener("click", function() {
            userMenu.style.display = userMenu.style.display === "block" ? "none" : "block"; // Alternar visibilidad
        });

        // Cerrar el menú si se hace clic fuera de él
        window.addEventListener("click", function(event) {
            if (!menuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.style.display = "none";
            }
        });
    </script>
    <script>
        // Obtiene el elemento HTML con el id "menuList" y lo guarda en la variable "menuList"
        let menuList = document.getElementById("menuList");

        // Inicialmente, establece la altura máxima (maxHeight) del menú como "0px".
        // Esto significa que el menú estará "colapsado" (oculto) cuando se cargue la página.
        menuList.style.maxHeight = "0px";

        // Define una función llamada "toggleMenu" que se ejecutará cada vez que el usuario haga clic en el icono del menú.
        // Esta función alterna (abre o cierra) el menú dependiendo de su estado actual.
        function toggleMenu() {

            // Comprueba si la altura máxima (maxHeight) del menú es actualmente "0px".
            // Si es "0px", significa que el menú está cerrado/oculto, por lo tanto, lo vamos a abrir.
            if (menuList.style.maxHeight == "0px") {

                // Si el menú está cerrado, establece la altura máxima (maxHeight) en "300px",
                // lo que significa que el menú se expandirá y mostrará su contenido.
                menuList.style.maxHeight = "300px";

            } else {

                // Si el menú no está cerrado (es decir, ya está abierto), 
                // establece la altura máxima (maxHeight) de nuevo en "0px" para ocultarlo.
                menuList.style.maxHeight = "0px";
            }
        }
    </script>
    <script>
        let slideIndex1 = 1; // Carrusel 1
        showSlides(slideIndex1);

        let slideIndex2 = 1; // Carrusel 2
        showSlides2(slideIndex2); // Asegúrate de tener una función para este carrusel

        // Next/previous controls para el primer carrusel
        function plusSlides(n) {
            showSlides(slideIndex1 += n);
        }

        // Thumbnail image controls para el primer carrusel
        function currentSlide(n) {
            showSlides(slideIndex1 = n);
        }

        // Muestra las diapositivas del primer carrusel
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("diapositivas");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex1 = 1
            }
            if (n < 1) {
                slideIndex1 = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; // Oculta todas las diapositivas
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", ""); // Remueve la clase activa de todos los puntos
            }
            slides[slideIndex1 - 1].style.display = "block"; // Muestra la diapositiva actual
            dots[slideIndex1 - 1].className += " active"; // Marca el punto actual como activo
        }

        // Next/previous controls para el segundo carrusel
        function plusSlides2(n) {
            showSlides2(slideIndex2 += n);
        }

        // Thumbnail image controls para el segundo carrusel
        function currentSlide2(n) {
            showSlides2(slideIndex2 = n);
        }

        // Muestra las diapositivas del segundo carrusel
        function showSlides2(n) {
            let i;
            let slides2 = document.getElementsByClassName("diapositivas2");
            let dots2 = document.getElementsByClassName("dot2"); // Asegúrate de tener diferentes puntos para el segundo carrusel
            if (n > slides2.length) {
                slideIndex2 = 1
            }
            if (n < 1) {
                slideIndex2 = slides2.length
            }
            for (i = 0; i < slides2.length; i++) {
                slides2[i].style.display = "none"; // Oculta todas las diapositivas
            }
            for (i = 0; i < dots2.length; i++) {
                dots2[i].className = dots2[i].className.replace(" active", ""); // Remueve la clase activa de todos los puntos
            }
            slides2[slideIndex2 - 1].style.display = "block"; // Muestra la diapositiva actual
            dots2[slideIndex2 - 1].className += " active"; // Marca el punto actual como activo
        }
    </script>
    <script>
        //SCRIPT DE SALONES
        // Mostrar el contenedor al hacer clic en "Mostrar Información"
        document.getElementById("mostrarInfo").addEventListener("click", function() {
            var info = document.getElementById("mostrarDetalles");
            info.style.display = "block"; // Muestra el contenedor
        });

        // Ocultar el contenedor al hacer clic en "X"
        document.getElementById("cerrarInfo").addEventListener("click", function() {
            var info = document.getElementById("mostrarDetalles");
            info.style.display = "none"; // Oculta el contenedor
            // Oculta toda la información del salón
            var infos = document.querySelectorAll(".info");
            infos.forEach(function(info) {
                info.style.display = "none";
            });
        });

        // Inicializa los botones de opción después de que se cargue el DOM
        var botonOpciones = document.querySelectorAll(".boton-opcion");
        var infoSalon = document.getElementById("infoSalon");

        // Mostrar información según el botón que se presione
        botonOpciones.forEach(function(boton) {
            boton.addEventListener("click", function() {
                var salonId = this.getAttribute("data-info"); // Obtiene el id del salón
                // Oculta toda la información de los salones
                var infos = document.querySelectorAll(".info");
                infos.forEach(function(info) {
                    info.style.display = "none"; // Oculta todas las informaciones
                });
                // Muestra solo la información correspondiente al salón seleccionado
                var infoSeleccionada = document.getElementById(salonId);
                infoSeleccionada.style.display = "block"; // Muestra la información del salón
                infoSalon.style.display = "block"; // Asegura que el contenedor de información sea visible
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap"></script>


    <?php require("footer.php"); ?>
</body>