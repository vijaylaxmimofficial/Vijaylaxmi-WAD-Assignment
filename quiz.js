// Quiz Data also stored in backend also
const quizData = {
  math: [
    { question: "2 + 2 = ?", options: ["3", "4", "5", "6"], correct: 1 },
    { question: "5 x 3 = ?", options: ["15", "10", "8", "20"], correct: 0 },
    { question: "12 ÷ 4 = ?", options: ["2", "3", "4", "5"], correct: 1 },
    { question: "Square root of 16 = ?", options: ["4", "5", "6", "7"], correct: 0 },
    { question: "10 - 7 = ?", options: ["2", "3", "4", "5"], correct: 1 }
  ],
  science: [
    { question: "What planet is known as the Red Planet?", options: ["Earth", "Mars", "Jupiter", "Venus"], correct: 1 },
    { question: "Water freezes at?", options: ["0°C", "32°C", "100°C", "212°C"], correct: 0 },
    { question: "The Sun is a?", options: ["Planet", "Star", "Comet", "Asteroid"], correct: 1 },
    { question: "What is the chemical symbol for water?", options: ["H", "O2", "H2O", "HO"], correct: 2 },
    { question: "What gas do plants absorb from the atmosphere?", options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Hydrogen"], correct: 1 }
  ]
};


let currentQuiz = [];
let currentQuestionIndex = 0;
let score = 0;
let selectedAnswers = [];  

// Start Quiz
function startQuiz(subject) {
  currentQuiz = quizData[subject];
  currentQuestionIndex = 0;
  score = 0;
  selectedAnswers = []; 

  document.getElementById("welcome-page").style.display = "none";
  document.getElementById("quiz-page").style.display = "block";

  document.getElementById("quiz-title").textContent = `${subject.charAt(0).toUpperCase() + subject.slice(1)} Quiz`;
  showQuestion();
}

// Show Question
function showQuestion() {
  const questionData = currentQuiz[currentQuestionIndex];
  document.getElementById("question-text").textContent = questionData.question;

  const optionsContainer = document.getElementById("options-container");
  optionsContainer.innerHTML = ""; 

  questionData.options.forEach((option, index) => {
    const button = document.createElement("button");
    button.textContent = option;
    button.classList.add("option-button");
    button.onclick = () => selectAnswer(index, button);  
    optionsContainer.appendChild(button);


    
    if (selectedAnswers[currentQuestionIndex] === index) {
      button.classList.add("selected-option");
      button.style.backgroundColor = "#28a745";  
      button.style.color = "black";
    }
  });


  document.getElementById("next-button").disabled = true;

  
  if (currentQuestionIndex === 0) {
    document.getElementById("previous-button").style.display = "none";  
    document.getElementById("previous-button").disabled = true;
  } else {
    document.getElementById("previous-button").style.display = "inline-block";
    document.getElementById("previous-button").disabled = false;
  }
}

// Select Answer
function selectAnswer(selectedIndex, buttonElement) {
  const correctIndex = currentQuiz[currentQuestionIndex].correct;
  const optionsContainer = document.getElementById("options-container");


  
  const buttons = optionsContainer.getElementsByTagName("button");
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove("selected-option");
    buttons[i].style.color = "";  
    buttons[i].style.backgroundColor = ""; 
  }

  
  buttonElement.classList.add("selected-option");
  buttonElement.style.backgroundColor = "#28a745";
  buttonElement.style.color = "black";  

  selectedAnswers[currentQuestionIndex] = selectedIndex;

  // Check if the answer is correct
  if (selectedIndex === correctIndex) {
    score++;
  }

  
  document.getElementById("next-button").disabled = false;
}

// Next Question
function nextQuestion() {
  currentQuestionIndex++;
  if (currentQuestionIndex < currentQuiz.length) {
    showQuestion();
  } else {
    showScore();
  }
}

// Previous Question
function previousQuestion() {
  currentQuestionIndex--;
  if (currentQuestionIndex >= 0) {
    showQuestion();
  }
}

// Show Score
function showScore() {
  
  document.getElementById("quiz-page").style.display = "none";
  document.getElementById("score-page").style.display = "block";

  document.getElementById("score-text").textContent = `Your score: ${score} / ${currentQuiz.length}`;
}

// Submit Score Function
function submitScore() {
  const form = document.createElement("form");
  form.method = "POST";
  form.action = "submit_score.php";

  
  const emailInput = document.createElement("input");
  emailInput.type = "hidden";
  emailInput.name = "email";
  emailInput.value = "<?php echo $_SESSION['email']; ?>"; 
  form.appendChild(emailInput);


  const scoreInput = document.createElement("input");
  scoreInput.type = "hidden";
  scoreInput.name = "score";
  scoreInput.value = score;
  form.appendChild(scoreInput);


  document.body.appendChild(form);
  form.submit();
}
