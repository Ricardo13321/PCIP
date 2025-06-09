<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

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