<?php
require_once '../inc/publications.php';

$id = $_GET['id'] ?? null;
$pub = null;
foreach ($publications as $p) {
  if ($p['id'] == $id) {
    $pub = $p;
    break;
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?= $pub ? $pub['title'] : 'Публикация не найдена' ?></title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <?php if ($pub): ?>
    <div id="publication-container">
      <h1><?= $pub['title'] ?></h1>
      <p><strong>Автор:</strong> <?= $pub['author'] ?></p>
      <p><?= $pub['content'] ?></p>
      <a href="index.php">← Назад</a>
    </div>
  <?php else: ?>
    <p>Публикация не найдена</p>
  <?php endif; ?>
</body>
</html>
