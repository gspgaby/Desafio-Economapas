<?php
    require_once "./CLASSES/Usuarios.php";
    $u = new Usuario;
?>
 
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
 
<body>
    <div id="container">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="Entrar"> 
            <a href="cadastrar.php">Não possui cadastro? <strong> Inscreva-se </strong></a>
        </form>
    </div>

<?php
if(isset($_POST['usuario'])) {
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);
    if(!empty($usuario)  &&!empty($senha)){
        if($u->logar($usuario, $senha)){
            header("Location: areaPrivada.php");
        }
        else{
            ?>
                <div class="msg-erro">
                    Usuário e/ou senha estão incorretos!
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
?>
</body>
</html>