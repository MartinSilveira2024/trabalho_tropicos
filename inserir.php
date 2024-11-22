<?php

require_once "conexao.php";
$conexao = conectar();


$docs = json_decode(file_get_contents("php://input"));


$sql = "INSERT INTO documento
        (nome_doc, tipo_doc, data_emissao)
        VALUES 
        ('$docs->nome_doc', 
        '$docs->tipo_doc', 
        '$docs->data_emissao')";

executarSQL($conexao, $sql);


$docs->id_documento = mysqli_insert_id($conexao);

echo json_encode($docs);
