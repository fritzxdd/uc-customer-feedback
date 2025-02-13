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
        setTimeout(() => { window.location.href = "/"; }, 10000);
    </script>
</head>
<body>

    <div class="container">
        <!-- Thank You Message -->
        <h2 class="title">Thank you for your feedback!</h2>
        <p class="subtitle">You will be redirected to the main page in 10 seconds.</p>

        <!-- Restart Button -->
        <a href="/" class="restartButton">Tap to Restart</a>
    </div>

    <!-- Bottom Left - Feedback Image -->
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">

    <!-- Bottom Right - UC Logo -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
