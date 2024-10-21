<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {
  // Seta a query para buscar todos os alunos limitado a 30 registros
  $stmt = $pdo->query(
    <<<SQL
    SELECT *
    FROM aluno
    LIMIT 30
    SQL
  );
  // Pega todos os registros encontrados
  $arrayAlunos = $stmt->fetchAll(PDO::FETCH_OBJ);
  // Seta o header da resposta para JSON
  header('Content-Type: application/json; charset=utf-8');
  // Retorna o array de alunos em formato JSON para o navegador
  echo json_encode($arrayAlunos);
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}
