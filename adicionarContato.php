<?php require'inc/header.inc.php'?>
<br>
<div style="text-align:center; margin-bottom:30px;" >
    <nav>
        <a  href="index.php" class="header-button">Início</a>
    </nav>
</div>
    <form method="POST" action="adicionarContatoSubmit.php" class="form-contato">
        <h1 class="title">ADICIONAR</h1>
        Email: <br>
        <input type="text" name="email"/><br><br>
        Endereço: <br>
        <input type="text" name="endereco"/><br><br>
        Rede Social: <br>
        <input type="text" name="rede_social"/><br><br>
        Telefone: <br>
        <input type="text" name="telefone"/><br><br>
        Nome: <br>
        <input type="text" name="nome"/><br><br>
        Data de Nascimento: <br>
        <input type="date" name="dtNasc" value="<?= htmlspecialchars(date('Y-m-d', strtotime($info['dtNasc']))) ?>"><br>


        <input type="submit" name="btCadastrar" value="ADICIONAR"/>
    </form>
<br>

<?php require 'inc/footer.inc.php'?>