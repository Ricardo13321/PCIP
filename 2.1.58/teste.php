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
echo '</pre>';
?>