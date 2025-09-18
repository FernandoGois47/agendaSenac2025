<?php
// Iniciar sessão no topo
session_start();

require '../inc/header.inc2.php';
require '../classes/usuario.class.php';

// Exibir mensagem de cadastro se existir
if(isset($_SESSION['msg_cadastro'])) {
    list($type, $message) = explode('|', $_SESSION['msg_cadastro'], 2);
    echo '<script type="text/javascript">alert("'.$message.'");</script>';
    unset($_SESSION['msg_cadastro']);
}

// Processar login
if(isset($_POST['btCadastrar'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
    $usuario = new Usuario();
    $resultado = $usuario->login($email, $senha);
    
    if($resultado !== false && !is_string($resultado)) {
        // Login bem-sucedido
        $_SESSION['usuario_logado'] = $resultado;
        header('Location: em_construcao.php');
        exit;
    } else {
        // Login falhou
        echo '<script type="text/javascript">alert("Email ou senha incorretos!");</script>';
    }
}
?>

<!-- nome,email, senha, permissoes-->

<form method="POST" class="form-contato">
    <h1 class="title">Login</h1>
    E-mail: <br>
    <input type="email" name="email" autocomplete="off" required><br><br>
    Senha: <br>
    <input type="password" name="senha" required/><br><br>
    <input type="submit" name="btCadastrar" value="ENTRAR"/>
    <br><br>
    <a href="cadastro.php">Registre-se agora!</a>
</form>

<?php
require '../inc/footer.inc.php'
?>