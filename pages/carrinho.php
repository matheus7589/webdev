<?php
require_once '../config.php';
require("../conexao.php");
require_once('../controller/produtos.php');


session_start();
if (!isset($_SESSION['carrinho'])) { // verifica se existe a variavel de sessao carrinho 
    $_SESSION['carrinho'] = array(); // se nao existir ele cria uma do tipo array
}


if (isset($_GET['acao'])) {

    if ($_GET['acao'] == 'comprar') {
        buy();
    }

    // adicionar produto no carrinho
    if ($_GET['acao'] == 'add') { // se a acao get for adicionar
        $id = $_GET['id'];
        if (!isset($_SESSION['carrinho'][$id])) { // se exitir esse id na variavel de sessao
            $_SESSION['carrinho'][$id] = 1;
        } else {
            find_id($id);
            if ($_SESSION['carrinho'][$id] < $produto["quantidade"]) {
                $_SESSION['carrinho'][$id] += 1;
            } else {
                echo "<script>alert('Produto não pode ser adicionado pois não há mais itens em estoque.');</script>";
            }
        }
    }

    //remover produto do carrinho
    if ($_GET['acao'] == 'del') { // caso a acao get seja deletar
        $id = $_GET['id'];
        if (isset($_SESSION['carrinho'][$id])) { // se exitir esse id na variavel de sessao
            unset($_SESSION['carrinho'][$id]); // apaga o item da varivel de sessao
        }
    }
}

//unset($_SESSION['carrinho']);
//unset($_SESSION['message']);
?>

<?php include(HEADER_TEMPLATE); ?>

<table class="table table-hover">
    <caption>Carrinho de Compras</caption>
    <thead>
        <tr>
            <th width="244">Produto</th>
            <th width="179">Quantidade</th>
            <th width="170">Pre&ccedil;o</th>
            <th width="64">Remover</th>
        </tr>
    </thead>

    <form action="carrinho.php" method="post">
        <tfoot>
            <tr>
                <td colspan="5"><input class="btn btn-sm btn-primary" type="submit" value="Atualizar Carrinho" />
                    <a href="carrinho.php?acao=comprar"><input type="button" style="align-items: left;" class="btn btn-sm btn-primary" value="Realizar Compra!" /></a>
                </td>
            <tr>
                <td colspan="5"><a href="../list.php">Continuar Comprando</a></td>
        </tfoot>
        <tbody>
            <?php if (count($_SESSION['carrinho']) == 0): ?>
                <tr>
                    <td colspan="5">Não há produto no carrinho</td>
                </tr>
            <?php else : ?>
                <?php
                $total = 0;
                foreach ($_SESSION['carrinho'] as $id => $qtd):
                    find_id($id);
                    ?> 
                    <tr>
                        <td><?php echo $produto["nome"]; ?></td>
                        <td><?php echo $qtd; ?></td>
                        <td><?php echo $produto["nome"]; ?></td>
                        <td class="actions text-right"><a class="btn btn-sm btn-danger" href="?acao=del&id=<?php echo $id; ?>">remover</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>

    </form>

</table>


<?php include(FOOTER_TEMPLATE); ?>
