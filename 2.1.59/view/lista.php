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
    <th>ID</th>
    <th>Funcionário</th>
    <th>Código</th>
    <th>Quantidade</th>
    <th>Modelo</th>
    <th>Estado</th>
    <th>Data</th>
    <th>Hora</th>
</tr>
";

for ($i = 0; $i < count($_SESSION['nome_entrega']); $i++) {
    echo "
        <tr>
            <td>$i</td>
            <td>".$_SESSION['nome_entrega'][$i]."</td>
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