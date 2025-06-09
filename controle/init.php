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
$filesetorfuncionarios = file_get_contents("../data/setorfuncionarios.json");
$filedataadmissao = file_get_contents("../data/dataadmissao.json");

$_SESSION['codigo'] = json_decode($filecodigo, true);
$_SESSION['quantidade'] = json_decode($filequantidade, true);
$_SESSION['estado'] = json_decode($fileestado, true);
$_SESSION['date'] = json_decode($filedate, true);
$_SESSION['hora'] = json_decode($filehora, true);
$_SESSION['cargos'] = json_decode($filecargos, true);
$_SESSION['setor_funcionarios'] = json_decode($filesetorfuncionarios, true);
$_SESSION["nome_entrega"] = json_decode($filenomeentrega, true);
$_SESSION["nomes"] = json_decode($filenomes, true);
$_SESSION["data_admissao"] = json_decode($filedataadmissao, true);

$_SESSION["retrabalho_couro"] = 0;
$_SESSION["retrabalho_cola"] = 0;
$_SESSION["producao_total"] = 0;
$_SESSION["produto_final"] = 0;
$_SESSION["perda"] = 0;

//Essa função seta os privilégios do usuário o que limita o que ele pode editar no aplicativo.
if ($_SESSION['cargos'][$_SESSION['indice']] == 'chefe' || $_SESSION['cargos'][$_SESSION['indice']] == 'gerente de linha') {
    $_SESSION['privilegios'] = 'admin';
} elseif ($_SESSION['cargos'][$_SESSION['indice']] == 'funcionario') {
    $_SESSION['privilegios'] = 'funcionario';
} elseif ($_SESSION['cargos'][$_SESSION['indice']] == 'pcp') {
    $_SESSION['privilegios'] = 'pcp';
}

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

//Calcula e inicia a sessão dos valores calculados
include 'forumlas.php';

header("Location: ../dashboard.php");
?>