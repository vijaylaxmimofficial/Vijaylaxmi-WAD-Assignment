<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        
        <a href="logout.php" class="logout-btn">Logout</a>
        <a href="welcome.php" class="logout-btn1">Dashboard</a>
    </header>

    <!-- Welcome Page -->
    <div id="welcome-page" class="page">
        <h1>Welcome to the Quiz!</h1>
        <button onclick="startQuiz('math')" class="btn">Math Quiz</button>
        <button onclick="startQuiz('science')" class="btn">Science Quiz</button>
    </div>

    <!-- Quiz Page -->
    <div id="quiz-page" class="page" style="display: none;">
        <h2 id="quiz-title" class="quiz-title"></h2>
        <p id="question-text" class="question-text"></p>
        <div id="options-container" class="options-container"></div>
        <button id="previous-button" onclick="previousQuestion()" class="btn" style="display: none;" disabled>Previous</button>
        <button id="next-button" onclick="nextQuestion()" class="btn" disabled>Next</button>
    </div>

    <!-- Score Page -->
    <div id="score-page" class="page" style="display: none;">
        <h2>Quiz Completed!</h2>
        <p id="score-text" class="score-text"></p>
        <button onclick="submitScore()" class="btn">Submit Score</button>
        
    </div>

    <script src="quiz.js"></script>
</body>
</html>
