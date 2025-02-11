<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Window {{ $window }} - {{ ucfirst($department) }}</title>
    <!-- Link External CSS -->
    <link rel="stylesheet" href="{{ asset('css/rating-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global-style.css') }}">
</head>
<body>

<!-- Back Button in Upper Right -->
<button class="backButton" onclick="window.history.back();">← Back</button>

    <div class="container">
        <!-- Department Header -->
        <div class="header">{{ strtoupper($department) }}</div>

        <!-- Window Number -->
        <div class="windowNumber1">
            <strong>WINDOW</strong> <span>{{ $window }}</span>
        </div>

        <!-- Rating Question -->
        <h2 class="title">How was my service today?</h2>

        <!-- Rating Form -->
        <form action="/submit-rating" method="POST">
            @csrf
            <input type="hidden" name="department" value="{{ $department }}">
            <input type="hidden" name="window" value="{{ $window }}">

            <div class="ratingContainer">
                <button type="submit" name="rating" value="excellent" class="rating">
                    <img src="{{ asset('images/emote-excellent.png') }}" alt="Excellent">
                    <span class="excellent"></span>
                </button>

                <button type="submit" name="rating" value="good" class="rating">
                    <img src="{{ asset('images/emote-good.png') }}" alt="Good">
                    <span class="good"></span>
                </button>

                <button type="submit" name="rating" value="medium" class="rating">
                    <img src="{{ asset('images/emote-medium.png') }}" alt="Medium">
                    <span class="medium"></span>
                </button>

                <button type="submit" name="rating" value="poor" class="rating">
                    <img src="{{ asset('images/emote-poor.png') }}" alt="Poor">
                    <span class="poor"></span>
                </button>

                <button type="submit" name="rating" value="bad" class="rating">
                    <img src="{{ asset('images/emote-very-bad.png') }}" alt="Very Bad">
                    <span class="very-bad"></span>
                </button>
            </div>
        </form>
    </div>

    <!-- Bottom Left - Feedback Image -->
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">

    <!-- Bottom Right - UC Logo -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
