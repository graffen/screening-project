<?php require_once '../inc/articles.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Заболевания</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <h1>Заболевания</h1>
  <form method="GET">
    <input type="text" name="search" placeholder="Поиск..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
  </form>
  <div>
    <?php
    $search = $_GET['search'] ?? '';
    foreach ($articles as $article) {
      if (!$search || stripos($article['title'], $search) !== false || stripos($article['symptoms'], $search) !== false) {
        echo "<div class='article-card'>";
        echo "<h2>{$article['title']}</h2>";
        echo "<p><strong>Симптомы:</strong> {$article['symptoms']}</p>";
        echo "<a href='article.php?id={$article['id']}'>Читать далее</a>";
        echo "</div>";
      }
    }
    ?>
  </div>
</body>
</html>
