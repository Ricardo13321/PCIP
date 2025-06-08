<?php
/* 
Dayli - 05/06

Função para Calcular a Taxa de Produção: Implementação de uma função em PHP que recebe a quantidade produzida e o tempo de produção e calcula a taxa de produção (unidades por minuto).

Função para Calcular a Taxa de Refugo: Implementação de uma função em PHP que recebe a quantidade produzida e a quantidade de refugo e calcula a taxa de refugo (percentual de refugo).

Cálculos
Taxa de Produção
Tp = produzido / meta * 100
Taxa de Refugo
Tr = refugo / produzidas * 100
Tempo médio de produção
Tmp = peçasproduzidas / númerohorastrabalhadas 
*/

    //Total Produzido
    $Taxa_de_Producao = ($_SESSION["producao_total"] / 1000)*100;
    $Taxa_de_Producao = number_format($Taxa_de_Producao, 2, '.');

    //Tempo Médio de Produção
    $count_funcionario = 0;
    foreach ($_SESSION["nomes"] as $key => $value) {
        if ($_SESSION['cargos'][$key] == 'funcionario') {
            $count_funcionario++;
        }
    }
    $Tempo_medio_producao = $_SESSION["producao_total"] / $count_funcionario;
    $Tempo_medio_producao = number_format($Tempo_medio_producao, 2, '.');

    //Taxa de Refugo
    $refugo = $_SESSION['retrabalho_couro'] + $_SESSION['retrabalho_cola'];
    $taxa_refugo = ($refugo / $_SESSION['producao_total']) * 100;
    $taxa_refugo  = number_format($taxa_refugo, 2, '.');

?>