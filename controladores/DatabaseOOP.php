<?php


/**
 * Implementació de la clase DatabaseConnection segons el model OOP,
 * Object Oriented Programming.
 *
 * @author Pep
 */
//include_once 'DatabaseConnection.php';
include_once 'DB.php';
class DatabaseOOP implements DB {

    private $servername = "localhost";
    private $username = "root";
    private $password = "alumne";
    private $name = "m07uf3";
    
    //put your code here
    public function connect(): void {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->name);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if ($this->connection->query($sql) === TRUE) {
                return $this->connection->insert_id;
            } else {
                echo "No funciona";
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT * FROM estadistiques ORDER BY id DESC;";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT * FROM estadistiques WHERE modalitat = '$modalitat';";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }
    
    public function delete($id) {
        $sql = "DELETE * FROM estadistiques WHERE id = '$id';";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }
    public function search($id) {
        $sql = "SELECT * FROM estadistiques WHERE id = '$id';";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }
}