<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="../css/estilo.css">
    <script language="javascript" type="text/javascript" >
        const url = "editar.php?id=";
        const email = document.getElementById("email");
        const nome = document.getElementById("nome");
        const genero = document.getElementById("floatingSelect");
        const form = document.getElementById("form_edit");
        const senha = document.getElementById("senha");
        const btnExcluir = document.getElementById("btn-excluir");
        const exemail = document.getElementById("excluir_email");
        const nomatch = document.getElementById("nomatch");

        document.addEventListener('DOMContentLoaded', function () {
            const input_pesquisar = document.getElementById("pesquisar");
            const table = document.getElementById("table");
            const trList = table.getElementsByTagName('tr');

            input_pesquisar.addEventListener('keyup', function () {
                let txt = input_pesquisar.value;
                txt = txt.toUpperCase();
                let filtroID = false;
                let filtroNome = false;
                let filtroEmail = false;
                let filtroGenero = false;
                let allfalse = true;

                for (let index1 = 1; index1 < trList.length; index1++) {
                    let _loc1_ = trList[index1].getElementsByTagName('td');
                    //let _loc1_ = trList[index];
                    for (let index2 = 0; index2 < _loc1_.length-1; index2++) { 
                        if (index2 == 0) {filtroID = _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                        if (index2 == 1) {filtroNome = txt == _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                        if (index2 == 2) {filtroEmail = txt == _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                        if (index2 == 3) {filtroGenero = txt == _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                    }
                    if (!filtroID && !filtroNome && !filtroEmail && !filtroGenero) {
                        trList[index1].style.display = 'none';
                    } else {
                        trList[index1].style.display = '';
                        allfalse = false;
                    }
                    
                }

                if (txt == '') {
                    for (let index1 = 1; index1 < trList.length; index1++) {
                        trList[index1].style.display = '';
                    }
                }
                
                nomatch.style.display = allfalse?'':'none';
                trList[0].style.display = allfalse?'none':'';
            });
        });
    </script>
</head>
<body>
    <div class="row m-0 border-bottom bg-body-tertiary">
        <div class="col-9">
            <strong class="m-auto p-2"><h3>LISTA DE DADOS</h3></strong>
        </div>
        <div class="col-3 m-auto">
            <input type="search" id="pesquisar" class="form-control" placeholder="Pesquisar">
        </div>
    </div>
        <table class='table table-bordered'>
            <tbody id='table'>
    <?php
    echo "
        <tr>
            <th>Total Prduzido</th>
            <th>PRODUTO FINAL</th>
            <th>PERDAS</th>
            <th>RETRABALHO COURO</th>
            <th>RETRABALHO COLA</th>
            <th>TEMPO MÉDIO DE PRODUÇÃO</th>
            <th>TAXA DE PRODUÇÃO</th>
            <th>TAXA DE REFUGO</th>
        </tr>
        ";
    echo "
        <tr>
            <td>".$_SESSION['producao_total']."</td>
            <td>".$_SESSION['produto_final']."</td>
            <td>".$_SESSION['perda']."</td>
            <td>".$_SESSION['retrabalho_couro']."</td>
            <td>".$_SESSION['retrabalho_cola']."</td>
            <td>".$_SESSION['Tempo_medio_producao']."</td>
            <td>".$_SESSION['Taxa_de_Producao']."</td>
            <td>".$_SESSION['taxa_refugo']."</td>
        </tr>
    ";
    ?>
        </tbody>
    </table>
</body>
</html>