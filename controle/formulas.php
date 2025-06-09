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

Dayli - 09/06

Exibição dos Dados e Indicadores na Tabela: Atualização da página de visualização de dados para exibir não apenas os dados brutos de produção, mas também os indicadores calculados (taxa de produção e taxa de refugo) em colunas adicionais na tabela.

Integração dos Cálculos na Leitura dos Dados: Modificação do script PHP que lê os dados do arquivo para que, para cada registro de produção, as funções de cálculo da taxa de produção e taxa de refugo sejam chamadas e os resultados armazenados no array.

*/

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
    $taxa_refugo = ($refugo / $_SESSION['producao_total']) * 100;
    $_SESSION['taxa_refugo']  = number_format($taxa_refugo, 2, '.');

    $_SESSION['porcentagem_produto_final'] = ($_SESSION["produto_final"]/$_SESSION["producao_total"])*100;
    $_SESSION['porcentagem_perda'] = ($_SESSION["perda"]/$_SESSION["producao_total"])*100;


    $_SESSION['produto_final_funcionario'] = [];
    $_SESSION['refugo_funcionario'] = [];
    $_SESSION['descarte_funcionario'] = [];

    foreach ($_SESSION["nomes"] as $key_1 => $value_1) {
        
        array_push($_SESSION['produto_final_funcionario'], 0);
        array_push($_SESSION['refugo_funcionario'], 0);
        array_push($_SESSION['descarte_funcionario'], 0);

        foreach ($_SESSION["nome_entrega"] as $key_2 => $value_2) {
            if ($value_1 == $value_2) {
                if($_SESSION["estado"][$key_2] == "Produto final") {
                    $_SESSION['produto_final_funcionario'][$key_1] += $_SESSION["quantidade"][$key_2];
                }
                if ($_SESSION["estado"][$key_2] == "Defeito couro" || $_SESSION["estado"][$key_2] == "Defeito cola") {
                    $_SESSION['refugo_funcionario'][$key_1] += $_SESSION["quantidade"][$key_2];
                }
                if ($_SESSION["estado"][$key_2] == "Perda") {
                    $_SESSION['descarte_funcionario'][$key_1] += $_SESSION["quantidade"][$key_2];
                }
            }
        }
    }
?>