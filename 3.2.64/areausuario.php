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
<style>
    /* Animações */

@keyframes hidden-itens-lefth {
    from {transform: translateX(0%);}
    to {transform: translateX(-100%);}
}

@keyframes show-itens-lefth {
    from {transform: translate(-200%, 300%);}
    to {transform: translate(0%, 0%);}
}

.hidden-item-lefth {
    visibility: hidden;
    transform: translateX(-100%);
    animation-name: hidden-itens-lefth;
    animation-duration: 1s;
}

.show-item-lefth {
    transform: translateX(0%);
    animation-name: show-itens-lefth;
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
}

@keyframes hidden-itens-right {
    from {transform: translateY(0%);}
    to {transform: translateY(-100%);}
}

@keyframes show-itens-right {
    from {transform: translateY(-300%);}
    to {transform: translateY(0%);}
}

.hidden-item-right {
    transform: translateY(-100%);
    animation-name: hidden-itens-right;
    animation-duration: 1s;
}

.show-item-right {
    transform: translateY(0%);
    animation-name: show-itens-right;
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
}

@keyframes transition-right {
    from {transform: translateX(200%);}
    to {transform: translate(0%);}
}

.transition-right {
    animation-name: transition-right;
    animation-duration: 2s;
}

@keyframes expand-painel {
    from {transform: translate(0%,0%);}
    to {transform: translate(-10%,-10%);}
}

.expand-painel {
    animation-name: expand-painel;
    animation-duration: 1s;
}

@keyframes shrink-painel {
    from {transform: translate(0%,0%);}
    to {transform: translate(10%,14%);}
}

.shrink-painel {
    animation-name: shrink-painel;
    animation-duration: 1s;
}

</style>

<body style="overflow: hidden;">
    <div id="title-header" class="menutopo h-10 w-100 d-none d-xl-flex align-items-center bg-primary text-white show-item-right">
        <h2 class="m-auto"><b>GERENCIAMENTO DE PRODUÇÃO</b></h2>
    </div>
    <div id="conteudo" class="d-flex h-90 w-100 align-items-stretch">
        <div id="nav-menu" class="d-flex navmenu show-item-lefth">
            <?php include "view/menunav.php" ?>
        </div>
        <div id="container-principal" class="h-85 w-100 transition-right ">
            <div id="nav-control">
                <?php include "view/menucontrole.php"; ?>
            </div>
            <iframe name="panel" id="painel" src="view/dashboard.php" class="w-100 h-100 border shadow-lg"></iframe>
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
        const max_min = document.getElementById('max_min');
        const imprimir = document.getElementById('imprimir');
        const conteudo = document.getElementById('conteudo');
        const nav_menu = document.getElementById('nav-menu');
        const nav_control = document.getElementById('nav-control');
        const title_header = document.getElementById('title-header');
        const container_principal = document.getElementById('container-principal');

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
        max_min.addEventListener('click', function() {
            EsconderItens();
        });
        imprimir.addEventListener('click', function() {
            window.frames['panel'].print();
        });

        let tempo = 1000;

        function EsconderItens() {
            nav_menu.classList.toggle("hidden-item-lefth");
            nav_menu.classList.toggle("show-item-lefth");
            title_header.classList.toggle("hidden-item-right");
            title_header.classList.toggle("show-item-right");
            container_principal.classList.toggle("h-85");
            container_principal.classList.toggle("h-100");
            container_principal.classList.toggle("expand-painel");
            if(container_principal.classList.contains("transition-right")) {
                container_principal.classList.remove("transition-right");
            } else {
                container_principal.classList.toggle("shrink-painel");
            }
            if(max_min.innerHTML =="MAXIMIZAR") {
                max_min.innerHTML = 'MINIMIZAR';
            } else {
                max_min.innerHTML = 'MAXIMIZAR';
            }
            
            setTimeout(Mudarposition, tempo);
        }

        function Mudarposition() {
            nav_menu.classList.toggle("position-absolute");
            title_header.classList.toggle("position-absolute");
            //if(tempo == 1000) {tempo = 2000;} else {tempo = 1000;}
        }
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