<?php
session_start();

$nome = $_GET['nome'];
$cargo = $_GET['cargo'];
$setor = $_GET['setor'];

if (isset($nome) || isset($cargo) || isset($setor)) {
    header('Location: ../view/funcionarios.php');
    exit();
}
?>