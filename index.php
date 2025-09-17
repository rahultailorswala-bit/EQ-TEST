<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emotional Intelligence Test</title>
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
        .container {
            max-width: 800px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            text-align: center;
            backdrop-filter: blur(10px);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #f3f4f6;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            line-height: 1.6;
            color: #d1d5db;
        }
        .start-btn {
            padding: 15px 30px;
            font-size: 1.2em;
            background: #10b981;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .start-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 1.8em;
            }
            p {
                font-size: 1em;
            }
            .start-btn {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Emotional Intelligence Test</h1>
        <p>Discover your Emotional Intelligence (EQ) with our comprehensive test. Emotional Intelligence is the ability to understand, use, and manage your own emotions while recognizing and influencing the emotions of others. Take this test to gain insights into your self-awareness, empathy, and emotional regulation skills.</p>
        <button class="start-btn" onclick="window.location.href='quiz.php'">Start Test</button>
    </div>
</body>
</html>
