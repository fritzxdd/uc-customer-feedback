<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Comment?</title>
    <!-- Link Global and Page-Specific CSS -->
    <link rel="stylesheet" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment-option-style.css') }}">
</head>
<body>

    <!-- Back Button in Upper Right -->
    <button class="backButton" onclick="window.history.back();">← Back</button>

    <div class="container">
        <!-- Question Title -->
        <h2 class="title">Would you like to leave a comment?</h2>

        <!-- Yes/No Buttons -->
        <div class="buttonGroup">
            <a href="{{ url('/comment') }}" class="yesButton">Yes</a>
            <a href="{{ url('/thank-you') }}" class="noButton">No</a>
        </div>
    </div>

    <!-- Bottom Left - Feedback Image -->
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">

    <!-- Bottom Right - UC Logo -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
