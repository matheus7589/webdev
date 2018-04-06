<?php


require_once('./config.php'); //importação do arquivo de config
require_once('./conexao.php'); // inportação da DAO de dados

if (isset($_POST['user']) && isset($_POST['pass'])) {

	$login = login('usuarios', $_POST['user'], $_POST['pass']);
	if($login){
		echo json_encode(array(
			'success' => true,
		));
		
	}

	// login('usuarios', $_POST['user'], $_POST['pass'])
}else{
	echo json_encode(array(
		'success' => false,
	));
}


