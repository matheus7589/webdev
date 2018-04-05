<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../config.php'); //importação do arquivo de config
require_once('../conexao.php'); // inportação da DAO de dados

$produtos = null; //guarda uma lista de produtos
$produto = null; // guarda um único produto

function inicio() { // vai fazer a listagem de produtos que estão no banco no banco
    global $produtos;
    $produtos = procurar_todos('Produtos');
}

function find_id($id = null) { // vai fazer a listagem de produtos que estão no banco no banco
    global $produto;
    $produto = find('Produtos', $id);
}

function add() {
    if (!empty($_POST['produto'])) {

        $produto = $_POST['produto'];
        echo "<br><br>aqui foi";

        save('Produtos', $produto);
        header('location: ../pages/CRUD.php');
    }
}

function edit() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['produto'])) {
            $produto = $_POST['produto'];
            update('Produtos', $id, $produto);
            header('location: ../pages/CRUD.php');
        } else {
            global $produto;
            $produto = find('Produtos', $id);
        }
    } else {
        header('location: ../pages/CRUD.php');
    }
}

function delete($id = null) {
    global $produto;
    $produto = remove('Produtos', $id);
    header('location: ../pages/CRUD.php');
}

function buy(){
        comprar('Produtos');
//        header('location: ../index.php');
}
