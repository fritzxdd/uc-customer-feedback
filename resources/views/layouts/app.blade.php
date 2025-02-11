<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> <!-- Dynamic Title -->
    
    <!-- Link Global Styles -->
    <link rel="stylesheet" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/window-style.css') }}">
    
    @yield('styles') <!-- Page-specific styles -->
</head>
<body>

    <!-- Back Button in Upper Right -->
    <button class="backButton" onclick="window.history.back();">← Back</button>

    <div class="container">
        <!-- Page-Specific Content -->
        @yield('content')
    </div>

    <!-- Bottom Left - Feedback Image -->
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">

    <!-- Bottom Right - UC Logo -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
