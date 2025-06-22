<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

$codigo = $_GET['codigo'];
$qtdProdutoFinal = $_GET['Produto_final'];
$qtdDefeitoCouro = $_GET['Defeito_couro'];
$qtdDefeitoCola = $_GET['Defeito_cola'];
$qtdPerda = $_GET['Perda'];

date_default_timezone_set('America/Sao_Paulo');

if ($qtdProdutoFinal != 0) {
    array_push($_SESSION["quantidade"], $qtdProdutoFinal);
    array_push($_SESSION["estado"], "Produto final");
    adicionardados($codigo);
}
if($qtdDefeitoCouro != 0) {
    array_push($_SESSION["quantidade"], $qtdDefeitoCouro);
    array_push($_SESSION["estado"], "Defeito couro");
    adicionardados($codigo);
}
if($qtdDefeitoCola != 0) {
    array_push($_SESSION["quantidade"], $qtdDefeitoCola);
    array_push($_SESSION["estado"], "Defeito cola");
    adicionardados($codigo);
}
if ($qtdPerda != 0) {
    array_push($_SESSION["quantidade"], $qtdPerda);
    array_push($_SESSION["estado"], "Perda");
    adicionardados($codigo);
}


function adicionardados($codigo) {
    array_push($_SESSION['codigo'], $codigo);
    array_push($_SESSION['nome_entrega'], $_SESSION['usuario']);
    array_push($_SESSION['date'], date("m/d/Y"));
    array_push($_SESSION['datas_aceitas'], date("m/d/Y"));
    array_push($_SESSION['hora'], date("H:i:s"));
}
$_SESSION['id'] = [];
for ($i=0; $i < count($_SESSION["nome_entrega"]); $i++) { 
    array_push($_SESSION['id'], $i);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function back() {
            location.replace("../view/formdados.php");
        }
        
        setTimeout(back, 3000);
    </script>
</head>
<body>
    <div><h3>Dados salvos com sucesso!</h3></div>
</body>
</html>