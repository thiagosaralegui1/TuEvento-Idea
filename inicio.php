<?php
session_start();

if (isset($_SESSION['email'])  == true) {
    header('Location: inicio_usuario.php');  // valida si esta iniciado sesion y te redirige al usuario parab
    exit;
}



?>

<?php
include("header.php")
?>

<body>
    <div class="contenedor">
        <div class="header">
            <header>
                <nav>
                <div class="logo">
                        <img src="imagenes/TUEVENTO-Mejor1-removebg-preview.png" alt="">
                    </div>
                    <div class="MenuList">
                        <ul id="menuList" class="espacioul" style="padding-left: 0;">

                            <li><a style="color:rgb(8, 95, 129) ;" class="usuario" id="#" href="">Inicio</a></li>
                            <li><a style="color: rgb(8, 95, 129);" class="usuario" href="#crearEvento">Crea tu evento</a></li>
                            <li><a style="color: rgb(8, 95, 129);" class="usuario" href="#crearEvento">Lista de Invitados</a></li>


                            <li class="liIniciaSesion" style="margin-left: 8rem;"><a class="usuario" href="ingreso_login.php">
                                    <svg style="margin-bottom: 6px;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#050563d5">
                                        <path d="M343-470ZM80-120v-480l320-240 215 162q-25 3-47 11.5T526-644l-126-96-240 180v360h160v80H80Zm320 0v-76q0-21 10.5-39.5T439-265q46-27 96.5-41T640-320q54 0 104.5 14t96.5 41q18 11 28.5 29.5T880-196v76H400Zm86-80h308q-35-20-74-30t-80-10q-41 0-80 10t-74 30Zm154-160q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T680-480q0-17-11.5-28.5T640-520q-17 0-28.5 11.5T600-480q0 17 11.5 28.5T640-440Zm0 240Z" />
                                    </svg>Inicia Sesión</a></li>
                            <li><a class="usuario" href="Registro_usuario.php">
                                    <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#050563d5">
                                        <path d="M720-400v-120H600v-80h120v-120h80v120h120v80H800v120h-80Zm-360-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56 5T360-560Zm0-80Zm0 400Z" />
                                    </svg>Registrate</a></li>

                        </ul>

                        <!-- inicio crearEvento -->
                    </div>
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
    <div class="contenedor-lista-invitados">
        <div class="lista-inv">
            <a href="Lista/lista-invitados.php"><button class="boton-inv grow_ellipse"> Crea la lista de invitados para tu fiesta </button></a>
        </div>
    </div>




    <script>
        let menuList = document.getElementById("menuList")
        menuList.style.maxHeight = "0px";

        function toggleMenu() {
            if (menuList.style.maxHeight == "0px") {
                menuList.style.maxHeight = "300px";
            } else {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap"> </script>

    <?php require("footer.php"); ?>