<?php
date_default_timezone_set('America/Sao_Paulo');

$nome = "Juan";
$codigo = "32483";
$quantidade = "30";
$modelo = "Social";
$status= "Produto final";

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

for ($i = 0; $i < 30; $i++) {
    echo "
        <tr>
            <td>$nome</td>
            <td>$codigo</td>
            <td>$quantidade</td>
            <td>$modelo</td>
            <td>$status</td>
            <td>" . date("d") . "/" . date("m") . "/" . date("Y") . "</td>
            <td>" . date("H:i:s") . "</td>
        </tr>
    ";
}
?>