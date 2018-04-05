<?php
include '.././conexao.php';
require_once '../config.php';
require_once('../controller/produtos.php');

inicio();
?>

<?php include(HEADER_TEMPLATE); ?>

<br>
<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Produtos</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="cadastro.php"><i class="fa fa-plus"></i> Novo Produto</a>
            <a class="btn btn-default" href="CRUD.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th width="30%">Nome</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($produtos) : ?>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?php echo $produto['id']; ?></td>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['quantidade']; ?></td>
                    <td class="actions text-right">
                        <a href="../pages/editar.php?id=<?php echo $produto['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $produto['id']; ?>">
                            <i class="fa fa-trash"></i> Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>

            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
            
        <?php endif; ?>
    </tbody>
</table>

<?php include('../controller/modalConfirmacao.php'); //a marcação do modal vai ser injetada na página de listagem e aí o modal poderá ser exibido
?> 

<?php include(FOOTER_TEMPLATE); ?>
