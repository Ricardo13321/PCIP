<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

include('../controle/formulas.php');
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
            <strong class="m-auto p-2">
                <h3>LISTA DE FUNCIONÁRIOS</h3>
            </strong>
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
    <th>ID</th>
    <th>NOME</th>
    <th>CARGO</th>
    <th>SETOR</th>
    <th>DATA ADMISSÃO</th>";
            if ($_SESSION['privilegios'] == 'admin') {
                echo '<th>OPÇÕES</th>';
            }

            echo "</tr>";

            for ($i = 0; $i < count($_SESSION['nomes']); $i++) {
                echo "
        <tr>
            <td>$i</td>
            <td>" . $_SESSION['nomes'][$i] . "</td>
            <td>" . $_SESSION['cargos'][$i] . "</td>
            <td>" . $_SESSION['setor_funcionarios'][$i] . "</td>
            <td>" . $_SESSION['data_admissao'][$i] . "</td>";
                if ($_SESSION['privilegios'] == 'admin') {
                    echo '
            <th>
                <button type="button" onclick="editar(' . $i . ');" class="btn btn-primary">Editar</button>
                <button type="button" onclick="excluir(' . $i . ');" class="btn btn-danger">Excluir</button>
            </th>
            ';
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>