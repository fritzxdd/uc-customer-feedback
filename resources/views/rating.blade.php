<form action="/submit-rating" method="POST">
    @csrf
    <input type="hidden" name="department" value="{{ $department }}">
    <input type="hidden" name="window" value="{{ $window }}">
    <button name="rating" value="excellent">😃 Excellent</button>
    <button name="rating" value="good">🙂 Good</button>
    <button name="rating" value="medium">😐 Medium</button>
    <button name="rating" value="poor">😕 Poor</button>
    <button name="rating" value="bad">😡 Bad</button>
</form>
