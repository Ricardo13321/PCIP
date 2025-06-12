<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

if(!isset($_GET['page'])) {
    $page = 1;
} else {
    $page =  $_GET['page'];
}

if(!isset($_GET['ordem'])) {
    $ordem = "id";
} else {
    $ordem = $_GET["ordem"];
}

if($ordem != "id") {

    $array_ordenado = $_SESSION[$ordem];
    sort($array_ordenado);

    $nome_entrega = [];
    $codigo = [];
    $quantidade = [];
    $estado = [];
    $date = [];
    $hora = [];
    $id = [];

    foreach ($_SESSION[$ordem] as $key1 => $value1) {
        foreach ($array_ordenado as $key2 => $value2) {
            if($value1 == $value2) {
                array_push($id, $key1);
                array_push($nome_entrega, $_SESSION['nome_entrega'][$key1]);
                array_push($codigo, $_SESSION['codigo'][$key1]);
                array_push($quantidade, $_SESSION['quantidade'][$key1]);
                array_push($estado, $_SESSION['estado'][$key1]);
                array_push($date, $_SESSION['date'][$key1]);
                array_push($hora, $_SESSION['hora'][$key1]);
            }
        }
    }
} else {
    $id = [];
    for ($i=0; $i < count($_SESSION["nome_entrega"]); $i++) { 
        array_push($id, $i);
    }
    $nome_entrega = $_SESSION['nome_entrega'];
    $codigo = $_SESSION['codigo'];
    $quantidade = $_SESSION['quantidade'];
    $estado = $_SESSION['estado'];
    $date = $_SESSION['date'];
    $hora = $_SESSION['hora'];
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
</head>
<body>
    <div class="row m-0 sticky-top border-bottom bg-body-tertiary">
        <div class="col-9">
            <strong class="m-auto p-2"><h3>LISTAGEM DO DIA <?php echo date("d/m/Y"); ?></h3></strong>
        </div>
        <div class="col-3 m-auto">
            <input type="search" id="pesquisar" class="form-control" placeholder="Pesquisar">
        </div>
    </div>
    
    
    <?php
        echo "
        <div class='h-100'>
        <table class='table table-bordered'>
            <tbody id='table'>
                <tr>
                    <th><a href='?page=".$page."&ordem=id'>ID</a></th>
                    <th><a href='?page=".$page."&ordem=nome_entrega'>Funcionário</th>
                    <th><a href='?page=".$page."&ordem=codigo'>Código</th>
                    <th><a href='?page=".$page."&ordem=quantidade'>Quantidade</th>
                    <th>Modelo</th>
                    <th><a href='?page=".$page."&ordem=estado'>Estado</th>
                    <th><a href='?page=".$page."&ordem=date'>Data</th>
                    <th><a href='?page=".$page."&ordem=hora'>Hora</th>
                </tr>";

        $page = $page-1;
        for ($i = $page*15; $i < count($_SESSION['nome_entrega']); $i++) {
            echo "
                <tr>
                    <td>$id[$i]</td>
                    <td>".$nome_entrega[$i]."</td>
                    <td>".$codigo[$i]."</td>
                    <td>".$quantidade[$i]."</td>
                    <td>Bota</td>
                    <td>".$estado[$i]."</td>
                    <td>".$date[$i]."</td>
                    <td>".$hora[$i]."</td>
                </tr>
            ";
            if ($i == ($page*15)+15) {
                //break;
            }
        }
        echo '
            </tbody>
        </table>

        ';
        echo '<nav>
            <ul class="pagination d-flex justify-content-center mt-1">
                <li class="page-item"><a class="page-link '.(($page=="0")?'disabled':' ').'" href="?page='.($page).'&ordem='.$ordem.'">Voltar</a></li>';
                for ($i=0; $i < count($_SESSION['nome_entrega'])/15; $i++) { 
                    echo '<li class="page-item"><a class="page-link '.((($page)==$i)?'active':' ').' " href="?page='.($i+1).'&ordem='.$ordem.'">'.($i+1).'</a></li>';
                }
        echo    '<li class="page-item"><a class="page-link '.((($page)=="3")?'disabled':' ').'" href="?page='.($page+2).'&ordem='.$ordem.'">Avançar</a></li>
            </ul>
        </nav>
                </div>';
    ?>
</body>
</html>
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