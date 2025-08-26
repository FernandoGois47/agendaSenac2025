<?php include 'inc/header.inc.php'; 
include 'classes/contatos.class.php';

$contato = new Contatos();
?>

<h1>Agenda Senac 2025</h1>
<button><a href="adicionarContato.php">ADICIONAR</a></button>

<table border="2" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Rede Social</th>
            <th>Telefone</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
        </tr>
    </thead>
<?php
$lista = $contato->listar();
foreach($lista as $item):
?>
    <tbody>
        <tr>
            <td><?php echo $item['id'];?></td>
            <td><?php echo $item['email'];?></td>
            <td><?php echo $item['endereco'];?></td>
            <td><?php echo $item['rede_social'];?></td>
            <td><?php echo $item['telefone'];?></td>
            <td><?php echo $item['nome'];?></td>
            <td><?php echo $item['dtNasc'];?></td>
            <td>
                <a href="editar.Contato.php">Editar</a>
                <a href="#">| Excluir</a>
            </td>
        </tr>
    </tbody>
    <?php
    endforeach;
    ?>
</table>

<!-- class Contatos {
        private $id;
        private $email;
        private $endereco;
        private $rede_social;
        private $telefone;
        private $nome;
        private $dtNasc; -->


<?php include 'inc/footer.inc.php'; ?>

    
