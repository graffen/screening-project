<?php require_once '../inc/publications.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Рекомендации</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <h1>Рекомендации врачей</h1>
  <div class="publication-list">
    <?php foreach ($publications as $pub): ?>
      <div class="publication-card">
        <h2><?= $pub['title'] ?></h2>
        <p><strong>Автор:</strong> <?= $pub['author'] ?></p>
        <a href="publication.php?id=<?= $pub['id'] ?>">Читать полностью</a>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
