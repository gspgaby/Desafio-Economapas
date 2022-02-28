<?php 
require_once "./CLASSES/conexao.php";

Class Grupo{
    public function cadastroGrupo($grupo, $id_usuario){
        $pdo = new Conexao();
        if(!$this->verificaNome($grupo, $id_usuario)){
        $sql = $pdo->getPDO()->prepare("INSERT INTO grupos(grupo, id_usuario) VALUES ('$grupo', '$id_usuario')");
        $sql->execute();
        if($sql->rowCount() > 0){
            $lastId = $pdo->lastInsertId();
            return array(
                'tipo' => 1,
                'id_Grupo' => $lastId,
                'mensagem2' => 'Grupo criado com sucesso.'
            );
        }else{
            return array(
                'tipo' => 0,
                'mensagem' => 'Cadastro do grupo falhou.'
            );
        }
        }else{
            return array(
                'tipo' => 0,
                'mensagem' => 'Nome do grupo existente.'
            );
        }
    } 

    public function buscarGrupoPeloUsuario(){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE id_usuario = '$id_usuario'");
        $sql->execute();
        return $sql->fetchObj();
    }  

    public function excluiGrupo($id){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupocidade WHERE id_grupo = '$id'");
        $sql->execute();
    }

    private function verificaNome($grupo, $id_usuario){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE grupo = '$grupo' AND id_usuario = '$id_usuario'");
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function buscarGrupoID($id_grupo){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE id_grupo = '$id_grupo' ")->execute();
        if($sql->rowCount() > 0) {
            $result = $sql->fetch();
            $response['id_grupo'] = $result['id_grupo'];
            $response['grupo'] = $result['grupo'];
            return $response;
        }
    }
}

header('Location: /areaPrivada.php');
?>