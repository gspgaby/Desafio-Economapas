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
  $id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : "" ;
  $id_cidade1 = (isset($_POST['id_cidade1'])) ? $_POST['id_cidade1'] : "";
  $id_cidade2 = (isset($_POST['id_cidade2'])) ? $_POST['id_cidade2'] : "";
  $id_cidade3 = (isset($_POST['id_cidade3'])) ? $_POST['id_cidade3'] : "" ;
  $id_cidade4 = (isset($_POST['id_cidade4'])) ? $_POST['id_cidade4'] : "" ;
  $id_cidade5 = (isset($_POST['id_cidade5'])) ? $_POST['id_cidade5'] : "" ;
  $grupo_nome = (isset($_POST['grupo_nome'])) ? $_POST['grupo_nome'] : "" ;
  $check_post_cidade = false;
  $cidades = "";
  if($id_cidade1 !== ""){
    $check_post_cidade = true;
    $cidades .= $id_cidade1 .",";
  }
  if($id_cidade2 !== ""){
    $check_post_cidade = true;
    $cidades .= $id_cidade2 .",";
  }
  if($id_cidade3 !== ""){
    $check_post_cidade = true;
    $cidades .= $id_cidade3 .",";
  }
  if($id_cidade4 !== ""){
    $check_post_cidade = true;
    $cidades .= $id_cidade4 .",";
  }
  if($id_cidade5 !== ""){
    $check_post_cidade = true;
    $cidades .= $id_cidade5 .",";
  }
  if(!$check_post_cidade){
    ?>
    <div class="msg-erro">
      Preencha pelo menos 1 cidade
    </div>
    <?php
  }
  else{
    if(!empty($grupo_nome)){
      $cidades = substr($cidades, 0, -1);
      $result = $Grupo->cadastrarGrupo($grupo_nome, $cidades, $id_usuario);
      if($result['tipo']){
          ?>
          <div class="msg-sucesso">
              Grupo cadastrado com sucesso.
          </div>
          <?php
      }else{
        ?>
        <div class="msg-erro">
            Grupo já está cadastrado. Verifique e tente novamente
        </div>
    <?php
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
          <link rel="stylesheet" href="CSS/grupo.css">
      </head>
      <body>
        <header class="cabecalho">
            <section id="esquerdo">
              <h1>ECONOMAPAS</h1>
            </section id="direito">
              <a href="index.php?sair=true" class="header">SAIR</a>
            </section>
        </header>
        <section class="conteudo">
            <form method="post" action="">
              <h2>CADASTRAR GRUPO</h2>
              <label for="grupo">NOME</label>
              <input type="text" name="grupo_nome" id="grupo">
              <label for="id_cidade">CIDADE</label>               
                <select name="id_cidade1">
                    <option value="">Selecione a Cidade</option>
                    <?php 
                      foreach($Cidade->buscarCidades() as $cidade):
                    ?>
                    <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?></option>
                    <?php
                      endforeach;
                    ?>
                </select> 
                <select name="id_cidade2">
                    <option value="">Selecione a Cidade</option>
                    <?php 
                      foreach($Cidade->buscarCidades() as $cidade):
                    ?>
                    <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?></option>
                    <?php
                      endforeach;
                    ?>
                </select> 
                <select name="id_cidade3">
                    <option value="">Selecione a Cidade</option>
                    <?php 
                      foreach($Cidade->buscarCidades() as $cidade):
                    ?>
                    <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?></option>
                    <?php
                      endforeach;
                    ?>
                </select>
                <select name="id_cidade4">
                    <option value="">Selecione a Cidade</option>
                    <?php 
                      foreach($Cidade->buscarCidades() as $cidade):
                    ?>
                    <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?></option>
                    <?php
                      endforeach;
                    ?>
                </select> 
                <select name="id_cidade5">
                    <option value="">Selecione a Cidade</option>
                    <?php 
                      foreach($Cidade->buscarCidades() as $cidade):
                    ?>
                    <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->cidade?></option>
                    <?php
                      endforeach;
                    ?>
                </select>
              <button type="submit">CADASTRAR</button>
            </form>
            <table id="tb-grupo">
              <tr id="titulo">
                <td>GRUPOS</td>
                <td>CIDADES</td>
                <td>AÇÕES</td>
              </tr>
            <?php 
              foreach($Grupo->buscarGrupoPeloUsuario($id_usuario) as $grupo_nome):
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
                    <button type="submit" class="link-editar">SALVAR</button>
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
                  <?php
                  if($grupo_nome->id_cidade){
                    $array_cidades = explode(',', $grupo_nome->id_cidade);
                    foreach ($array_cidades as $id_cidade){
                      echo $Cidade->buscarCidadesPorId($id_cidade)->cidade.',';
                     }
                  }
                  ?>
                </td>
                <td>
                  <a class="link-editar" href="?ac=editar&id=<?php echo $grupo_nome->id_grupo?>">EDITAR</a>
                  <a class="link-excluir" href="?ac=excluir&id=<?php echo $grupo_nome->id_grupo?>">EXCLUIR</a>
                </td>
              </tr>
            <?php
              }
            ?>          
            <?php
              endforeach;
            ?>
          </table>
        </section>    
        <footer class="rodape">
          <p>
            &copy; 2022 Economapas Sistemas e Tecnologia Ltda. Desafio Dev-FullStack. Todos os direitos reservados.
          </p>
        </footer>
      </body>
    </html>