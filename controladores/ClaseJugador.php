<?php 
$_SESSION['intentosJugador']=0;
require_once 'DatabaseOOP.php';

class ClaseJugador{
        
    private $intentos = 0;
    private $max;
    protected $dbconnect;
    
    function __construct($max,$intentos) {
        $this->max = $max;
        $this->intentos = $intentos;
        $this->dbconnect = new DatabaseOOP();

        
        }
    
    function setMax($max){
        $this->max = $max;
    }
    
    function setIntentos($intentos){
        $this->intentos = $intentos;
    }    
            
    function get_max(){
        return $this->max;
    }
    
    function get_intentos(){
        return $this->intentos;
    }
    
    
    function adivinarNum($max){
    if(!isset($_SESSION["max"])){
        $_SESSION['max'] = $max;
        $_SESSION['min'] = 1;
        $_SESSION['valorMedio'] = $_SESSION['max'] /2;
        $_SESSION['intentos'] = $this->get_intentos();
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
            $_SESSION['intentosJugador']+= $this->get_intentos();
            $cont = 0;
            $this->dbconnect->connect();
            if($_SESSION['max'] == 10) $this->dbconnect->insert("Pregunta Jugador", 1, $_SESSION['intentos']);
            else if($_SESSION['max'] == 50) $this->dbconnect->insert("Pregunta Jugador", 2, $_SESSION['intentos']);
            else if($_SESSION['max'] == 100)$this->dbconnect->insert("Pregunta Jugador", 3, $_SESSION['intentos']);
            
            unset($_SESSION['max']);   
            unset($_SESSION['intentosJugador']);
          
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
  echo '<a href="/M07PHP_UF3/RangoJugador.php">
        <input class="button" id="volver" type="button" name="Volver" value="Volver" />        
    </a>';    
    
}


    function comprovarIntentos(){
    if(!isset($_SESSION["intentosJugador"])){
        $this->setIntentos(0);

    }
}


    function imprimirIntentos(){
    if(isset($_POST['operador'])){
        if($_POST['operador'] == "Menor"){   
            $this->get_intentos($_SESSION['intentos']++);
    
        }        
        if($_POST['operador'] == "Mayor"){   
            $this->get_intentos($_SESSION['intentos']++);
        }
        if($_POST['operador'] == "Igual"){
            $_SESSION['intentos'] = 0;
            $_SESSION['intentos'] = 0;
        }
        
    }
     echo $_SESSION['intentos'];
}


    function getSelectDb(){
        $this->dbconnect->connect();
        return $this->dbconnect->selectAll();
    } 
    
    /**  APARTADO 3 PRACTICA UF_3   **/
    
    function getSelectModalitat($modalitat){
        $this->dbconnect->connect();
        return $this->dbconnect->selectByModalitat($modalitat);
    }
    
    
    function deleteContenido($id){
        $this->dbconnect->connect();
        return $this->dbconnect->delete($id);
    }
    
    function searchContenido($id){
        $this->dbconnect->connect();
        return $this->dbconnect->search($id);
    }
    
}



?>