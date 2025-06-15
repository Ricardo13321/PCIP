<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

header('Location: ../index.php');
exit();

$dados = $_SESSION['codigo'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('../data/codigo.json',$json);

$dados = $_SESSION['quantidade'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('../data/quantidade.json', $json);

$dados = $_SESSION['estado'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('../data/estado.json', $json);

$dados = $_SESSION['nome_entrega'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('../data/nome_entrega.json', $json);

$dados = $_SESSION['date'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('../data/date.json',$json );

$dados = $_SESSION['hora'];
$json = json_encode($dados, JSON_PRETTY_PRINT);
file_put_contents('../data/hora.json',$json );

header("Location: ../view/lista.php");
?>