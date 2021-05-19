<?php

/**
* Implementació de la clase DatabaseConnection segons el model Procedimental.
 *
 * @author Pep
 */
//include_once 'DatabaseConnection.php';
include_once 'DB.php';
class DatabaseProc implements DB{
    private $servername = "localhost";
    private $username = "root";
    private $password = "alumne";
    private $name = "m07uf3";
    

    public function connect(): void {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->name);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
            $this->connection = null;
        }
    }   

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if (mysqli_query($this->connection, $sql)) {
                return mysqli_insert_id($this->connection);
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT * FROM estadistiques ORDER BY id DESC;";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;        
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques WHERE modalitat = '$modalitat';";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }
    
    public function delete($id){
        $sql = "DELETE FROM estadistiques WHERE id = '$id';";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }
    
    public function search($id){
        $sql = "SELECT * FROM estadistiques WHERE id = '$id';";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;         
    }

}