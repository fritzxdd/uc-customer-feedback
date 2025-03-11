<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <!-- Link Global and Page-Specific CSS -->
    <link rel="stylesheet" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thank-you-style.css') }}">
    
    <script>
        let countdown = 10;
        function updateCountdown() {
            if (countdown > 0) {
                document.getElementById("countdown").textContent = countdown;
                countdown--;
                setTimeout(updateCountdown, 1000);
            } else {
                window.location.href = "/";
            }
        }

        window.onload = updateCountdown;
    </script>
</head>
<body>

    <div class="container">
        <!-- Thank You Message -->
        <h2 class="title">Thank you for your feedback!</h2>
        <p class="subtitle">You will be redirected in <span id="countdown">10</span> seconds.</p>

        <!-- Restart Button -->
        <a href="/" class="restartButton">Tap to Restart</a>
    </div>

    <!-- Bottom Left - Feedback Image -->
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">

    <!-- Bottom Right - UC Logo -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
