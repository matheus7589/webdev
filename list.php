<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './conexao.php';
require_once './config.php';
require_once('./mainController.php');

session_start();

if (!isset($_SESSION['user'])) { // verifica se existe a variavel de sessao carrinho 
    header('location: index.php');
}

inicio();
?>


<html>
    <head>
        <meta charset=utf-8">
        <link rel="icon" href="bootstrap/carrinho.png">
        <title>Vendas</title>
        <link rel="stylesheet" href="boostrapMod/bootstrap.css"/>
        <link rel="stylesheet" href="boostrapMod/bootstrap.min.css"/>
        <link rel="stylesheet" href="bootstrap/css/jumbotron.css"/>
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">iVendas</a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault" style="margin-right: 15px;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/carrinho.php">Meu carrinho <span class="badge"><?php echo count($_SESSION['carrinho']); ?></span></a>
                    </li>
                    <?php if($_SESSION['user']['is_admin'] == "1") { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administração</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="pages/CRUD.php">Adicionar itens</a>
                            <a class="dropdown-item" href="pages/addUsers.php">Adicionar usuários</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
            <a class="navbar-brand pull-right" href="./controller/logout.php">Sair</a>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Bem Vindo!</h1>
                <p>Monte seu carrinho de comprar e leve tudo o que você precisa para sua casa, oferta limitada.</p>
<!--                <p><a class="btn btn-primary btn-lg" href="#" role="button">Fique por dentro! &raquo;</a></p>-->
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <?php if ($produtos) : ?>
                    <?php foreach ($produtos as $produto) : ?>
                        <div class="col-md-4">
                            <h2><?php echo $produto["nome"]; ?></h2>
                            <a href="#" class="thumbnail">
                                <img src="<?php echo $produto["imageref"]; ?>" alt="imageloka">
                            </a>
                            <p><?php echo $produto["descricao"]; ?></p>
                            <?php if ($produto["quantidade"] > 0): ?>
                            <p><a class="btn btn-secondary" href="pages/carrinho.php?acao=add&id=<?php echo $produto["id"]; ?>" role="button">Comprar &raquo;</a></p>
                            <?php else : ?>
                                <p>Produto Indisponvel no momento.</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div> <!-- /container -->

            <footer>
                <p>&copy; MachadoCorp 2018</p>
            </footer>
        


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>');</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.min2.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="bootstrap/ie10-viewport-bug-workaround.js"></script>

        <?php 
         ?>

    </body>
</html>
