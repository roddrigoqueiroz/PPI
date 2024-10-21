<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$marca = $_GET['marca'] ?? '';

$stmt = $pdo->prepare(
    <<<SQL
    SELECT DISTINCT modelo
    FROM veiculo
    WHERE marca = ?
    SQL
  );

$stmt->execute([$marca]);

$arrayVeiculos = $stmt->fetchAll(PDO::FETCH_OBJ);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arrayVeiculos);
