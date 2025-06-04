<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}


$codigo = $_GET['codigo'];
$quantidade = $_GET['quantidade'];
$estado = $_GET['estado'];

if ($codigo == null || $quantidade == null || $estado == null) {
    header('Location: ../listagem.php');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');

array_push($_SESSION['codigo'], $codigo);
array_push($_SESSION['quantidade'], $quantidade);
array_push($_SESSION['estado'], $estado);
array_push($_SESSION['nome'], $_SESSION['usuario']);
array_push($_SESSION['date'], date("d/m/Y"));
array_push($_SESSION['hora'], date("H:i:s"));

header("Location: ./listagem.php");

?>