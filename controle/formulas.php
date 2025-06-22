<?php
    $_SESSION['Tempo_medio_producao'] = 0;
    $_SESSION['taxa_refugo'] = 0;
    $_SESSION['porcentagem_produto_final'] = 0;
    $_SESSION['porcentagem_perda'] = 0;
    $_SESSION['produto_final_funcionario'] = [];
    $_SESSION['refugo_funcionario'] = [];
    $_SESSION['descarte_funcionario'] = [];
    //Total Produzido
    $Taxa_de_Producao = ($_SESSION["producao_total"] / 1000)*100;
    $_SESSION['Taxa_de_Producao'] = number_format($Taxa_de_Producao, 2, '.');

    //Tempo Médio de Produção
    $count_funcionario = 0;
    foreach ($_SESSION["nomes"] as $key => $value) {
        if ($_SESSION['cargos'][$key] == 'funcionario') {
            $count_funcionario++;
        }
    }
    $Tempo_medio_producao = $_SESSION["producao_total"] / $count_funcionario;
    $_SESSION['Tempo_medio_producao'] = number_format($Tempo_medio_producao, 2, '.');

    //Taxa de Refugo
    $refugo = $_SESSION['retrabalho_couro'] + $_SESSION['retrabalho_cola'];
    if($_SESSION['producao_total'] != 0) {
        $taxa_refugo = ($refugo / $_SESSION['producao_total']) * 100;
        $_SESSION['taxa_refugo']  = number_format($taxa_refugo, 2, '.');
        $_SESSION['porcentagem_produto_final'] = ($_SESSION["produto_final"]/$_SESSION["producao_total"])*100;
        $_SESSION['porcentagem_perda'] = ($_SESSION["perda"]/$_SESSION["producao_total"])*100;
    }
    
    

    foreach ($_SESSION["nomes"] as $key_1 => $value_1) {
        
        array_push($_SESSION['produto_final_funcionario'], 0);
        array_push($_SESSION['refugo_funcionario'], 0);
        array_push($_SESSION['descarte_funcionario'], 0);

        foreach ($_SESSION["nome_entrega_filtro"] as $key_2 => $value_2) {
            if ($value_1 == $value_2) {
                if($_SESSION["estado_filtro"][$key_2] == "Produto final") {
                    $_SESSION['produto_final_funcionario'][$key_1] += $_SESSION["quantidade_filtro"][$key_2];
                }
                if ($_SESSION["estado_filtro"][$key_2] == "Defeito couro" || $_SESSION["estado_filtro"][$key_2] == "Defeito cola") {
                    $_SESSION['refugo_funcionario'][$key_1] += $_SESSION["quantidade_filtro"][$key_2];
                }
                if ($_SESSION["estado_filtro"][$key_2] == "Perda") {
                    $_SESSION['descarte_funcionario'][$key_1] += $_SESSION["quantidade_filtro"][$key_2];
                }
            }
        }
    }
?>