<?php
    session_start();
    $usuario = $_POST["usuario"] ?? '';
    $senha = $_POST["senha"] ?? '';
    $fileusuarios = file_get_contents('../data/nome.json', true);
    $filesenha = file_get_contents('../data/senhas.json', true);
    $usuarios = json_decode($fileusuarios);
    $senhas = json_decode($filesenha);
    $indice = array_search($usuario, $usuarios);

    if ($indice && isset($senhas[$indice]) && $senha == $senhas[$indice]) {
        $_SESSION['usuario'] = $usuario;
        header("location: init.php");
    }else {
        echo"<script>alert('credenciais não validas. TENTE NOVAMENTE!');</script>";
        echo"<script>window.location.replace('../index.php');</script>";
    }
?>