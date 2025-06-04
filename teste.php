<?php

session_start();

echo '<pre>';

print_r($_SESSION['usuario']);

print_r($_SESSION["quantidade"]);

print_r($_SESSION["estado"]);

print_r($_SESSION["codigo"]);

print_r($_SESSION["date"]);

print_r($_SESSION["hora"]);

print_r($_SESSION["nome_entrega"]);

print_r($_SESSION["nomes"]);

echo '</pre>';
?>