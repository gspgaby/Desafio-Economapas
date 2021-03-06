<?php 
require_once "./CLASSES/conexao.php";

Class Grupo{
    public function cadastrarGrupo($grupo_nome, $id_cidade, $id_usuario){
        $pdo = new Conexao();
        if(!$this->buscarGrupoPeloNome($grupo_nome, $id_cidade, $id_usuario)){
            $sql = $pdo->getPDO()->prepare("INSERT INTO grupos(grupo_nome, id_cidade, id_usuario) VALUES (:g, :id_c, :id_u)");
            $sql->bindValue(':g',$grupo_nome);
            $sql->bindValue(':id_c',$id_cidade);
            $sql->bindValue(':id_u',$id_usuario);
            $sql->execute();                
            if($sql->rowCount() > 0){
                $lastId =  $pdo->getPDO()->lastInsertId();
                return array(
                    'tipo' => 1,
                    'id_grupo' => $lastId,
                    'mensagem2' => 'Grupo criado com sucesso.'
                    );
                }
                else{
                    return array(
                        'tipo' => 0,
                        'mensagem' => 'Cadastro do grupo falhou.'
                    );
                }
            }
            else{
                return array(
                    'tipo' => 0,
                    'mensagem' => 'Nome do grupo existente.'
                );
            }        
    }

    public function buscarGrupos(){ 
        $pdo = new Conexao();
        // $sql = $pdo->getPDO()->prepare("SELECT G.*,C.cidade FROM grupos G left join cidades C on G.id_cidade = C.id_cidade");
        $sql  = $pdo->getPDO()->prepare("SELECT * FROM grupos");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    private function buscarGrupoPeloNome($grupo_nome, $id_cidade, $id_usuario){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE grupo_nome = '$grupo_nome' AND id_usuario = '$id_usuario'");
        $sql->execute();
        if($sql->rowCount() > 0) {
            return true;
        }
        else{
            return false;
        }
    }  

    public function buscarGrupoPeloId($id_grupo){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE id_grupo = :id");
        $sql->bindValue(':id', $id_grupo);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function buscarGrupoPeloUsuario($id_usuario){
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("SELECT * FROM grupos WHERE id_usuario = :id_u");
        $sql->bindValue(':id_u',$id_usuario);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function editarGrupo($id_grupo,$id_cidade,$grupo_nome){ 
        $pdo = new Conexao();
        $sql = $pdo->getPDO()->prepare("UPDATE grupos SET grupo_nome = :g, id_cidade = :id_c WHERE id_grupo = :id");
        $sql->bindValue(':id', $id_grupo);
        $sql->bindValue(':id_c',$id_cidade);
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