<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');

$datesplit = explode('/', $_SESSION['date'][0]);

include('controle/formulas.php');
?>

<!-- Dayli - 12/06

Integração de uma Biblioteca de Gráficos (Chart.js): Inclusão da biblioteca Chart.js (ou similar) no projeto para a geração de gráficos.

Gráfico de Linha da Taxa de Produção: Implementação de um gráfico de linha que exiba a evolução da taxa de produção ao longo do tempo (dentro do período filtrado, se houver).
-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--ajuda o navegador a entender que a linguagem do site é pt-br-->
    <meta http-equiv="content-language" content="pt-br">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="menutopo h-10 d-none d-xl-flex align-items-center bg-primary text-white">
        <h2 class="m-auto"><b>GERENCIAMENTO DE PRODUÇÃO</b></h2>
    </div>
    <div class="d-flex h-90 w-100 align-items-stretch">
        <div class="d-flex navmenu">
            <?php include "view/menunav.php" ?>
        </div>
        <div class="h-95 w-100">
            <?php include "view/menucontrole.php"; ?>
            <iframe id="painel" src="view/dashboard.php" class="w-100 h-100 border shadow-lg"></iframe>
        </div>
    </div>

    <?php
    include "view/modalcadastrarentrega.php";
    include "view/modalfiltrardata.php";
    ?>
</body>

</html>

<script language="javascript" type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

        const dashboard = document.getElementById('dashboard');
        const listagem = document.getElementById('listagem');
        const funcionarios = document.getElementById('funcionarios');
        const dados = document.getElementById('dados');
        const painel = document.getElementById('painel');
        const teste = document.getElementById('teste');
        const imprimir = document.getElementById('imprimir');

        const urldashboard = "view/dashboard.php";
        const urllistagem = "view/lista.php";
        const urlfuncionarios = "view/funcionarios.php";
        const urldados = "view/listadados.php";
        const urlteste = "view/teste.php";

        dashboard.addEventListener('click', function() {
            reloadpage(urldashboard, "PCIP - DASHBOARD", dashboard);
        });
        listagem.addEventListener('click', function() {
            reloadpage(urllistagem, "PCIP - LISTAGEM", listagem);
        });
        funcionarios.addEventListener('click', function() {
            reloadpage(urlfuncionarios, "PCIP - LISTA DE FUNCIONÁRIOS", funcionarios);
        });
        dados.addEventListener('click', function() {
            reloadpage(urldados, "PCIP - DADOS", dados);
        });
        teste.addEventListener('click', function() {
            reloadpage(urlteste, "PCIP - TESTE", teste);
        });
        imprimir.addEventListener('click', function() {

        });
    });

    function reloadpage(url, title, object) {
        painel.src = url;
        document.title = title;
        dashboard.getElementsByTagName("span")[0].classList.remove("active", "bg-secondary");
        listagem.getElementsByTagName("span")[0].classList.remove("active", "bg-secondary");
        funcionarios.getElementsByTagName("span")[0].classList.remove("active", "bg-secondary");
        dados.getElementsByTagName("span")[0].classList.remove("active", "bg-secondary");
        teste.getElementsByTagName("span")[0].classList.remove("active", "bg-secondary");
        object.getElementsByTagName("span")[0].classList.add("active", "bg-secondary");
    }
</script>