<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function open_database() {
    $servidor = "mysql472.umbler.com";
    $usuario = "matheuswebdev";
    $senha = "sabakutaiso7589";
    $banco = "vendas";
    try {
        $con = new mysqli($servidor, $usuario, $senha, $banco);
        $con->set_charset("utf8");
        return $con;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}

function close_database($conn) {
    try {
        mysqli_close($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find($table = null, $id = null) {

    $database = open_database();
    $found = null;
    try {
        if ($id) {
            $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);

            if ($result->num_rows > 0)
                $found = $result->fetch_assoc();
        }else {
            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);
            if ($result->num_rows > 0)
                $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
    return $found;
}

function procurar_todos($table) {
    return find($table);
}

function save($table = null, $data = null) {
    $database = open_database();
    $columns = null;
    $values = null;
    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }
    // remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');
    echo "Ate aquoi";
    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
    try {
        $database->query($sql);
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

function update($table = null, $id = 0, $data = null) {
    $database = open_database();
    $items = null;
    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }
    // remove a ultima virgula
    $items = rtrim($items, ',');
    $sql = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id=" . $id . ";";
    try {
        $database->query($sql);
        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

function remove($table = null, $id = null) {
    $database = open_database();

    try {
        if ($id) {
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);
            if ($result = $database->query($sql)) {
                $_SESSION['message'] = "Registro Removido com Sucesso.";
                $_SESSION['type'] = 'success';
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}

function comprar($table = null) {
    $alert_script =  "<script>alert('Compra realizada com Sucesso!!');</script>";
    $database = open_database();
    session_start();
    foreach ($_SESSION['carrinho'] as $id => $qtd) {
        $aux = find('Produtos', $id);
        $valor = $aux['quantidade'] - $qtd;
        $sql = "UPDATE " . $table . " SET quantidade='$valor' WHERE id=" . $id . ";";
        try {
            $database->query($sql);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    unset($_SESSION['carrinho']);
    echo $alert_script;
    close_database($database);
}
