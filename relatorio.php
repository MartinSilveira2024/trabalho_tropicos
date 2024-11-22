<?php
require_once "conexao.php";
$conexao = conectar();

require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;


$options = new Options();

$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);


$dados = '
<html>
<head>
<link rel="StyleSheet" type="Text/css" href="estilo.css">
<style>
body
 { font-family: Arial, sans-serif; }
h1
{
	color:#a1887f;
}
table {
  border-collapse: collapse;
  width: 100%;
}
td,th {
  text-align: left;
  padding: 10px;
}
tr:nth-child(even)
	{background-color: #f2f2f2}
thead 
{
  background-color: #a1887f;
  color: white;
}
</style>
</head>
<body>
';

$dados .= "<h1 style='text-align: center;text-decoration: underline;'> Relatorio dos documentos </h1> ";

$dados .= "<table>
        <thead>
          <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Tipo</th>
			    <th>Data</th>             
          </tr>
        </thead>
        <tbody>";

$sql = "SELECT id_documento,nome_doc,tipo_doc,data_emissao FROM documento";
$resultado = mysqli_query($conexao, $sql);
while ($docs = mysqli_fetch_assoc($resultado)) {
    $dados .= "<tr>";
    $dados .= '<td>' . $docs['id_documento'] . '</td>';
    $dados .= '<td>' . $docs['nome_doc'] . '</td>';
    $dados .= '<td>' . $docs['tipo_doc'] . '</td>';
    $dados .= '<td>' . $docs['data_emissao'] . '</td>';
    $dados .= "</tr>";
}
$dados .= "</tbody>";
$dados .= "</table>";
$dados .= "</body> </html>";

$dompdf->loadHtml($dados);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("relatorio.pdf", ["Attachment" => true]);

