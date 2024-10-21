<?php

// Cria a classe Endereco com as propriedades rua, bairro e cidade
class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

$cep = $_GET['cep'] ?? '';

// Se o cep for 38400-100, cria o objeto Endereco contendo Av Floriano, Centro, Uberlândia como propriedades
if ($cep == '38400-100')
  $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
else if ($cep == '38400-200')
  $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
// Se não, cria um objeto Endereco com propriedades vazias
else {
  $endereco = new Endereco('', '', '');
}

// Seta o cabeçalho para indicar que o conteúdo é JSON
header('Content-type: application/json');
// Retorna o objeto Endereco em formato JSON para o front
echo json_encode($endereco);
