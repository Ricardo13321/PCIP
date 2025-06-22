<?php

session_start();

echo '<pre>';
echo "<h1>Usuario</h1>";
print_r($_SESSION['usuario']);
echo "<br><h1>Quantidade</h1>";
print_r($_SESSION["quantidade"]);
echo "<h1>Estado</h1>";
print_r($_SESSION["estado"]);
echo "<h1>Código</h1>";
print_r($_SESSION["codigo"]);
echo "<h1>Data</h1>";
print_r($_SESSION["date"]);
echo "<h1>Hora</h1>";
print_r($_SESSION["hora"]);
echo "<h1>Nomes da lista de entrega</h1>";
print_r($_SESSION["nome_entrega"]);
echo "<h1>Nomes</h1>";
print_r($_SESSION["nomes"]);
echo "<h1>Cargos</h1>";
print_r($_SESSION['cargos']);
echo "<h1>Setor Funcionários</h1>";
print_r($_SESSION["setor_funcionarios"]);
echo "<h1>TAXA DE PRODUÇÃO</h1>";
print_r($_SESSION["Taxa_de_Producao"]);
echo "<h1>TEMPO MÉDIO DE PRODUÇÃO</h1>";
print_r($_SESSION["Tempo_medio_producao"]);
echo "<h1>TAXA DE REFUGO</h1>";
print_r($_SESSION["taxa_refugo"]);
echo "<h1>PORCENTAGEM DE PERDA</h1>";
print_r($_SESSION["porcentagem_perda"]);
echo "<h1>PRODUTO FINAL POR FUNCIONÁRIO</h1>";
print_r($_SESSION["produto_final_funcionario"]);
echo "<h1>REFUGO POR FUNCIONÁRIO</h1>";
print_r($_SESSION["refugo_funcionario"]);
echo "<h1>DESCARTE POR FUNCIONÁRIO</h1>";
print_r($_SESSION["descarte_funcionario"]);
echo "<h1>ID</h1>";
print_r($_SESSION['id']);
echo "<h1>Data Inicial</h1>";
print_r($_SESSION['data_inicial']);
echo "<h1>Data Final</h1>";
print_r($_SESSION['data_final']);
echo "<h1>Data Inicial split</h1>";
print_r($_SESSION['data_inicial_split']);
echo "<h1>Data Final split</h1>";
print_r($_SESSION['data_final_split']);
echo "<h1>Datas Aceitas</h1>";
print_r($_SESSION['datas_aceitas']);

echo '</pre>';
?>