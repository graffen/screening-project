let currentQuestion = 0;
let userScore = 0;
const totalQuestions = quizData.length;

function startQuiz() {
    document.getElementById('startBtn').addEventListener('click', () => {
        document.querySelector('.hero').classList.add('hidden');
        document.getElementById('quizContainer').classList.remove('hidden');
        showQuestion(currentQuestion);
    });
}

function showQuestion(questionIndex) {
    const question = quizData[questionIndex];
    document.getElementById('questionText').textContent = question.question;
    
    const answersContainer = document.getElementById('answersContainer');
    answersContainer.innerHTML = '';
    
    question.answers.forEach(answer => {
        const button = document.createElement('button');
        button.classList.add('answer-btn');
        button.textContent = answer.text;
        button.addEventListener('click', () => selectAnswer(answer.score));
        answersContainer.appendChild(button);
    });
    
    updateProgress(questionIndex);
}

function selectAnswer(score) {
    userScore += score;
    currentQuestion++;
    
    if (currentQuestion < totalQuestions) {
        showQuestion(currentQuestion);
    } else {
        showResults();
    }
}

function updateProgress(questionIndex) {
    const percent = ((questionIndex + 1) / totalQuestions) * 100;
    document.getElementById('progressFill').style.width = `${percent}%`;
    document.getElementById('progressText').textContent = 
        `Вопрос ${questionIndex + 1} из ${totalQuestions}`;
}

function showResults() {
    const quizContainer = document.getElementById('quizContainer');
    const resultContainer = document.getElementById('resultContainer');

    quizContainer.classList.add('hidden');
    resultContainer.classList.remove('hidden');

    let resultText = '';
    let resultTitle = '';

    for (const result of results) {
        if (userScore >= result.minScore) {
            resultTitle = result.title; // ← вот он!
            resultText = `
                <h3>${result.title}</h3>
                <p>${result.description}</p>
                <div class="result-details">
                    <p>Ваши баллы: <strong>${userScore}/20</strong></p>
                </div>
            `;
            break;
        }
    }

    document.getElementById('resultContent').innerHTML = resultText;

    //  Отправка результата на сервер
    fetch('/screening_test/save_result.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            answers: [`Сумма баллов: ${userScore}`], 
            result: resultTitle
        })
    })
    .then(res => res.text())
    .then(msg => console.log('Результат сохранён:', msg))
    .catch(err => console.error('Ошибка сохранения:', err));
}

// Инициализация после загрузки страницы
document.addEventListener('DOMContentLoaded', startQuiz);