<?php
require_once 'inc/db.php';
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}

$userId = $_SESSION['user']['id'];

$stmt = $pdo->prepare("SELECT * FROM results WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$userId]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="auth-container">
    <h1>Добро пожаловать, <?= htmlspecialchars($_SESSION['user']['email']) ?>!</h1>
    <p><a href="index.html">Перейти к тестированию</a></p>
    <p><a href="logout.php">Выйти</a></p>
    <h2>Результаты скрининга:</h2>
    <?php if ($results): ?>
      <ul>
        <?php foreach ($results as $res): ?>
          <li>
            <strong><?= $res['created_at'] ?>:</strong><br>
            <?= htmlspecialchars($res['result_text']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p>Пока нет результатов.</p>
    <?php endif; ?>
  </div>
</body>
</html>

