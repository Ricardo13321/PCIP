<?php
if (!isset($_SESSION)) {
    session_start();
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

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
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

    foreach ($_SESSION[$ordem] as $key1 => $value1) {
        foreach ($array_ordenado as $key2 => $value2) {
            if($value1 == $value2) {
                array_push($nome_entrega, $_SESSION['nome_entrega'][$key2]);
                array_push($codigo, $_SESSION['codigo'][$key2]);
                array_push($quantidade, $_SESSION['quantidade'][$key2]);
                array_push($estado, $_SESSION['estado'][$key2]);
                array_push($date, $_SESSION['date'][$key2]);
                array_push($hora, $_SESSION['hora'][$key2]);
            }
        }
    }
} else {
    $nome_entrega = $_SESSION['nome_entrega'];
    $codigo = $_SESSION['codigo'];
    $quantidade = $_SESSION['quantidade'];
    $estado = $_SESSION['estado'];
    $date = $_SESSION['date'];
    $hora = $_SESSION['hora'];
}




echo "
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
    </tr>
";
$page = $page-1;
for ($i = $page*15; $i < count($_SESSION['nome_entrega']); $i++) {
    echo "
        <tr>
            <td>$i</td>
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
        break;
    }
}

echo '
</tbody>
    <tfoot>                   
        <nav aria-label="...">
            <ul class="pagination pagination-lg">
                <li class="page-item" >
                    <a class="page-link" href="?page=1&ordem='.$ordem.'">1</>
                </li>
                <li class="page-item"><a class="page-link" href="listagem.php?page=2&ordem='.$ordem.'">2</a></li>
                <li class="page-item"><a class="page-link" href="?page=3&ordem='.$ordem.'">3</a></li>
            </ul>
        </nav>
    </tfoot>
</table>';
?>


