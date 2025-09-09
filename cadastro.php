<?php
require './inc/header.inc.php'
?>
<!-- nome,email, senha, permissoes-->

<form method="POST" action="adicionarContatoSubmit.php" class="form-contato">
    <h1 class="title">Cadastre-se</h1>
    <label>Nome: </label>
    <input type="text" name="nome"/><br><br>
    <label>E-mail: </label>
    <input type="email" name="email"/><br><br>
    <label>Senha: </label>
    <input type="password" name="senha"/><br><br>

    <input type="submit" name="btCadastrar" value="CADASTRAR"/>
</form>














<?php
require './inc/footer.inc.php'
?>