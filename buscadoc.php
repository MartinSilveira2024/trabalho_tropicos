<?php


$id_doc = $_GET['id_doc'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT id_documento, nome_doc, tipo_doc, data_emissao FROM documento 
        WHERE id_documento = $id_doc";
$resultado = executarSQL($conexao, $sql);
$docs = mysqli_fetch_assoc($resultado);
echo json_encode($docs);

