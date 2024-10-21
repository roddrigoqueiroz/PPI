<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$stmt = $pdo->prepare(
    <<<SQL
    SELECT DISTINCT marca
    FROM veiculo
    SQL
  );

$arrayVeiculos = $stmt->fetchAll(PDO::FETCH_OBJ);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arrayVeiculos);
