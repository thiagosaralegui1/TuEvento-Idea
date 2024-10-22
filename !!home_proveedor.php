
<?php require("header.php");
?>

<body>


    <div style="height: 50rem;" class="contenedor">
        <div class="header">
            <header>
                <nav>
                    <div class="logo">
                        <img src="imagenes/logo.png" alt="">
                    </div>
                    <ul class="listaMenu" id="menuList">
                        <li><a class="inicio" href="">Inicio</a></li>
                        <li><a class="crearEvento" href="#button3">Crea tu evento</a></li>
                        <button class="buttonPerfil" id="menuButton">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white">
                                <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
                            </svg>
                        </button>
                        <div class="menu" id="userMenu">
                            <?php echo $emailProveedor ?>
                            <a href="servicios.php">Ingresar Servicios</a>
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
            <h1>SUBE TU PRODUCTO</h1>
        </div>
        <h5>Aquí podras subir tus servicios de manera Rapida y Segura</h5>
        <div class="contieneBotonProv">
            <a href="subir_servicios/servicios.php" class="btn btn-1"> Sube tu Producto </a>
        </div>
        <div class="contenedor3">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap">
    </script>



    
</body>

<?php require("footer.php"); ?>
