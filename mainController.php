<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('./config.php'); //importação do arquivo de config
require_once('./conexao.php'); // inportação da DAO de dados

$produtos = null; //guarda uma lista de produtos
$produto = null; // guarda um único produto

function inicio() { // vai fazer a listagem de produtos que estão no banco no banco
    global $produtos;
    $produtos = procurar_todos('Produtos');
}


