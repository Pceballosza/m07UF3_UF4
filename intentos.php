<?php 
session_start();

function borrarEstadisticas(){
    unset($_SESSION['intentosMaquina'], $_SESSION['intentosJugador']);
}


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Intentos</title>
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <div id="estadisticas">
            <!--
            <p>Intentos Jugador:  <?php// echo  $_SESSION['intentosJugador'] ?></p> 
             <br>
             <p>Intentos Maquina: <?php //echo $_SESSION['intentosMaquina'] ?></p> -->
            
            
            <?php if(!isset($_SESSION['intentosJugador']) && !isset($_SESSION['intentosMaquina'])){
                     echo "<h1 id='noStats'>No hay estadisticas disponibles</h1>";
                  }  
                  elseif(isset($_SESSION['intentosJugador']) && !isset($_SESSION['intentosMaquina'])){
                    echo "<h1>Intentos:</h1>";
                    echo "<p>Intentos Jugador: ". $_SESSION['intentosJugador'] ."</p>
                          <br>
                          <p>Intentos Maquina: No hay intentos registrados </p>";
                }

                  elseif(!isset($_SESSION['intentosJugador']) && isset($_SESSION['intentosMaquina'])){
                    echo "<h1>Intentos:</h1>";
                    echo "<p>Intentos Jugador: No hay intentos registrados</p>
                          <br>
                          <p>Intentos Maquina: " . $_SESSION['intentosMaquina'] . "</p>";
                }                
                
                else {
                    echo "<h1>Intentos:</h1>";
                    echo "<p>Intentos Jugador: ". $_SESSION['intentosJugador'] ."</p>
                          <br>
                          <p>Intentos Maquina: " . $_SESSION['intentosMaquina'] ."</p>";
                
                    
                    
                }

                
                echo '<a href="/M07PHP_UF3/index.php">
                          <input type="button" name="Volver" value="Volver" class="button"/>        
                      </a>';      
                
             ?> 
             
             <form method="post" action="intentos.php">
                 <br>
                 <input type="submit" value="Borrar" name="borrar" class="button">
             </form>
             
             <?php if(isset($_POST['borrar'])){borrarEstadisticas();} ?>
        </div>
        
    </body>
</html>

<?php ?>
