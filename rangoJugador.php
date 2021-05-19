<?php session_start();
unset($_SESSION['intentos']);
unset($_SESSION['max']);

;?>


<html>
    <head>
        <title>Modalidad 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <h1 class="menu">SELECIONA EL RANGO</h1>
        <div class="rango">
            <h1><a class="enlace" href="RangoJugador/preguntaJugador.php">Rango 1 -- 10</a></h1>
            <h1><a class="enlace" href="RangoJugador/preguntaJugador2.php">Rango 1 -- 50</a></h1>
            <h1><a class="enlace" href="RangoJugador/preguntaJugador3.php">Rango 1 -- 100</a></h1>
            <a href="index.php">
              <input type="button" name="Volver" value="Volver" class="button" />        
            </a>            
        </div>
    </body>
</html>
