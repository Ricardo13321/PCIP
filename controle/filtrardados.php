<?php
session_start();
$_SESSION['datas_aceitas'] = [];
$_SESSION['id'] = [];
$_SESSION['codigo_filtro'] = [];
$_SESSION['quantidade_filtro'] = [];
$_SESSION['estado_filtro'] = [];
$_SESSION['date_filtro'] = [];
$_SESSION['hora_filtro'] = [];
$_SESSION["nome_entrega_filtro"] = [];
$_SESSION["retrabalho_couro"] = 0;
$_SESSION["retrabalho_cola"] = 0;
$_SESSION["producao_total"] = 0;
$_SESSION["produto_final"] = 0;
$_SESSION["perda"] = 0;

date_default_timezone_set('America/Sao_Paulo');

//Aqui é onde filtramos os dados
if (isset($_GET['data_inicial']) && isset($_GET['data_final'])) {
    $_SESSION['data_inicial'] = $_GET['data_inicial'];
    $_SESSION['data_final'] = $_GET['data_final'];
} else {
    $_SESSION['data_inicial'] = $_SESSION['date'][0];
    $_SESSION['data_final'] = $_SESSION['date'][(int)array_key_last($_SESSION['date'])];
    $count = 0;
    $_loc_ = null;
    foreach ($_SESSION['date'] as $key => $value) {
        if ($value != $_loc_) {
            $_loc_ = $value;
            $count++;
        }
        if ($count == 7) {
            $_SESSION['data_final'] = $value;
            break;
        }
    }
}

$_SESSION['data_inicial_split'] = new DateTime($_SESSION['data_inicial']);
$_SESSION['data_final_split'] = new DateTime($_SESSION['data_final']);

foreach ($_SESSION['date'] as $key => $value) {
    $datesplit = new DateTime($value);
    //array_push($_SESSION['datas_aceitas'], $datesplit);
    if($datesplit >= $_SESSION['data_inicial_split'] && $datesplit <= $_SESSION['data_final_split']) {
        array_push($_SESSION['datas_aceitas'], $value);
        array_push($_SESSION['codigo_filtro'], $_SESSION['codigo'][$key]);
        array_push($_SESSION['quantidade_filtro'], $_SESSION['quantidade'][$key]);
        array_push($_SESSION['estado_filtro'], $_SESSION['estado'][$key]);
        array_push($_SESSION['hora_filtro'], $_SESSION['hora'][$key]);
        array_push($_SESSION["nome_entrega_filtro"], $_SESSION['nome_entrega'][$key]);
        array_push($_SESSION['id'], $key);
    }
}

foreach ($_SESSION["estado_filtro"] as $key => $value) {
    if ($value == "Produto final") {
        $_SESSION["produto_final"] += $_SESSION["quantidade_filtro"][$key];
    } elseif ($value == "Defeito couro") {
        $_SESSION["retrabalho_couro"] += $_SESSION["quantidade_filtro"][$key];
    } elseif ($value == "Defeito cola") {
        $_SESSION["retrabalho_cola"] += $_SESSION["quantidade_filtro"][$key];
    } elseif ($value == "Perda") {
        $_SESSION["perda"] += $_SESSION["quantidade_filtro"][$key];
    }
    $_SESSION["producao_total"] += $_SESSION["quantidade_filtro"][$key];
}

if(isset($_GET['url'])) {
    header("Location: ".$_GET['url']);
} else {
    header("Location: ../areausuario.php");
}
?>