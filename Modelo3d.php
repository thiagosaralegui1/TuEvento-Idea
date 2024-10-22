<?php require("validar_sesion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo 3D</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
       



    <style>
        #loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Asegúrate de que esté por encima de todo */
        }
        #canvas {
            display: none; /* Oculta el canvas al inicio */

            
        }
    </style>

<body>
    
<div id="container3D"></div>


    <canvas id="canvas"></canvas>

  





    </main>
    <script type="module" src="main.js"></script>
    <script src="https://cdn.rawgit.com/schteppe/cannon.js/master/build/cannon.js"></script>
    <script src="https://unpkg.com/nipplejs@0.8.4/dist/nipplejs.js"></script>
    <script src="https://threejs.org/examples/jsm/loaders/FontLoader.js"></script>
    

    <script>
    
 </script>
</body>
</html>