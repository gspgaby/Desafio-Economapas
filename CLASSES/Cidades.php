<?php
require_once "./CLASSES/conexao.php";

Class Cidade{
  public function buscarCidades(){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("SELECT * FROM cidades");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_OBJ);
  }
};
?>