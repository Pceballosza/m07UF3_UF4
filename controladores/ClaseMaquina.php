<?php 

require_once 'DatabaseProc.php';
class ClaseMaquina{
    protected $dbconnect;
    private $intentos;
    private $random;
    public $numeroRandom; 
    
    
    function __construct($random,$intentos) {
        $this->random = $random;
        $this->intentos = $intentos;
        $this->dbconnect = new DatabaseProc();
        }
    
    function getIntentos() {
        return $this->intentos;
    }

    function getRandom() {
        return $this->random;
    }
    
    function getNumeroRandom() {
        return $this->numeroRandom;
    }

    function setNumeroRandom($numeroRandom) {
        $this->numeroRandom = $numeroRandom;
    }

    
    function setIntentos($intentos) {
        $this->intentos = $intentos;
    }

    function setRandom($random) {
        $this->random = $random;
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
            if(!isset($_SESSION['intentosMaquina'])){
              $_SESSION['intentosMaquina'] = 0;  
            }
            $_SESSION['intentosMaquina']+=$this->getIntentos();
            
            $this->dbconnect->connect();
            if($this->random == 10) $this->dbconnect->insert("Pregunta Maquina", 1, $_SESSION['intentosMaquina']);
            else if($this->random == 50) $this->dbconnect->insert("Pregunta Maquina", 2, $_SESSION['intentosMaquina']);
            else if($this->random == 100)$this->dbconnect->insert("Pregunta Maquina", 3, $_SESSION['intentosMaquina']);
            $_SESSION['intentosMaquina'] = 0;
            //unset($this->intentos); 
            unset($_SESSION['numeroRand']); 
    } 
}

    function volverAtras(){
    echo '<a href="/M07PHP_UF3/rangoMaquina.php">
              <input class="button" type="button" name="Volver" value="Volver" />        
          </a>';    
}


    function comprovarIntentos(){
        if(!isset($this->intentos)){
            $this->setIntentos(0);
        }
    }
    
    
    function imprimirIntentos(){
            $this->comprovarIntentos();
            if(isset($_POST['numero']) && isset($_SESSION["numeroRand"])){
                if($_POST["numero"] > $_SESSION["numeroRand"]){   
                    $this->setIntentos($_SESSION['intentos2']++);
    
                }        
                if($_POST["numero"] < $_SESSION["numeroRand"]){   
                    $this->setIntentos($_SESSION['intentos2']++);
                }       
        echo $this->intentos;
    }
}



    function randNumero(){
    $rand = mt_rand(1, $this->getRandom());
    $this->numeroRandom = $rand;
    $_SESSION["numeroRand"]=$this->numeroRandom;
}

    function getSelectDb(){
        $this->dbconnect->connect();
        return ($this->dbconnect->selectAll());
    } 
    
    
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