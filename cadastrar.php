<?php

include("conexao.php");

try {
    if ($_POST) {
        extract($_POST);

        $sql = "INSERT INTO usuario (nome, usuario, senha)
            values ('$nome', '$usuario', '$senha')";
        $res = mysqli_query($con, $sql);
        $retorno = array();

        if ($res == false) {
            throw new Exception("Erro ao inserir usuário");
        } else {
            $retorno['resp'] = true;
            $retorno['msg'] = "Usuario inserido com sucesso";
        }
        die(json_encode($retorno));
    }
} catch (Exception $e) {

    $retorno = array();
    $retorno['resp'] = false;
    $retorno['msg'] = $e->getMessage();
    die(json_encode($retorno));
}
