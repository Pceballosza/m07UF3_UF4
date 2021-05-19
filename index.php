<?php 
session_start();
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica M07 </title>
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <script src="js.js"></script>
    </head>
    <body>
    <h1 class="menu">GUESS MY NUMBER</h1>
    <div id="body">
        <div class="elegir">
            <h1>Pregunta Maquina</h1>
            <form action="/M07PHP_UF3/rangoMaquina.php" method="post">
                <button class="button">Jugar</button>
            </form>   
        </div>
        <!--  -->
        <div class="elegir">
            <h1>Pregunta Jugador</h1>
            <form action="/M07PHP_UF3/rangoJugador.php" method="post">
                <button class="button">Jugar</button>
            </form>   
        </div>  
        
        <div class="elegir">
            
            <h1>Intentos</h1>
            <form action="/M07PHP_UF3/intentos.php" method="post">
                <button class="button" id="lastElegir">Ver</button>
            </form>
            <h1>Tabla</h1>
            
            <form action="/M07PHP_UF3/tabla.php" method="post">
                <button class="button" id="verTabla">Ver Tabla</button>
            </form>
            <h1>Crud</h1>
            <form action="crudTabla.php">
                <button type="submit" class="button" id="crudTabla" value="crudTabla" name="crudTabla">Ir a CRUD</button>
            </form>
        </div>          
   </div>
    <div>
        <button class="button" id="creditos">Creditos</button>
    </div>
    </body>
</html>
