<?php
require_once 'inc/db.php';
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && $user['password'] === $password) {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'email' => $user['email']
    ];
    header('Location: dashboard.php');
    exit;
  } else {
    $error = 'Неверный логин или пароль';
  }
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <div class="auth-container">
    <h1>Вход</h1>
    <?php if ($error): ?>
      <div class="auth-error"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <button type="submit" class="btn-primary">Войти</button>
      <p>Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
    </form>
  </div>
</body>
</html>
