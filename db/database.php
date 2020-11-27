<?php
  class Database {
    private $host = "127.0.0.1";
    private $port = 3306;
    private $database_name = "empregafacil";
    private $username = "root";
    private $password = "root";

    public $conn;

    public function getConnection(){
      $this->conn = null;
      try{
        $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database_name, $this->username, $this->password);
        $this->conn->exec("set names utf8");
      }catch(PDOException $exception){
        echo "Database could not be connected: " . $exception->getMessage();
      }
      return $this->conn;
    }
  }
?>