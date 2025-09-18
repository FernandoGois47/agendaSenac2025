<?php
require '../inc/header.inc2.php';
require '../classes/usuario.class.php';

// Iniciar sessão
session_start();

$usuario = new Usuario();

if(isset($_POST['btCadastrar'])) {
    $email = addslashes($_POST['email']);
    $nome = addslashes($_POST['nome']);
    $senha = addslashes($_POST['senha']);
    $permissoes = isset($_POST['permissoes']) ? implode(',', $_POST['permissoes']) : '';
    
    $resultado = $usuario->adicionar($email, $nome, $senha, $permissoes);
    
    if($resultado === TRUE) {
        $_SESSION['msg_cadastro'] = 'success|Usuário cadastrado com sucesso! Faça login.';
        header('Location: login.php');
        exit;
    } else {
        $_SESSION['msg_cadastro'] = 'error|Erro ao cadastrar: Email já existe ou dados inválidos!';
        header('Location: cadastro.php');
        exit;
    }
}

// Exibir mensagem se existir
if(isset($_SESSION['msg_cadastro'])) {
    list($type, $message) = explode('|', $_SESSION['msg_cadastro'], 2);
    echo '<script type="text/javascript">alert("'.$message.'");</script>';
    unset($_SESSION['msg_cadastro']);
}
?>

<!-- nome,email, senha, permissoes-->

<form method="POST" action="" class="form-contato">
    <h1 class="title">Cadastre-se</h1>
    <label>Nome: </label>
    <input type="text" name="nome" required/><br><br>
    <label>E-mail: </label>
    <input type="email" name="email" required/><br><br>
    <label>Senha: </label>
    <input type="password" name="senha" required/><br><br>

    Permissoes: <br>
    <input type="checkbox" checked id="adicionar" name="permissoes[]" value="adicionar">
    <label for="adicionar">Adicionar</label><br>
    <input type="checkbox" id="excluir" name="permissoes[]" value="excluir">  
    <label for="excluir">Excluir</label><br>
    <input type="checkbox" id="editar" name="permissoes[]" value="editar">  
    <label for="editar">Editar</label><br>
    <input type="checkbox" id="super" name="permissoes[]" value="super">  
    <label for="super">Super</label><br>

    <input type="submit" name="btCadastrar" value="CADASTRAR"/>
    <br><br>
    <a href="login.php">Já tem conta? Faça login!</a>
</form>

<?php
require '../inc/footer.inc.php'
?>