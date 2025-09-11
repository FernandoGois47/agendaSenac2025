<?php
require '../inc/header.inc.php';
require '../classes/contatos.class.php';

$contato = new Contatos();

    if(!empty($_POST['email'])){
        $email = addslashes($_POST['email']);
        $nome = addslashes($_POST['nome']);
        $senha = addslashes($_POST['senha']);
        $permissoes = implode(',',$_POST['permissoes']);
        $usuario->adicionar($email, $nome, $senha, $permissoes);
        header('Location: cadastro.php');
    } else {
        echo '<script type="text/javascript">alert("Email já cadastrado!")</script>';
    }
?>

<!-- nome,email, senha, permissoes-->

<form method="POST" action="" class="form-contato">
    <h1 class="title">Cadastre-se</h1>
    <label>Nome: </label>
    <input type="text" name="nome"/><br><br>
    <label>E-mail: </label>
    <input type="email" name="email"/><br><br>
    <label>Senha: </label>
    <input type="password" name="senha"/><br><br>

    Permissoes: <br>
    <input type="checkbox" checked id="adicionar" name="permissoes[]" value="adicionar">
    <label for="adicionar">Adicionar</label><br>
    <input type="checkbox" id="excluir "name="permissoes[]" value="excluir">  
    <label for="excluir">Excluir</label><br>
    <input type="checkbox" id="editar "name="permissoes[]" value="editar">  
    <label for="editar">Editar</label><br>
    <input type="checkbox" id="super "name="permissoes[]" value="super">  
    <label for="super">Super</label><br>

    <input type="submit" name="btCadastrar" value="CADASTRAR"/>
</form>














<?php
require '../inc/footer.inc.php'
?>