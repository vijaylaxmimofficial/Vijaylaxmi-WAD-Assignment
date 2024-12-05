-- store user data
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    college VARCHAR(100)
);

-- create questions 
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject VARCHAR(50) NOT NULL,
    question TEXT NOT NULL,
    option1 VARCHAR(255) NOT NULL,
    option2 VARCHAR(255) NOT NULL,
    option3 VARCHAR(255) NOT NULL,
    option4 VARCHAR(255) NOT NULL,
    correct_option INT NOT NULL
);

-- Insert Math Questions
INSERT INTO questions (subject, question, option1, option2, option3, option4, correct_option) VALUES
('math', '2 + 2 = ?', '3', '4', '5', '6', 2),
('math', '5 x 3 = ?', '15', '10', '8', '20', 1),
('math', '12 ÷ 4 = ?', '2', '3', '4', '5', 2),
('math', 'Square root of 16 = ?', '4', '5', '6', '7', 1),
('math', '10 - 7 = ?', '2', '3', '4', '5', 2);

--  Insert Science Questions
INSERT INTO questions (subject, question, option1, option2, option3, option4, correct_option) VALUES
('science', 'What planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Venus', 2),
('science', 'Water freezes at?', '0°C', '32°C', '100°C', '212°C', 1),
('science', 'The Sun is a?', 'Planet', 'Star', 'Comet', 'Asteroid', 2),
('science', 'What is the chemical symbol for water?', 'H', 'O2', 'H2O', 'HO', 3),
('science', 'What gas do plants absorb from the atmosphere?', 'Oxygen', 'Carbon Dioxide', 'Nitrogen', 'Hydrogen', 2);


-- store result 
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(100) NOT NULL,
    quiz_title VARCHAR(50) NOT NULL,
    correct_answers INT NOT NULL,
    wrong_answers INT NOT NULL,
    score INT NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);