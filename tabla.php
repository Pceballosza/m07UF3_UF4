<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
include './controladores/ClaseJugador.php';
include './controladores/ClaseMaquina.php';
$objJugador = new ClaseJugador(null,null);
$objMaquina =new ClaseMaquina(null,null);

    
  $data = $objJugador->getSelectDb();

  
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TABLA</title>
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <script src="peticionAjax.js"></script>
    </head>
    <body>
        <h1 id="h1Tabla">Tabla</h1>
        
        <div id="campoFiltros">

            <form action="/M07PHP_UF3/tabla.php" method="post">
                <input type="text" name="buscadorID">
                <!--BUSCAR ID -->
                <button type="submit" class="button" id="busquedaID" value="buscarID" name="buscarID">Buscar por ID
                   <?php 
                   //MODO PROC
                   if(isset($_POST['buscarID']) && isset($_POST['buscadorID'])){
                    $id = $_POST['buscadorID'];
                    $data = $objMaquina->searchContenido($id);
                    }
                   ?>

                </button>
                <!--BORRAR ID -->
                
                <button type="submit" class="button" id="borrarID" value="borrarID" name="borrarID"> Borrar por ID
                   <?php 
                   //MODO PRC
                   if(isset($_POST['borrarID']) && isset($_POST['buscadorID'])){
                       $id = $_POST['buscadorID'];
                       $objMaquina->deleteContenido($id);
                       $data = $objMaquina->getSelectDb();
                    }
                   ?>

                </button>
                <!--BUSCAR MAQUINA -->
                <button type="submit" class="button" id="busquedaMaquina" value="buscarMaquina" name="buscarMaquina">Buscar por Maquina
                   <?php 
                   //MODO OOP
                    if(isset($_POST['buscarMaquina'])){
                        $data = $objJugador->getSelectModalitat("Pregunta Maquina");
                    }
                   ?>

                </button>
                <!--BUSCAR JUGADOR -->
                <button type="submit" class="button" id="busquedaJugador" value="buscarJugador" name="buscarJugador">Buscar por Jugador
                   <?php 
                   //MODO OOP
                   if(isset($_POST['buscarJugador'])){
                    $data = $objJugador->getSelectModalitat("Pregunta Jugador");
                    }
                   ?>
                    
                </button>            
            </form>
            <form>
                <select name="users" onchange="showUser(this.value)">
                    <option value="1">Filtra Todos</option>
                    <option value="2">Filtra por Maquina</option>
                    <option value="3">Filtra por Jugador</option>
                </select>
            </form>

            
        </div>
        <div id="divOverflow">
         <table border="1">
             <thead>
                 <tr id="valorKey">
                     <td >ID</td>
                     <td>MODALITAT</td>
                     <td>NIVELL</td>
                     <td>INTENTS</td>
                     <td>DATA</td>
                 </tr>
             </thead>
             <?php 
           foreach ($data as $key) :?>
             <tr class="fila">
                    <th class="col"><?= $key['id'] ?></th>
                    <th class="col"><?= $key['modalitat'] ?></th>
                    <th class="col"><?= $key['nivell'] ?></th>
                    <th class="col"><?= $key['intents'] ?></th>
                    <th class="col"><?= $key['datas'] ?></th>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
        
        <form action="/M07PHP_UF3/index.php" method="post">
            <button class="button btnVolver" id="volver">Volver</button>
        </form>
    </body>
</html>
