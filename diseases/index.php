<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>Заболевания</title>
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
  <h1>Заболевания</h1>

  <input type="text" id="search" placeholder="Введите симптом..." />
  <div id="articles-list"></div>

  <script src="../js/articles.js"></script>
  <script>
    const listEl = document.getElementById('articles-list');
    const searchEl = document.getElementById('search');

    function render(articlesToRender) {
      listEl.innerHTML = '';
      articlesToRender.forEach(article => {
        const block = document.createElement('div');
        block.className = 'article-card';
        block.innerHTML = `
          <h2>${article.title}</h2>
          <p><strong>Симптомы:</strong> ${article.symptoms}</p>
          <a href="article.html?id=${article.id}">Читать далее</a>
        `;
        listEl.appendChild(block);
      });
    }

    render(articles);

    searchEl.addEventListener('input', () => {
      const value = searchEl.value.toLowerCase();
      const filtered = articles.filter(a =>
        a.title.toLowerCase().includes(value) ||
        a.symptoms.toLowerCase().includes(value)
      );
      render(filtered);
    });
  </script>
</body>
</html>
