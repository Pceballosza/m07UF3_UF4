<?php
include './controladores/ClaseJugador.php';
include './controladores/ClaseMaquina.php';
$objJugador = new ClaseJugador(null,null);
$objMaquina = new ClaseMaquina(null,null);

   $data = intval($_GET['q']);
    if(isset($data)){
        switch ($data){
        case 1:
            $data = $objJugador->getSelectDb();
            break;
        case 2:
           $data = $objJugador->getSelectModalitat("Pregunta Maquina");
            break;
        case 3:
            $data = $objJugador->getSelectModalitat("Pregunta Jugador");
            break;
        
        
        }
        
    }

?>


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
        