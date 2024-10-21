<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$modelo = $_GET['modelo'] ?? '';

$stmt = $pdo->prepare(
    <<<SQL
    SELECT modelo, ano, cor, quilometragem
    FROM veiculo
    WHERE modelo = ?
    SQL
  );

$stmt->execute([$modelo]);

$arrayVeiculos = $stmt->fetchAll(PDO::FETCH_OBJ);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arrayVeiculos);
