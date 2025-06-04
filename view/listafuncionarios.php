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
    <th>NOME</th>
    <th>CARGO</th>
    <th>SETOR</th>
    <th>DATA ADMISSÃO</th>
</tr>
";

for ($i = 0; $i < count($_SESSION['nomes']); $i++) {
    echo "
        <tr>
            <td>".$_SESSION['nomes'][$i]."</td>
            
        </tr>
    ";
}

/* <td>".$_SESSION['cargo'][$i]."</td>
<td>".$_SESSION['setor'][$i]."</td>
<td>".$_SESSION['dataadm'][$i]."</td> */
?>