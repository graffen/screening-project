// Навигация по тесту
document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion(currentQuestion);
    }
});

document.getElementById('restartBtn').addEventListener('click', () => {
    location.reload(); // Перезагрузка страницы для нового теста
});

// Адаптивное меню (для мобильных устройств)
const menuToggle = document.createElement('button');
menuToggle.classList.add('menu-toggle');
menuToggle.innerHTML = '☰';
document.querySelector('header .container').appendChild(menuToggle);

menuToggle.addEventListener('click', () => {
    document.querySelector('.top-menu').classList.toggle('active');
});