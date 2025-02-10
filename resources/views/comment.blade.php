<form action="/submit-comment" method="POST">
    @csrf
    <textarea name="comment" required></textarea>
    <button type="submit">Submit</button>
</form>
