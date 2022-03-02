<?php
require_once "./CLASSES/conexao.php";

Class Cidade{
  public function cadastrarCidade($cidade){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("INSERT INTO cidades (cidade) VALUES (:c)");
    $sql->bindValue(':c',$cidade);
    return $sql->execute();  
}

  public function buscarCidades(){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("SELECT * FROM cidades");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_OBJ);
  }
};
?>