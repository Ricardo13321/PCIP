<?php
session_start();

$filecodigo = file_get_contents("../data/codigo.json");
$filequantidade = file_get_contents("../data/quantidade.json");
$fileestado = file_get_contents("../data/estado.json");
$filenomeentrega = file_get_contents("../data/nome_entrega.json");
$filedate = file_get_contents("../data/date.json");
$filehora = file_get_contents("../data/hora.json");
$filenomes = file_get_contents("../data/nome.json");
$filecargos = file_get_contents("../data/cargos.json");

$_SESSION['codigo'] = json_decode($filecodigo, true);
$_SESSION['quantidade'] = json_decode($filequantidade, true);
$_SESSION['estado'] = json_decode($fileestado, true);
$_SESSION['date'] = json_decode($filedate, true);
$_SESSION['hora'] = json_decode($filehora, true);
$_SESSION['cargos'] = json_decode($filecargos, true);

$_SESSION["nome_entrega"] = json_decode($filenomeentrega, true);
$_SESSION["nomes"] = json_decode($filenomes, true);

$_SESSION["retrabalho_couro"] = 0;
$_SESSION["retrabalho_cola"] = 0;
$_SESSION["producao_total"] = 0;
$_SESSION["produto_final"] = 0;
$_SESSION["perda"] = 0;

foreach ($_SESSION["estado"] as $key => $value) {
    if ($value == "Produto final") {
        $_SESSION["produto_final"] += $_SESSION["quantidade"][$key];
    } elseif ($value == "Defeito couro") {
        $_SESSION["retrabalho_couro"] += $_SESSION["quantidade"][$key];
    } elseif ($value == "Defeito cola") {
        $_SESSION["retrabalho_cola"] += $_SESSION["quantidade"][$key];
    } elseif ($value == "Perda") {
        $_SESSION["perda"] += $_SESSION["quantidade"][$key];
    }
    $_SESSION["producao_total"] += $_SESSION["quantidade"][$key];
}

header("Location: ../dashboard.php");
?>