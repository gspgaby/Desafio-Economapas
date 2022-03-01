<?php 
require_once "./CLASSES/conexao.php";

Class Grupo{
    public function cadastrarGrupo($grupo_nome, $id_usuario){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("INSERT INTO grupos(grupo_nome, id_usuario) VALUES (:g, :id_usuario)");
        $sql->bindValue(':g',$grupo_nome);
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
    }

    public function buscarGrupoPeloNome($grupo_nome){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE grupo_nome = :g");
        $sql->bindValue(':g',$grupo_nome);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }  

    public function excluiGrupo($id){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupo_nome WHERE id_grupo = :id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
    }

    public function buscarGrupoID($id_grupo){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE id_grupo = '$id_grupo' ")->execute();
        if($sql->rowCount() > 0) {
            $result = $sql->fetch();
            $response['id_grupo'] = $result['id_grupo'];
            $response['grupo_nome'] = $result['grupo_nome'];
            return $response;
        }
    }
}
?>