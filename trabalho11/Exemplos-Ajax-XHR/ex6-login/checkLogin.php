<?php

class LoginResult
{
  public $isAuthorized;
  public $newLocation;

  function __construct($isAuthorized, $newLocation)
  {
    $this->isAuthorized = $isAuthorized;
    $this->newLocation = $newLocation;
  }
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Validação simplificada para fins didáticos. Não faça isso!
if ($email == 'fulano@mail.com' && $senha == '123456')
  // Atribui à variável loginResult o índice da página a ser redirecionado quando o login for bem-sucedido
  $loginResult = new LoginResult(true, 'home.html');
else
  // Atribui um valor vazio para o redirecionamento, para que assim ele não ocorra e no front
  // seja exibida a mensagem de erro
  $loginResult = new LoginResult(false, '');

header('Content-type: application/json');
echo json_encode($loginResult);