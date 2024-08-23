const questions = [
    "Apakah Anda suka belajar?",
    "Apakah Anda menyukai musik?",
    "Apakah Anda sering membaca buku?",
    "Apakah Anda menyukai olahraga?",
    "Apakah Anda suka memasak?",
    "Apakah Anda gemar traveling?",
    "Apakah Anda senang bermain game?",
    "Apakah Anda tertarik dengan teknologi?",
    "Apakah Anda menyukai hewan peliharaan?",
    "Apakah Anda menikmati menonton film?"
];

let currentQuestion = 0;
const questionElement = document.querySelector('.question');
const quizForm = document.getElementById('quiz-form');
const resultContainer = document.querySelector('.result');
const scoreElement = document.getElementById('score');
const messageElement = document.getElementById('message');

let scores = [];
let selectedOptions = []; // Array untuk menyimpan jawaban yang dipilih

function showQuestion() {
    questionElement.textContent = questions[currentQuestion];
    resetRadioButtons();
    restoreSelectedOption();
}

function nextQuestion() {
    const selectedOption = quizForm.elements['answer'].value;
    if (selectedOption !== '') {
        scores[currentQuestion] = parseInt(selectedOption);
        selectedOptions[currentQuestion] = selectedOption; // Simpan jawaban yang dipilih
        
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            showQuestion();
        } else {
            showResult();
        }
    } else {
        alert("Silakan pilih jawaban terlebih dahulu.");
    }
}

function prevQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion();
    }
}

function resetRadioButtons() {
    const radioButtons = quizForm.elements['answer'];
    for (let i = 0; i < radioButtons.length; i++) {
        radioButtons[i].checked = false;
    }
}

function restoreSelectedOption() {
    const selectedOption = selectedOptions[currentQuestion];
    if (selectedOption !== undefined) {
        const radioButtons = quizForm.elements['answer'];
        for (let i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].value === selectedOption) {
                radioButtons[i].checked = true;
                break;
            }
        }
    }
}

function showResult() {
    const totalScore = scores.reduce((total, score) => total + score, 0);
    scoreElement.textContent = `Your score: ${totalScore}`;

    if (totalScore >= 6) {
        messageElement.textContent = "Congratulations! You did well.";
    } else {
        messageElement.textContent = "You can do better next time.";
    }

    resultContainer.style.display = 'block';
    document.querySelector('.card').style.display = 'none';
}

showQuestion();
