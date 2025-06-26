<?php
require_once 'inc/users.php';

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}

$user = $_SESSION['user'];
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
    <h1>Добро пожаловать, <?= htmlspecialchars($user['email']) ?></h1>
    <p>Роль: <strong><?= $user['role'] ?></strong></p>
    <p><a href="logout.php">Выйти</a></p>
  </div>
</body>
</html>
