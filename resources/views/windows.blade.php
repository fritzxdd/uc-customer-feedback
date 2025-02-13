<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Window - {{ ucfirst($department) }}</title>
    <!-- Link External CSS -->
    <link rel="stylesheet" href="{{ asset('css/window-style.css') }}">
</head>
<body>

    <div class="container">
        <!-- Department Header -->
        <div class="header">{{ ucfirst($department) }}</div>

        <!-- Section Title -->
        <h2 class="title">Which window served you?</h2>

        <!-- Window Selection -->
        <div class="windowContainer">
            @for ($i = 1; $i <= 5; $i++)
                <a href="{{ url('/department/' . $department . '/window/' . $i) }}" class="window">
                    <img src="{{ asset('images/self-service.png') }}" alt="Window {{ $i }}">
                    <span>{{ $i }}</span>
                </a>
            @endfor
        </div>
    </div>

    <!-- Bottom Left - Feedback Image -->
    <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">

    <!-- Bottom Right - UC Logo -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
