<?php 
session_start();
//include './funcionEsCorrecto.php';
include '../controladores/ClaseMaquina.php';
//$_SESSION["intentos2"] = 0
//$_SESSION;
if(!isset($_SESSION["intentos2"])){
 $_SESSION['intentos2'] = 0;  
   
}
$claseMaquina = new ClaseMaquina(50,$_SESSION["intentos2"]);

if(!isset($_SESSION["numeroRand"])){
    //echo $claseMaquina ->getRandom();
   // $claseMaquina ->setRandom(50);
    
    $claseMaquina ->randNumero();
    
}
echo $claseMaquina->getNumeroRandom();
//echo $_SESSION["numeroRand"];
$claseMaquina -> comprovarIntentos();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>1-10</title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
    </head>
    <body>
        <div class="ejercicio">
            <h1>El rango es de 1-50</h1>
            <form method="post">
                <input class="input" type="number" name="numero" placeholder="dime un numero"/> 
                <input type="submit" name="button1" class="button" value="Preguntar"/> 
            </form>

   
        <p>
         <?php
         if(array_key_exists('button1',$_POST)){
          $claseMaquina ->  esCorrecto();
         }
         ?>
        </p>
        <p>Intentos: <?php $claseMaquina -> imprimirIntentos(); ?></p>     

        <?php $claseMaquina -> volverAtras(); ?>
        </div>
    </body>
</html>
