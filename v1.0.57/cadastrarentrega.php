<?php 
session_start();
$codigo = $_GET['codigo'];
$quantidade = $_GET['quantidade'];
$estado = $_GET['estado'];

date_default_timezone_set('America/Sao_Paulo');

array_push($_SESSION['codigo'], $codigo);
array_push($_SESSION['quantidade'], $quantidade);
array_push($_SESSION['estado'], $estado);
array_push($_SESSION['nome'], $_SESSION['usuario']);
array_push($_SESSION['date'], date("d/m/Y"));
array_push($_SESSION['hora'], date("H:i:s"));

$dados = $_SESSION['codigo'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('codigo.json',$json);

$dados = $_SESSION['quantidade'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('quantidade.json', $json);

$dados = $_SESSION['estado'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('estado.json', $json);

$dados = $_SESSION['nome'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('nome_entrega.json', $json);

$dados = $_SESSION['date'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('date.json',$json );

$dados = $_SESSION['hora'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('hora.json',$json );

header("Location: listagem.php");

?>