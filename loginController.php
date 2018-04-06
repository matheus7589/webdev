<?php

require_once('./config.php'); //importação do arquivo de config
require_once('./conexao.php'); // inportação da DAO de dados

session_start();


if (isset($_POST['user']) && isset($_POST['pass'])) {

	$login = login('usuarios', $_POST['user'], md5($_POST['pass']));
	// var_dump($login["usuario"]);
	// die();
	if($login){
		$_SESSION['user'] = array(
				'name' => $login["usuario"],
				'is_admin' => $login["is_admin"],
				'is_logado' => true,
			);
		echo json_encode(array(
			'success' => true,
		));
		
	}
}else{
	echo json_encode(array(
		'success' => false,
	));
}





