<?php
session_start();
require 'db.php';
 
$answers = $_SESSION['answers'];
$score = 0;
 
foreach ($answers as $question_id => $answer) {
    $sql = "SELECT correct_answer FROM questions WHERE id = $question_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($answer == $row['correct_answer']) {
        $score += 10;
    }
}
 
$feedback = '';
if ($score >= 80) {
    $feedback = "Excellent! You have a high level of emotional intelligence. You excel in self-awareness, empathy, and emotional regulation. Keep nurturing these skills!";
} elseif ($score >= 50) {
    $feedback = "Good job! You have a moderate level of emotional intelligence. Focus on improving your empathy and emotional regulation to enhance your EQ.";
} else {
    $feedback = "You have room to grow in emotional intelligence. Consider practicing self-awareness and empathy exercises to boost your EQ.";
}
 
$_SESSION['score'] = $score;
$_SESSION['feedback'] = $feedback;
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ Test Results</title>
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
        .results-container {
            max-width: 700px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            text-align: center;
        }
        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #f3f4f6;
        }
        .score {
            font-size: 3em;
            color: #10b981;
            margin: 20px 0;
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
            color: #d1d5db;
        }
        .btn {
            padding: 15px 30px;
            font-size: 1.1em;
            margin: 10px;
            background: #10b981;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-5px);
        }
        @media (max-width: 600px) {
            .results-container {
                padding: 20px;
            }
            h2 {
                font-size: 1.5em;
            }
            .score {
                font-size: 2em;
            }
            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h2>Your Emotional Intelligence Score</h2>
        <div class="score"><?php echo $score; ?> / 100</div>
        <p><?php echo $feedback; ?></p>
        <button class="btn" onclick="window.location.href='index.php'">Retake Test</button>
        <button class="btn" onclick="shareResults()">Share Results</button>
        <script>
            function shareResults() {
                alert('Share your score: <?php echo $score; ?> / 100\nFeedback: <?php echo $feedback; ?>');
            }
        </script>
    </div>
</body>
</html>
