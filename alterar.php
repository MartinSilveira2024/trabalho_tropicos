<?php

require_once "conexao.php";
$conexao = conectar();
$docus = json_decode(file_get_contents("php://input"));
$sql = "UPDATE documento SET
        nome_doc = '$docus->nome_doc', 
        tipo_doc = '$docus->tipo_doc', 
        data_emissao = '$docus->data_emissao'
        WHERE id_documento = $docus->id_documento";


executarSQL($conexao, $sql);

echo json_encode($docus);

