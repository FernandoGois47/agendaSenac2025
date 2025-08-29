<?php include 'inc/header.inc.php'; 
include 'classes/contatos.class.php';
include 'classes/funcoes.class.php';

$contato = new Contatos();
$fn = new Funcoes();
?>

<h1 class="title" style="text-align:center; margin-top:30px;">Agenda Senac 2025</h1>
<div style="text-align:center; margin-bottom:30px;">
    <button class="btn-adicionar">
        <a href="adicionarContato.php" style="color:inherit; text-decoration:none;">ADICIONAR</a>
    </button>
</div>

<div class="table-container" style="max-width:1000px; margin:auto;">
<table class="agenda-table" border="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Rede Social</th>
            <th>Telefone</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
<?php
$lista = $contato->listar();
foreach($lista as $item):
?>
        <tr>
            <td><?php echo ($item['id']);?></td>
            <td><?php echo ($item['email']);?></td>
            <td><?php echo ($item['endereco']);?></td>
            <td><?php echo ($item['rede_social']);?></td>
            <td><?php echo ($item['telefone']);?></td>
            <td><?php echo ($item['nome']);?></td>
            <td><?php echo $fn->dtNasc($item['dtNasc'],2);?></td>
            <td>
                <button class="btn-editar" onclick="location.href='editar.Contato.php?id=<?php echo $item['id']; ?>'">Editar</button>
                <button class="btn-excluir" onclick="location.href='#'">Excluir</button>
            </td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
</div>

<?php include 'inc/footer.inc.php'; ?>