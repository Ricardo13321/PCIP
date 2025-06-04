<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}


date_default_timezone_set('America/Sao_Paulo');

$filecodigo = file_get_contents("data/codigo.json");
$filequantidade = file_get_contents("data/quantidade.json");
$fileestado = file_get_contents("data/estado.json");
$filenome = file_get_contents("data/nome_entrega.json");
$filedate = file_get_contents("data/date.json");
$filehora = file_get_contents("data/hora.json");

$_SESSION['codigo'] = json_decode($filecodigo, true);
$_SESSION['quantidade'] = json_decode($filequantidade, true);
$_SESSION['estado'] = json_decode($fileestado, true);
$_SESSION['nome'] = json_decode($filenome, true);
$_SESSION['date'] = json_decode($filedate, true);
$_SESSION['hora'] = json_decode($filehora, true);

echo "
<tr>
    <th>Funcionário</th>
    <th>Código</th>
    <th>Quantidade</th>
    <th>Modelo</th>
    <th>Estado</th>
    <th>Data</th>
    <th>Hora</th>
</tr>
";

for ($i = 0; $i < count($_SESSION['nome']); $i++) {
    echo "
        <tr>
            <td>".$_SESSION['nome'][$i]."</td>
            <td>".$_SESSION['codigo'][$i]."</td>
            <td>".$_SESSION['quantidade'][$i]."</td>
            <td>Bota</td>
            <td>".$_SESSION['estado'][$i]."</td>
            <td>".$_SESSION['date'][$i]."</td>
            <td>".$_SESSION['hora'][$i]."</td>
        </tr>
    ";
}
?>