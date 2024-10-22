<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú de Usuario</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a CSS externo -->
    <style>
       
    /* Botón del menú */
    .buttonPerfil {
        background-color: transparent;
        border: none;
        cursor: pointer;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Estilos para el menú */
    .menu {
        display: none; /* Comienza cerrado */
        position: absolute;
        right: 0; /* Se alinea a la derecha del botón */
        top: 50px; /* Espacio entre el botón y el menú */
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        border-radius: 10px; /* Bordes redondeados */
        padding: 15px;
        min-width: 200px; /* Ancho mínimo */
        z-index: 1000; /* Asegura que el menú esté por encima de otros elementos */
    }

    /* Estilos para los elementos del menú */
    .menu a {
        display: block;
        padding: 10px;
        margin: 5px 0;
        color: #333;
        text-decoration: none;
        font-family: 'Arial', sans-serif;
        font-size: 14px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Estilo para los enlaces al pasar el mouse */
    .menu a:hover {
        background-color: #f0f0f0;
    }

    /* Estilo del texto del email */
    .menu p {
        margin: 0;
        padding: 10px;
        color: #666;
        font-family: 'Arial', sans-serif;
        font-size: 14px;
        border-bottom: 1px solid #ddd; /* Línea de separación */
    }

    /* Ajuste para dispositivos móviles */
    @media (max-width: 600px) {
        .menu {
            min-width: 150px;
            padding: 10px;
        }

        .menu a {
            font-size: 12px;
            padding: 8px;
        }
    }
</style>

   
</head>
<body>

<button class="buttonPerfil" id="menuButton"> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/></svg></button>
    <div class="menu" id="userMenu">
        <?php echo $email ?>
        <a href="#configuracion">Configuración</a>
        <a href="logout.php">Cerrar sesión</a>
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

</body>
</html>