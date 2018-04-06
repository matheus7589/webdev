<?php 

require_once('../config.php'); //importação do arquivo de config
require_once('../conexao.php'); // inportação da DAO de dados


$usuario = null; // guarda um único usuario

function login(){
	global $usuario;
    $usuario = login('usuarios', 'matheus', '123');
}