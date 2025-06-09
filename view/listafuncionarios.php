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
    <th>NOME</th>
    <th>CARGO</th>
    <th>SETOR</th>
    <th>DATA ADMISSÃO</th>";
if ($_SESSION['privilegios'] == 'admin') {
    echo '<th>OPÇÕES</th>';
}

    echo "</tr>";

for ($i = 0; $i < count($_SESSION['nomes']); $i++) {
    echo "
        <tr>
            <td>$i</td>
            <td>".$_SESSION['nomes'][$i]."</td>
            <td>".$_SESSION['cargos'][$i]."</td>
            <td>".$_SESSION['setor_funcionarios'][$i]."</td>
            <td>".$_SESSION['data_admissao'][$i]."</td>";
    if ($_SESSION['privilegios'] == 'admin') {
        echo '
            <th>
                <button type="button" onclick="editar('.$i.');" class="btn btn-primary">Editar</button>
                <button type="button" onclick="excluir('.$i.');" class="btn btn-danger">Excluir</button>
            </th>
            ';
    }
    echo "</tr>";
}

/* <td>".$_SESSION['cargo'][$i]."</td>
<td>".$_SESSION['setor'][$i]."</td>
<td>".$_SESSION['dataadm'][$i]."</td> */
?>