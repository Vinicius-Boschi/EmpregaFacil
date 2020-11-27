<?php
  class Vaga{

    // Conexão ao banco de dados
    private $conn;

    // Tabela do banco de dados
    private $db_table = "vagas";

    
    // conecta a base de dados
    public function __construct($db){
        $this->conn = $db;
    }

    public function listarVagas($idEmpresa){
      $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE idEmpresa = ?";
      $stmt = $this->conn->prepare($sqlQuery);
      $stmt->bindParam(1, $idEmpresa);
      $stmt->execute();
    
      return $stmt;
    }

    public function consultarVaga($id){
      $sqlQuery = "SELECT id, titulo FROM " . $this->db_table . " WHERE id = ?";
      $stmt = $this->conn->prepare($sqlQuery);
      $stmt->bindParam(1, $id);
      $stmt->execute();
      $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

      return $dataRow;
    }
    
  }
?>