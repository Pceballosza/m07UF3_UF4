<?php
session_start();
include '../controladores/ClaseJugador.php';
//comprovarIntentos();
if(!isset($_SESSION['intentos'])){
    $_SESSION['intentos']=0;
}
$preguntaJugador = new ClaseJugador(10,$_SESSION['intentos']);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>

<body>

    <div class="ejercicio">
        <h1>Te adivino un numero</h1>
        <p>El rango es de 1 - 10</p>
        <p> El numero es: <?php /*adivinarNum(10)*/ $preguntaJugador->adivinarNum($preguntaJugador->get_max())?></p>
        <p>Intentos: <?php $preguntaJugador-> imprimirIntentos(); ?></p>
        
        <form method="post">
            <input type="submit" name="operador" class="button" value="Menor"/> 
            <input type="submit" name="operador" class="button" value="Igual"/> 
            <input type="submit" name="operador" class="button" value="Mayor"/> 
        </form>
        <?php $preguntaJugador->volverAtras(); ?>
        <p> <?php $preguntaJugador-> mensajeCorrecto(); ?></p>
    </div>
    <div id="enlaceTabla">
        <a href="/M07PHP_UF3/tabla.php">
        <input class="button" id="linkTabla" type="button" name="linkTabla" value="linkTabla" />        
        </a>      
    </div>

</body>

</html>
