<?php
 session_start();
 require_once "./CLASSES/Usuarios.php";
 require_once "./CLASSES/Cidades.php";
 require_once "./CLASSES/Grupos.php";

 if(!isset($_SESSION['usuario'])){
   header('Location: index.php');
   exit;
 }

  $dados_do_usuario = new Usuario();
  $Cidade = new Cidade();
  $Grupo = new Grupo();
  $id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null ;
  $id_cidade = (isset($_POST['id_cidade'])) ? $_POST['id_cidade'] : null ;
  $grupo_nome = (isset($_POST['grupo_nome'])) ? $_POST['grupo_nome'] : null ;
  if(!empty($grupo_nome)){
    $result = $Grupo->cadastrarGrupo($grupo_nome, $id_cidade, $id_usuario);
    if($result['tipo']){
        echo 'Cadastrado com sucesso';
    }else{
        echo 'Grupo já está cadastrado. Verifique e tente novamente';
    }
  }
 
 $id = isset($_GET["id"]) ? $_GET["id"] : null;
 $ac = isset($_GET["ac"]) ? $_GET["ac"] : null;

 if(!empty($id)){
  if($ac == 'excluir'){

    $Grupo->excluiGrupo($id);
    echo "Excluido com sucesso";
  }
  elseif ($ac == 'salvar'){ 
      $Grupo->editarGrupo($id, $_GET["novo-grupo-nome"]);
      echo "Editado com sucesso";
  }
 }

?>

<?php ?>
<!DOCTYPE html>
    <html>
    
      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Economapas - Grupos</title>
          <link rel="stylesheet" href="CSS/areaPrivada.css">
      </head>
      
      <body>
        <header>
          <div id="background">
            <section id="header-lado-esquerdo">
              <h1>Economapas</h1>
            </section id="header-lado-direito">
              <a href="index.php?sair=true" class="header">Sair</a>
            </section>
          <div>     
        </header>
          <section id="esquerda">
            <form method="post" action="">
              <h2>CADASTRAR GRUPO</h2>
              <label for="grupo">Nome</label>
              <input type="text" name="grupo_nome" id="grupo">
              <label for="id_cidade">CIDADE</label> 
              <select name="id_cidade">
                  <option>Selecione a Cidade</option>
                  <?php 
                    foreach($Cidade->buscarCidades() as $cidade):
                  ?>
                  <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?>"</option>
                  <?php
                    endforeach;
                  ?>
               </select>    
               <select name="id_cidade">
                  <option>Selecione a Cidade</option>
                  <?php 
                    foreach($Cidade->buscarCidades() as $cidade):
                  ?>
                  <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?>"</option>
                  <?php
                    endforeach;
                  ?>
               </select> 
               <select name="id_cidade">
                  <option>Selecione a Cidade</option>
                  <?php 
                    foreach($Cidade->buscarCidades() as $cidade):
                  ?>
                  <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?>"</option>
                  <?php
                    endforeach;
                  ?>
               </select> 
               <select name="id_cidade">
                  <option>Selecione a Cidade</option>
                  <?php 
                    foreach($Cidade->buscarCidades() as $cidade):
                  ?>
                  <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?>"</option>
                  <?php
                    endforeach;
                  ?>
               </select> 
               <select name="id_cidade">
                  <option>Selecione a Cidade</option>
                  <?php 
                    foreach($Cidade->buscarCidades() as $cidade):
                  ?>
                  <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?>"</option>
                  <?php
                    endforeach;
                  ?>
               </select>       
              <button type="submit">Cadastrar</button>
            </form>
          </section>
          <section id="direita">
            <table id="tb-grupo">
              <tr id="titulo">
                <td>GRUPOS</td>
                <td>CIDADES</td>
                <td>CIDADES</td>
                <td>CIDADES</td>
                <td>CIDADES</td>
                <td>CIDADES</td>
                <td>AÇÕES</td>
              </tr>
         <?php 
         foreach($Grupo->buscarGrupos() as $grupo_nome):
          if($ac === 'editar' && $grupo_nome->id_grupo == $id){
            ?>
              <tr>
                <form method="get" action="">
                  <td>
                    <input type="hidden" name="ac" value="salvar">
                    <input type="hidden" name="id" value="<?php echo $grupo_nome->id_grupo?>">
                    <input type="text" name="novo-grupo-nome" value="<?php echo $grupo_nome->grupo_nome?>">
                  </td>
                  <td>
                    <button type="submit" class="link-editar">Salvar</button>
                  </td>
                </form>
              </tr>
              <?php
                } else {
              ?>
              <tr>
                <td>
                  <?php echo $grupo_nome->grupo_nome?>
                </td>
                <td>
                  <?php echo $grupo_nome->id_cidade?>
                </td>
                <td>
                  <a class="link-editar" href="?ac=editar&id=<?php echo $grupo_nome->id_grupo?>">Editar</a>
                  <a class="link-excluir" href="?ac=excluir&id=<?php echo $grupo_nome->id_grupo?>">Excluir</a>
                </td>
              </tr>
            <?php
              }
            ?>          
            <?php
              endforeach;
            ?>
      </table>
    </html>