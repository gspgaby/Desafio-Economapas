<?php
 session_start();
 require_once "./CLASSES/Cidades.php";
 require_once "./CLASSES/Grupos.php";


 if(!isset($_SESSION['id_usuario'])){
   header('Location: index.php');
   exit;
 }

 $Cidade = new Cidade();

 $g = new Grupo();
 $id = isset($_GET["id"]) ? $_GET["id"] : null;
 $id = isset($_GET["ac"]) ? $_GET["ac"] : null;

 if(!empty($id)){
  if($ac == 'excluir'){

    $Grupo->excluirGrupo($id);
  }
 }

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="CSS/areaPrivada.css">
</head>
 
<body>
    <section id="esquerda">
      <form method="post" action="">
        <h2>CADASTRAR GRUPO</h2>
        <label for="grupo">Nome</label>
        <input type="text" name="grupo_nome" id="UF">        
        <input type="submit" value="Cadastrar">
      </form>
    </section>
    <section id="direita">
      <table id="tb-cidades">
        <tr id="titulo">
          <td>NOME</td>
          <td>CIDADE</td>
          <td>AÇÕES</td>
        </tr>
         <?php 
         foreach($Cidade->buscarCidades() as $cidade):
         ?>
          <tr>
            <td></td>
            <td><?php echo $cidade->CAPITAL?></td>
            <td>
              <input class="id-cidade" type="hidden" value="<?php echo $cidade->id_cidade ?>"/>

              <a class="link-editar" href="?ac=editar&id=<?php echo $cidade->id_cidade?>">Editar</a>
              <a class="link-excluir" href="?ac=excluir&id=<?php echo $cidade->id_cidade?>">Excluir</a>
            </td>
          </tr>
         <?php
         endforeach;
         ?>
      </table>
    </section>
    <?php
    if(isset($_POST['grupo_nome'])) {
    $g = addslashes($_POST['grupo_nome']);
    if(!empty($g)){  
        if(!(new grupo())->buscarGrupoPeloNome($g)){
            if($g->cadastrarGrupo($grupo_nome)){
                ?>
                <div class="msg-sucesso">
                    Cadastrado com sucesso.
                </div>
                <?php
            }
            else{
                ?>
                    <div class="msg-erro">
                        Grupo já está cadastrado. Verifique e tente novamente
                </div>
                <?php
            }
        }
    }
    else{
        ?>
            <div class="msg-erro">
                Por favor preencha todos os campos!
            </div>
        <?php
    }
}
?>




</html>