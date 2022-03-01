<?php
 session_start();
 require_once "./CLASSES/Grupos.php";

 if(!isset($_SESSION['usuario'])){
   header('Location: index.php');
   exit;
 }

 $Grupo = new Grupo();
?>

<?php ?>
<a href="sair.php">Sair</a>
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
      <table id="tb-grupo">
        <tr id="titulo">
          <td>GRUPOS</td>
          <td>AÇÕES</td>
        </tr>
         <?php 
         foreach($Grupo->buscarGrupos() as $grupo_nome):
         ?>
          <tr>
            <td><?php echo $grupo_nome->grupo_nome?></td>
            <td>
              <a class="link-editar" href="?ac=editar&id=<?php echo $grupo_nome->grupo_nome?>">Editar</a>
              <a class="link-excluir" href="?ac=excluir&id=<?php echo $grupo_nome->grupo_nome?>">Excluir</a>
            </td>
          </tr>
         <?php
         endforeach;
         ?>
      </table>

    <?php
    if(isset($_POST['grupo_nome'])) {
    $g = addslashes($_POST['grupo_nome']);
    if(!empty($g)){  
        if(!(new Grupo())->buscarGrupoPeloNome($g)){
            if((new Grupo())->cadastrarGrupo($g)){
                ?>
                <div class="msg-sucesso">
                    Grupo cadastrado com sucesso.
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