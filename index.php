<?php 
include './conexao.php';
require_once './config.php';
require_once('./mainController.php');

session_start();
if (isset($_SESSION['user'])) { // verifica se existe a variavel de sessao carrinho 
	if($_SESSION['user']['is_logado'] == true){
    	header('location: list.php');
    }
}
?>

<html>
    <head>
        <meta charset=utf-8">
        <link rel="icon" href="bootstrap/carrinho.png">
        <title>Vendas</title>
        <link rel="stylesheet" href="boostrapMod/bootstrap.css"/>
        <link rel="stylesheet" href="boostrapMod/login.css"/>
        <link rel="stylesheet" href="boostrapMod/bootstrap.min.css"/>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">iVendas</a>
        </nav>

        <div class="container" style="margin-top: 5%;">
		    <div class="row">
		        <div class="offset-md-4 col-md-4">
		            <div class="form-login">
		            	<h4>Bem Vindo!</h4>
		            	<input type="text" id="userName" class="form-control input-sm chat-input" placeholder="usuário" />
		            	</br>
		            	<input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="senha" />
		            	</br>
		            		<div class="wrapper">
		            			<span class="group-btn">     
		                			<a href="#" id="logar" class="btn btn-primary btn-md">Acessar <i class="fa fa-sign-in"></i></a>
		            			</span>
		            		</div>
		            </div>
		        </div>
		    </div>
		</div>

        <footer>
                <p>&copy; MachadoCorp 2018</p>
            </footer>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.min2.js"></script>
        <script src="bootstrap/js/login.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="bootstrap/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>