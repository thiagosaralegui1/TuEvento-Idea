<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Lista de Invitados</title>
</head>
<body onload="window.print()">

<h2>Lista de Invitados</h2>
<ul>
    <?php foreach ($_SESSION['invitados'] as $invitado): ?>
        <li><?= $invitado ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
