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
    <div id="container-cad">
        <h1>Cadastrar</h1>
        <form method="post">
            <input type="usuario" name="usuario" placeholder="Usuário" maxlength="60">
            <input type="email" name="email" placeholder="email" maxlength="60">
            <input type="password" name="senha" placeholder="Senha" maxlength="32">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="32">
            <input type="submit" value="Cadastrar"> 
            <a href="index.php">Já é cadastrado? <strong> Login </strong></a>
        </form>
    </div>

<?php
if(isset($_POST['usuario'])) {
    $usuario = addslashes($_POST['usuario']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    if(!empty($usuario)  &&!empty($email) &&!empty($senha)  &&!empty($confirmarSenha)){  
        if($senha == $confirmarSenha){
            if($u->cadastrar($usuario, $email, $senha)){
                ?>
                    <div class="msg-sucesso">
                        Cadastrado com sucesso. Acesse a página de login.
                    </div>
                <?php
            }
            else{
                ?>
                    <div class="msg-erro">
                        Email já está cadastrado. Verifique e tente novamente.
                    </div>
                <?php
            }
        }
        else{
            ?>
                <div class="msg-erro">
                    As senhas digitadas não são iguais. Tente novamente.
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