<?php
require_once 'inc/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
  $stmt->execute([$email, $password]);

  $userId = $pdo->lastInsertId();
  $_SESSION['user'] = [
    'id' => $userId,
    'email' => $email
  ];

  header('Location: dashboard.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="auth-container">
    <h1>Регистрация</h1>
    <form method="POST">
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <button type="submit" class="btn-primary">Создать аккаунт</button>
      <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
    </form>
  </div>
</body>
</html>
