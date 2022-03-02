<?php 
require_once "./CLASSES/conexao.php";

Class Grupo{
    public function cadastrarGrupo($grupo_nome){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("INSERT INTO grupos(grupo_nome) VALUES (:g)");
        $sql->bindValue(':g',$grupo_nome);
        return $sql->execute();  
    }

    public function buscarGrupos(){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function buscarGrupoPeloNome($grupo_nome){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE grupo_nome = :g");
        $sql->bindValue(':g',$grupo_nome);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }  

    public function buscarGrupoPeloId($id_grupo){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE id_grupo = :id");
        $sql->bindValue(':id', $id_grupo);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function editarGrupo($id_grupo,$grupo_nome){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("UPDATE grupos SET grupo_nome = :g WHERE id_grupo = :id");
        $sql->bindValue(':id', $id_grupo);
        $sql->bindValue(':g',$grupo_nome);
        $sql->execute();
    }  

    public function excluiGrupo($id_grupo){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("DELETE FROM grupos WHERE id_grupo = :id");
        $sql->bindValue(':id', $id_grupo);
        $sql->execute();
    }
}
?>