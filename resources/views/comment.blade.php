<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Comment</title>
    <link rel="stylesheet" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment-style.css') }}">
    <style>
        .keyboard {
            display: none;
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            width: 90%;
            text-align: center;
            z-index: 1000;
        }
        .keyboard-row {
            display: flex;
            justify-content: center;
        }
        .keyboard button {
            padding: 15px;
            margin: 5px;
            font-size: 20px;
            width: 60px;
            height: 60px;
            border: 2px solid #000;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .keyboard .space {
            width: 240px;
        }
        .keyboard .large-button {
            width: 100px;
        }
    </style>
</head>
<body onclick="hideKeyboard(event)">
    <button class="backButton" onclick="window.history.back();">&larr; Back</button>
    <div class="container">
        <h2 class="title">Leave a Comment</h2>
        <form action="/submit-comment" method="POST" class="commentForm">
            @csrf
            <textarea id="commentBox" name="comment" placeholder="Write your feedback here..." required onclick="showKeyboard()"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">
    
    <div class="keyboard" id="keyboard" onclick="event.stopPropagation()">
        <div class="keyboard-row">
            <button class="large-button" onclick="handleKeyPress('CapsLock')">Caps</button>
            <button onclick="handleKeyPress('Q')">Q</button>
            <button onclick="handleKeyPress('W')">W</button>
            <button onclick="handleKeyPress('E')">E</button>
            <button onclick="handleKeyPress('R')">R</button>
            <button onclick="handleKeyPress('T')">T</button>
            <button onclick="handleKeyPress('Y')">Y</button>
            <button onclick="handleKeyPress('U')">U</button>
            <button onclick="handleKeyPress('I')">I</button>
            <button onclick="handleKeyPress('O')">O</button>
            <button onclick="handleKeyPress('P')">P</button>
        </div>
        <div class="keyboard-row">
            <button onclick="handleKeyPress('A')">A</button>
            <button onclick="handleKeyPress('S')">S</button>
            <button onclick="handleKeyPress('D')">D</button>
            <button onclick="handleKeyPress('F')">F</button>
            <button onclick="handleKeyPress('G')">G</button>
            <button onclick="handleKeyPress('H')">H</button>
            <button onclick="handleKeyPress('J')">J</button>
            <button onclick="handleKeyPress('K')">K</button>
            <button onclick="handleKeyPress('L')">L</button>
            <button class="large-button" onclick="handleKeyPress('Enter')">Enter</button>
        </div>
        <div class="keyboard-row">
            <button class="large-button" onclick="handleKeyPress('Shift')">Shift</button>
            <button onclick="handleKeyPress('Z')">Z</button>
            <button onclick="handleKeyPress('X')">X</button>
            <button onclick="handleKeyPress('C')">C</button>
            <button onclick="handleKeyPress('V')">V</button>
            <button onclick="handleKeyPress('B')">B</button>
            <button onclick="handleKeyPress('N')">N</button>
            <button onclick="handleKeyPress('M')">M</button>
            <button class="large-button" onclick="handleKeyPress('Backspace')">Back</button>
        </div>
        <div class="keyboard-row">
            <button class="space" onclick="handleKeyPress(' ')">Space</button>
        </div>
    </div>

    <script>
        let capsLock = false;

        function showKeyboard() {
            document.getElementById("keyboard").style.display = "block";
        }

        function hideKeyboard(event) {
            if (!event.target.closest("#commentBox")) {
                document.getElementById("keyboard").style.display = "none";
            }
        }

        function handleKeyPress(key) {
            const commentBox = document.getElementById("commentBox");
            
            if (key === "Backspace") {
                commentBox.value = commentBox.value.slice(0, -1);
            } else if (key === "Enter") {
                commentBox.value += "\n";
            } else if (key === "CapsLock") {
                capsLock = !capsLock;
            } else if (key === "Shift") {
                capsLock = !capsLock;
            } else if (key === " ") {
                commentBox.value += " ";
            } else {
                commentBox.value += capsLock ? key.toUpperCase() : key.toLowerCase();
            }
        }
    </script>
</body>
</html>
