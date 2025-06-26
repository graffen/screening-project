<?php
require_once '../inc/db.php';
session_start();

if (!isset($_SESSION['user'])) {
  http_response_code(401);
  echo 'Не авторизован';
  exit;
}

$userId = $_SESSION['user']['id'];
$data = json_decode(file_get_contents('php://input'), true);

$testData = json_encode($data['answers'] ?? []);
$resultText = $data['result'] ?? 'Нет результата';

$stmt = $pdo->prepare("INSERT INTO results (user_id, test_data, result_text) VALUES (?, ?, ?)");
$stmt->execute([$userId, $testData, $resultText]);

echo 'Сохранено';
