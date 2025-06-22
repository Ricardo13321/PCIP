<?php
$array_ordem = $_SESSION[$ordem];
$id = $_SESSION['id'];
$nome_entrega = $_SESSION['nome_entrega'];
$codigo = $_SESSION['codigo'];
$quantidade = $_SESSION['quantidade'];
$estado = $_SESSION['estado'];
$date = $_SESSION['datas_aceitas'];
$hora = $_SESSION['hora'];

array_multisort($array_ordem, $id);
array_multisort($array_ordem, $nome_entrega);
array_multisort($array_ordem, $codigo);
array_multisort($array_ordem, $quantidade);
array_multisort($array_ordem, $estado);
array_multisort($array_ordem, $date);
array_multisort($array_ordem, $hora);


switch ($ordem) {
    case 'id':
        $id = $array_ordem;
        break;
    case 'nome_entrega':
        $nome_entrega = $array_ordem;
        break;
    case 'codigo':
        $codigo = $array_ordem;
        break;
    case 'quantidade':
        $quantidade = $array_ordem;
        break;
    case 'estado':
        $estado = $array_ordem;
        break;
    case 'date':
        $date = $array_ordem;
        break;
    case 'hora':
        $hora = $array_ordem;
        break;
    default:
        exit();
}
?>