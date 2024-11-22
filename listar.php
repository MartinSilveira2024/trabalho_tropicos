<?php

require_once "conexao.php";
$conexao = conectar();


$sql = "SELECT * FROM documento";
$resultado = executarSQL($conexao, $sql);


$docs = mysqli_fetch_all($resultado, MYSQLI_ASSOC);


echo json_encode($docs);

