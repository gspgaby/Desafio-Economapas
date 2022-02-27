<?php

Class Conexao{
  private $pdo;
  public $msgErro = "";
  private $nome = "desafio_economapas";
  private $host = "localhost";
  private $usuario = "root";
  private $senha = "";

  public function getPDO(){
    return $this->conectar();
  }
  
  private function conectar(){
    try{
      $this->pdo = new PDO("mysql:dbname=".$this->nome.";host=".$this->host, $this->usuario, $this->senha);
    }
    catch(PDOException $e){
      $this->msgErro = $e->getMessage();
      printf("<div class=\"msg-erro\">{$this->msgErro}</div>");
    }
    return $this->pdo;
  }
}

?>