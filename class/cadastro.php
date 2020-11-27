<?php
  class Cadastro{

    // Conexão ao banco de dados
    private $conn;

    // Tabela do banco de dados
    private $db_table = "cadastros";

    
    // conecta a base de dados
    public function __construct($db){
        $this->conn = $db;
    }

    public $idVaga;
    public $nome;
    public $email;
    public $telefone;
    public $curriculo;
    

    public function cadastroCurriculo(){
      $sqlQuery = "INSERT INTO
                  ". $this->db_table ."
                  SET
                  idVaga = :idVaga,
                  nome = :nome,
                  email = :email,
                  telefone = :telefone,
                  curriculo = :curriculo";

      $stmt = $this->conn->prepare($sqlQuery);

      // bind data
      $stmt->bindParam(":idVaga", $this->idVaga);
      $stmt->bindParam(":nome", $this->nome);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":telefone", $this->telefone);
      $stmt->bindParam(":curriculo", $this->curriculo);

      if($stmt->execute()){
          return true;
      }
      return false;
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