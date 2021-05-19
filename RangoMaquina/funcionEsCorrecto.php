<?php
if(!isset($_SESSION['intentosMaquina'])){
    $_SESSION['intentosMaquina'] = 0;
    
}


function esCorrecto(){    
       if($_POST["numero"] < $_SESSION["numeroRand"]){
        echo "El numero a adivinar es mayor";

    } 
    
    elseif($_POST["numero"] > $_SESSION["numeroRand"]){
        echo "El numero a adivinar es menor";
         
    } 
    
    elseif($_POST["numero"] == $_SESSION["numeroRand"]){
        echo " Enorabuena has adividado el numero: " . $_SESSION["numeroRand"];  
        echo "<form method='post'>
                <input type='submit' name='jugarDeNuevo' class='button' value='Volver a jugar'/>
              </form>";

            $_SESSION['intentosMaquina']+= $_SESSION['intentos2'];
            unset($_SESSION['intentos2']); 
            unset($_SESSION['numeroRand']); 
    } 
}

function volverAtras(){
    echo '<a href="/M07PHP/rangoMaquina.php">
              <input class="button" type="button" name="Volver" value="Volver" />        
          </a>';    
}


function comprovarIntentos(){
    if(!isset($_SESSION["intentos2"])){
        $_SESSION['intentos2'] = 0;
    }
}
function imprimirIntentos(){
            comprovarIntentos();
            
            if(isset($_POST['numero']) && isset($_SESSION['numeroRand'])){
                if($_POST["numero"] > $_SESSION["numeroRand"]){   
                    $_SESSION['intentos2']++;
    
                }        
                if($_POST["numero"] < $_SESSION["numeroRand"]){   
                    $_SESSION['intentos2']++;
                }       
           
        echo $_SESSION['intentos2'];
    }
}



function randNumero($maximo){
    $rand = mt_rand(1,$maximo);
    $_SESSION["numeroRand"]=$rand;
}
?>