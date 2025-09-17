<?php
session_start();
require 'db.php';
 
$_SESSION['answers'] = isset($_SESSION['answers']) ? $_SESSION['answers'] : [];
$question_id = isset($_GET['q']) ? (int)$_GET['q'] : 1;
 
$sql = "SELECT * FROM questions WHERE id = $question_id";
$result = $conn->query($sql);
$question = $result->fetch_assoc();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answers'][$question_id] = (int)$_POST['answer'];
    if ($question_id < 10) {
        header("Location: quiz.php?q=" . ($question_id + 1));
    } else {
        header("Location: results.php");
    }
    exit();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ Test - Question <?php echo $question_id; ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6b7280, #1f2937);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .quiz-container {
            max-width: 700px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }
        h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #f3f4f6;
        }
        .options {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .option {
            padding: 15px;
            background: #4b5563;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .option:hover {
            background: #10b981;
        }
        input[type="radio"] {
            display: none;
        }
        label {
            font-size: 1.1em;
            cursor: pointer;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 1.1em;
            background: #10b981;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-5px);
        }
        .progress {
            margin-bottom: 20px;
            font-size: 1em;
            color: #d1d5db;
        }
        @media (max-width: 600px) {
            .quiz-container {
                padding: 20px;
            }
            h2 {
                font-size: 1.5em;
            }
            .option {
                padding: 10px;
            }
            label {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <div class="progress">Question <?php echo $question_id; ?> of 10</div>
        <h2><?php echo $question['question_text']; ?></h2>
        <form method="POST">
            <div class="options">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <input type="radio" id="option<?php echo $i; ?>" name="answer" value="<?php echo $i; ?>" required>
                    <label for="option<?php echo $i; ?>" class="option"><?php echo $question['option' . $i]; ?></label>
                <?php endfor; ?>
            </div>
            <button type="submit" class="submit-btn">Next</button>
        </form>
    </div>
</body>
</html>
