<?php
session_start();
//Responsável por organizar o filtro para armazenar os dados referentes as datas específicas
date_default_timezone_set('America/Sao_Paulo');

//Aqui é onde eu declaro as variáveis de sessão
$_SESSION['datas_aceitas'] = [];
$_SESSION['cargos'] = [];
$_SESSION["nomes"] = [];
$_SESSION["data_admissao"] = [];
$_SESSION['setor_funcionarios'] = [];
$_SESSION['codigo'] = [];
$_SESSION['quantidade'] = [];
$_SESSION['estado'] = [];
$_SESSION['date'] = [];
$_SESSION['hora'] = [];
$_SESSION["nome_entrega"] = [];
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
$_SESSION['data_inicial'] = date('Y-m-d');
$_SESSION['data_final'] = date('Y-m-d');
$_SESSION['privilegios'] = '';
$_SESSION['Tempo_medio_producao'] = 0;
$_SESSION['taxa_refugo'] = 0;
$_SESSION['porcentagem_produto_final'] = 0;
$_SESSION['porcentagem_perda'] = 0;
$_SESSION['produto_final_funcionario'] = [];
$_SESSION['refugo_funcionario'] = [];
$_SESSION['descarte_funcionario'] = [];

//Pegando todos os dados dos arquivos json
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

//Decodificando os dados e passando para um array da sessão respectivo
$decodedcargos = json_decode($filecargos, true);
$decodednomes = json_decode($filenomes, true);
$decodeddata_admissao = json_decode($filedataadmissao, true);
$decodedsetor_funcionarios = json_decode($filesetorfuncionarios, true);
$decodedcodigo = json_decode($filecodigo, true);
$decodedquantidade = json_decode($filequantidade, true);
$decodedestado = json_decode($fileestado, true);
$decodeddate = json_decode($filedate, true);
$decodedhora = json_decode($filehora, true);
$decodednome_entrega = json_decode($filenomeentrega, true);

$_SESSION['cargos'] =  $decodedcargos;
$_SESSION["nomes"] =  $decodednomes;
$_SESSION["data_admissao"] =  $decodeddata_admissao;
$_SESSION['setor_funcionarios'] =  $decodedsetor_funcionarios;
$_SESSION['date'] = $decodeddate;
$_SESSION['codigo'] = $decodedcodigo;
$_SESSION['quantidade'] = $decodedquantidade;
$_SESSION['estado'] = $decodedestado;
$_SESSION['hora'] = $decodedhora;
$_SESSION["nome_entrega"] = $decodednome_entrega;

//Essa função seta os privilégios do usuário o que limita o que ele pode editar no aplicativo.
if ($_SESSION['cargos'][$_SESSION['indice']] == 'chefe' || $_SESSION['cargos'][$_SESSION['indice']] == 'gerente de linha') {
    $_SESSION['privilegios'] = 'admin';
} elseif ($_SESSION['cargos'][$_SESSION['indice']] == 'funcionario') {
    $_SESSION['privilegios'] = 'funcionario';
} elseif ($_SESSION['cargos'][$_SESSION['indice']] == 'pcp') {
    $_SESSION['privilegios'] = 'pcp';
}

if(isset($_GET['url'])) {
    header("Location: ".$_GET['url']);
} else {
    header("Location: filtrardados.php");
}
?>