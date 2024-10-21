<?php

// Pega o conteúdo da variável cep enviada via GET
$cep = $_GET['cep'] ?? '';

// Verifica o valor da variável cep e retorna a cidade correspondente
// Se não, retorna um erro 404 e uma mensagem de erro
if $cep == '38400-100')
  echo 'Uberlândia';
else if ($cep == '38700-000')
  echo 'Patos de Minas';
else {
  http_response_code(404);
  echo "$cep is not available";
}