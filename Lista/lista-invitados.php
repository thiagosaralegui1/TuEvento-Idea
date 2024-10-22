<?php
session_start();
include("../header.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header('Location: ../../ingreso_login.php'); // Redirigir al login si no está autenticado
    exit();
}

// Inicializamos la lista de invitados si no existe
if (!isset($_SESSION['invitados'])) {
    $_SESSION['invitados'] = [];
}

// Agregar un invitado si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
    $_SESSION['invitados'][] = $_POST['nombre'];
}

// Eliminar un invitado específico
if (isset($_GET['eliminar'])) {
    $index = (int)$_GET['eliminar'];
    unset($_SESSION['invitados'][$index]);
    $_SESSION['invitados'] = array_values($_SESSION['invitados']); // Reindexar
}
?>

<body class="pagina-invitados">
    <div class="contenedor">
        <div class="header">
            <header>
                <nav>
                    <div class="logo">
                        <img src="../imagenes/logo.png" alt="">
                    </div>
                    <ul id="menuList">
                        <li><a class="inicio" href="../../inicio.php">Inicio</a></li>
                        <li><a class="crearEvento" href="#crearEvento">Crea tu evento</a></li>
                    </ul>
                    <div class="menu-icon">
                        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
                    </div>
                </nav>
            </header>
        </div>
    </div>
    <h2 class="titulo-lista">Crear Lista de Invitados</h2>
    <form method="POST" action="lista-invitados.php" class="formulario-invitado">
        <input type="text" name="nombre" placeholder="Nombre del invitado" required class="campo-texto">
        <button type="submit" class="boton-agregar">Agregar</button>
    </form>

    <div class="contenedor-lista">
        <h3 class="subtitulo-lista">Lista de Invitados</h3>
        <ul class="lista-invitados">
            <?php foreach ($_SESSION['invitados'] as $index => $invitado): ?>
                <li class="elemento-invitado">
                    <?= $invitado ?>
                    <a href="lista-invitados.php?eliminar=<?= $index ?>" class="enlace-eliminar">(Eliminar)</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <button onclick="imprimirLista()" class="boton-imprimir">Imprimir Lista</button>

    <script>
        function imprimirLista() {
            window.print(); //abre el documento actual
        }
    </script>

</body>

</html>