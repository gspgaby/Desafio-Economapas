<?php

require_once "./CLASSES/conexao.php";

Class Usuario{

  public function cadastrar($usuario, $email, $senha){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
    $sql->bindValue(':e',$email);
    $sql->execute();
    if($sql->rowCount() > 0){
      return false;
    }
    else{
      $sql = $pdo->getPDO()->prepare("INSERT INTO usuarios (usuario, email, senha) VALUES (:u, :e, :s)");
      $sql->bindValue(':e',$email);
      $sql->bindValue(':u',$usuario);
      $sql->bindValue(':s',md5($senha));
      $sql->execute();
      return true;
    }
  }

  public function logar($usuario, $senha){
    $pdo = new Conexao();
    $sql = $pdo->getPDO()->prepare("SELECT id_usuario FROM usuarios WHERE usuario = :u AND senha = :s");
    $sql->bindValue(':u',$usuario);
    $sql->bindValue(':s',md5($senha));
    $sql->execute();
    if($sql->rowCount() > 0){
      $dado = $sql->fetch();
      session_start();
      $_SESSION['id_usuario'] = $dado['id_usuario'];
      return true;
    }
    else{
      return false;
    }    
  }
};
?>