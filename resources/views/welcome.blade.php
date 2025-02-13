<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <!-- Link External CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome-style.css') }}">
</head>
<body>

    <div class="container">
        <!-- Left Side - Feedback Image -->
        <div class="imageColumn">
            <img src="{{ asset('images/we-want-your-feedback.png') }}" alt="Feedback Image" class="feedbackImage">
        </div>

        <!-- Right Side - Form -->
        <div class="formColumn">
            <div class="formContent">
                <!-- Title and Vector Image -->
                <div class="titleContainer">
                    <h1 class="title">Tell us what you think about us</h1>
                    <img src="{{ asset('images/Vector.png') }}" alt="Vector" class="vectorImage">
                </div>

                <!-- Department Selection Buttons -->
                <div class="buttonGroup">
                    <a href="{{ url('/department/cashier') }}">Cashier / Accounting</a>
                    <a href="{{ url('/department/registrar') }}">Registrar</a>
                    <a href="{{ url('/department/edp') }}">EDP</a>
                </div>
            </div>
        </div>
    </div>

    <!-- University of Cebu Logo at Bottom Right -->
    <img src="{{ asset('images/uc-logo.png') }}" alt="University of Cebu" class="ucLogo">

</body>
</html>
