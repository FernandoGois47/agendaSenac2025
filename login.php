<?php
require './inc/header.inc.php'
?>
<!-- nome,email, senha, permissoes-->

<form method="POST" action="adicionarContatoSubmit.php" class="form-contato">
    <h1 class="title">Login</h1>
    E-mail: <br>
    <input type="email" name="email" autocomplete="off"><br><br>
    Senha: <br>
    <input type="password" name="senha"/><br><br>
    <input type="submit" name="btCadastrar" value="ENTRAR"/>
    <a href="cadastro.php">Registre-se agora!</a>
</form>














<?php
require './inc/footer.inc.php'
?>