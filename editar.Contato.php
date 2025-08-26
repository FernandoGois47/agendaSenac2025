<?php include 'inc/header.inc.php'; 
include 'classes/contatos.class.php';

$contato = new Contatos();
?>

















<form method="POST" action="editarContatoSubmit.php">
    <h1 class="title">EDITAR CONTATO</h1>
    <input type="hidden" name="id" value="<?= $info['id']?>">
    Email: <br>
    <input type="text" name="email" value="<?= $info['email']?>">
    Endereço: <br>
    <input type="text" name="endereco" value="<?= $info['endereco']?>">
    Rede Social: <br>
    <input type="text" name="rede_social" value="<?= $info['rede_social']?>">
    Telefone: <br>
    <input type="text" name="telefone" value="<?= $info['telefone']?>">
    Nome: <br>
    <input type="text" name="nome" value="<?= $info['nome']?>">
    Data de Nascimento: <br>
    <input type="text" name="dtNasc" value="<?= $info['dtNasc']?>">


    <input type="submit" name="btCadastrar" value="ADICIONAR"/>



    
<?php include 'inc/footer.inc.php'; ?>