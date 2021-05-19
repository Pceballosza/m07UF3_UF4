<?php
if(!isset($_SESSION['intentosJugador'])){
    $_SESSION['intentosJugador'] = 0;
    
}



function adivinarNum($max){
    if(!isset($_SESSION["max"])){
        $_SESSION['max'] = $max;
        $_SESSION['min'] = 1;
        $_SESSION['valorMedio'] = $_SESSION['max'] /2;
        
    }

       
    if(isset($_POST['operador'])){
        if($_POST['operador'] == "Menor"){
       
            $_SESSION['max'] = $_SESSION['valorMedio']; 

            $_SESSION['valorMedio'] = intval($_SESSION['min'] + (($_SESSION['max'] - $_SESSION['min'])/2));  
        }        
    }
    if(isset($_POST['operador'])){
        if($_POST['operador'] == "Mayor"){
            if(!($_SESSION['valorMedio'] >= $_SESSION['max'])){
                
                $_SESSION['min'] = ($_SESSION['valorMedio']+1); 
                $_SESSION['valorMedio'] = intval($_SESSION['min'] + (($_SESSION['max'] - $_SESSION['min'])/2));
            }
        }        
    }

    if(isset($_POST['operador'])){
        if($_POST['operador'] == "Igual"){  
            
            $_SESSION['intentosJugador']+= $_SESSION['intentos'];
            unset($_SESSION['max']);            
            }      
    }    
    
    echo $_SESSION['valorMedio'];
    
} 

function mensajeCorrecto(){
    if(isset($_POST['operador'])){
        if($_POST['operador'] == "Igual"){
            echo "<p class='respuesta'> He adivinado el numero: ".$_SESSION['valorMedio'] . "</p>";              
            }      
    } 
    
}


function volverAtras(){
  echo '<a href="/M07PHP/RangoJugador.php">
        <input class="button" id="volver" type="button" name="Volver" value="Volver" />        
    </a>';    
    
}


function comprovarIntentos(){
    if(!isset($_SESSION["intentos"])){
        $_SESSION['intentos'] = 0;

    }
}

function imprimirIntentos(){
    if(isset($_POST['operador'])){
        if($_POST['operador'] == "Menor"){   
            $_SESSION['intentos']++;
    
        }        
        if($_POST['operador'] == "Mayor"){   
            $_SESSION['intentos']++;
    
        }
        
    }
     echo $_SESSION['intentos'];
}
?>