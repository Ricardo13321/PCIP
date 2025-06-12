<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');
$datesplit = explode('/', $_SESSION['date'][0]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Ajuda o navegador a entender que a linguagem do site é pt-br -->
    <meta http-equiv="content-language" content="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>LISTAGEM</title>
    <link rel="icon" type="image/x-icon" href="caticon.png">
    <link type="text/css" rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="menutopo h-10 d-none d-xl-flex align-items-center bg-primary text-white">
        <h2 class="m-auto" ><b>LISTAGEM</b></h2>
    </div>
    
    <div class="d-xl-flex  h-85">
            <?php include "view/menunav.php" ?>
        <div class="w-100 h-85">
            <div class="d-flex border-bottom">
                <div class="px-2">
                    <b><input class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#atualizardata" type="button" value="MUDAR DATA"></b>
                    <b><input class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" value="CADASTRAR"></b>
                    <a href="controle/salvar.php"><input class="m-1 btn btn-primary" type="button" value="SALVAR"></a>
                </div>
            </div> 
            <div class="overflow-hidden" style=" height: 100%; background: white;">
                <iframe src="view/lista.php" style="width: 100%;  height: 100%;"></iframe>
            </div>
        </div>        
    </div>
    <?php
        include "view/modalcadastrarentrega.php";
        include "view/modalfiltrardata.php";
    ?>
</body>
</html>