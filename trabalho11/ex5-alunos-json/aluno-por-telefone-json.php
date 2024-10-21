<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

// Pega o conteúdo da variável telefone enviada via GET
// É essa a variável que eu preciso mudar na url para conseguir buscar o Ciclano
$telefone = $_GET['telefone'] ?? '';

try {
  // Seta a query para buscar o aluno pelo telefone
  $stmt = $pdo->prepare(
    <<<SQL
    SELECT *
    FROM aluno
    WHERE telefone = ?
    SQL
  );
  // Substitui o ? da query pelo telefone
  $stmt->execute([$telefone]);
  $aluno = $stmt->fetch(PDO::FETCH_OBJ);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($aluno);
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}
