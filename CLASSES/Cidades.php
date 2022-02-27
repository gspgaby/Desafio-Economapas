<?php
require_once "./CLASSES/conexao.php";

Class Cidade{
  public function buscarCidades(){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("SELECT * FROM cidades");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_OBJ);
  }

  public function editarCidades($id, $uf, $estado, $capital){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("UPDATE cidades SET UF = :uf, ESTADO = :estado, CAPITAL = :capital WHERE id_cidade = :id");
    $sql->bindValue(':uf',$uf);
    $sql->bindValue(':estado',$estado);
    $sql->bindValue(':capital',$capital);
    $sql->bindValue(':id',$id);
    
    return $sql->execute();
  }

  public function excluirCidades($id){

    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("DELETE FROM cidades WHERE id_cidade = {$id}");
    return $sql->execute();
  }
};
?>