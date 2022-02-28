<?php
 session_start();
 require_once "./CLASSES/Cidades.php";
 require_once "./CLASSES/Grupos.php";


 if(!isset($_SESSION['id_usuario'])){
   header('Location: index.php');
   exit;
 }

 $Cidade = new Cidade();

 $Grupo = new Grupo();
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
      <form method="post">
        <h2>CADASTRAR GRUPO</h2>
        <label for="grupo_nome">Nome</label>
        <input type="text" name="UF" id="UF">
        <label for="cidade">Cidade</label>
        <select name="id_cidade" id="id_cidade" >
            <option value="">Escolha a cidade</option>
        </select><br><br>
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js">

    <script type="javascript">
         $(".link-editar","#tb-cidades").on("click",function(){

          
            $.post("./editar.php", "id=" + $(this).sibling(".id-cidade").val(), function(resp){



            } );
         });

    </script>
</body>




</html>