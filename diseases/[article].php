<?php
require_once '../inc/articles.php';

$id = $_GET['id'] ?? null;
$article = null;
foreach ($articles as $a) {
  if ($a['id'] == $id) {
    $article = $a;
    break;
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?= $article ? $article['title'] : 'Статья не найдена' ?></title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <?php if ($article): ?>
    <div id="article-container">
      <h1><?= $article['title'] ?></h1>
      <p><strong>Симптомы:</strong> <?= $article['symptoms'] ?></p>
      <p><?= $article['description'] ?></p>
      <a href="index.php">← Назад</a>
    </div>
  <?php else: ?>
    <p>Статья не найдена</p>
  <?php endif; ?>
</body>
</html>
