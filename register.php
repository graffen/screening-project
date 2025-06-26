<?php
require_once 'inc/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Просто имитируем регистрацию
  $_SESSION['user'] = [
    'email' => $_POST['email'],
    'role' => 'user'
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
