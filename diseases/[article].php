<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Статья</title>
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
  <div id="article-container"></div>

  <script src="../js/articles.js"></script>
  <script>
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get('id'), 10);
    const article = articles.find(a => a.id === id);

    const container = document.getElementById('article-container');
    if (article) {
      container.innerHTML = `
        <h1>${article.title}</h1>
        <p><strong>Симптомы:</strong> ${article.symptoms}</p>
        <p>${article.description}</p>
        <a href="index.html">← Назад</a>
      `;
    } else {
      container.innerHTML = `<p>Статья не найдена</p>`;
    }
  </script>
</body>
</html>
