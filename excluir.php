<?php

$id_documento = $_GET['id_documento'];

require_once "conexao.php";
$conexao = conectar();

$sql = "DELETE FROM documento WHERE id_documento = $id_documento";

$returno = executarSQL($conexao, $sql);

echo json_encode($returno);
