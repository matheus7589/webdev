<?php

require_once('../config.php'); //importação do arquivo de config
require_once('../conexao.php'); // inportação da DAO de dados

function add() {
    if (!empty($_POST['user'])) {

        $user = $_POST['user'];
        $user["'senha'"] = md5($user["'senha'"]);
        if(!isset($user["'is_admin'"])){
        	$user["'is_admin'"] = 0;
        }else{
        	$user["'is_admin'"] = 1;
        }

        save('usuarios', $user);
        header('location: ../pages/addUsers.php');
    }
}