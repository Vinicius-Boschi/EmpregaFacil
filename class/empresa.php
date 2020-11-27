<?php
  class Empresa{

    // Conexão ao banco de dados
    private $conn;

    // Tabela do banco de dados
    private $db_table = "empresas";

    
    // conecta a base de dados
    public function __construct($db){
        $this->conn = $db;
    }

    // Lista todas as empresas da base de dados
    public function listarEmpresas(){
        $sqlQuery = "SELECT id, nome, descricao FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function consultaEmpresa($id){
      $sqlQuery = "SELECT id, nome, descricao FROM " . $this->db_table . " WHERE id = ?";
      $stmt = $this->conn->prepare($sqlQuery);
      $stmt->bindParam(1, $id);
      $stmt->execute();
      $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

      return $dataRow;
    }

    
  }
?>