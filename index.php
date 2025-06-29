<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Онлайн скрининг | Поликлиника №9</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="images/minzdrav_logo_small.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="Логотип поликлиники">
            </div>
                <nav class="top-menu">
                    <ul>
                        <li><a href="/index.php">Главная</a></li>
                        <li><a href="/diseases/index.php">Заболевания</a></li>
                        <li><a href="/recomendations/index.php">Рекомендации</a></li>    
                        <?php if ($isLoggedIn): ?>
                        <li><a href="/dashboard.php">Кабинет</a></li>
                        <li><a href="/logout.php">Выйти</a></li>
                        <?php else: ?>
                        <li><a href="/login.php">Войти</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
        </div>
    </header>

    <main class="container">
        <div class="alert">
            <p>Данный сервис не может заменить консультацию у специалистов и лабораторные исследования</p>
        </div>

        <section class="hero">
            <div class="hero-text">
                <h1>Онлайн скрининг аллергических заболеваний</h1>
                <p>Интерактивный опросник поможет выявить предрасположенность к аллергическим реакциям</p>
                
                <div class="features">
                    <div class="feature-item">
                        <img src="images/icon-fast.png" alt="Быстро">
                        <span>10 минут</span>
                    </div>
                    <div class="feature-item">
                        <img src="images/icon-private.png" alt="Конфиденциально">
                        <span>Конфиденциально</span>
                    </div>
                    <div class="feature-item">
                        <img src="images/icon-free.png" alt="Бесплатно">
                        <span>Бесплатно</span>
                    </div>
                </div>
                
                <button id="startBtn" class="btn-primary">Начать тестирование</button>
            </div>
            
            <div class="hero-image">
                <img src="images/main-visual.png" alt="Медицинский скрининг">
            </div>
        </section>

        <!-- Контейнер теста (изначально скрыт) -->
        <section id="quizContainer" class="quiz-container hidden">
            <div class="quiz-progress">
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
                <span id="progressText">Вопрос 1 из 10</span>
            </div>
            
            <div class="quiz-question">
                <h2 id="questionText"></h2>
            </div>
            
            <div class="quiz-answers" id="answersContainer"></div>
            
            <div class="quiz-navigation">
                <button id="prevBtn" class="btn-secondary">Назад</button>
                <button id="nextBtn" class="btn-primary">Далее</button>
            </div>
        </section>

        <!-- Контейнер результатов -->
        <section id="resultContainer" class="result-container hidden">
            <h2>Результат скрининга</h2>
            <div class="result-content" id="resultContent"></div>
            <div class="result-actions">
                <button id="restartBtn" class="btn-secondary">Пройти ещё раз</button>
                <a href="recomendations/index.php" class="btn-primary">Читать рекомендации</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>БУЗ ВО "Воронежская городская поликлиника №9" © 2025</p>
            <p>г. Воронеж, ул. Переверткина, 16А | Тел: +7 (473) 210-04-95</p>
        </div>
    </footer>

    <script src="js/quiz_data.js"></script>
    <script src="js/quiz_answer.js"></script>
    <script src="js/script.js"></script>
</body>
</html>