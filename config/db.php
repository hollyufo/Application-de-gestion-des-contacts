<?php
session_start();
class Database{
    private $host;
    private $username;  
    private $password;
    private $db ;

    protected function connect(){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db = "contact";

        $conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        return $conn;
    }
} // LES VARIABLE O LES FUNCTION