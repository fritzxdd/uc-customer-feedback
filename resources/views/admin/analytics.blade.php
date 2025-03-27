<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Tabs - Departments */
        .folder-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .folder-tab {
            background-color: #FFCC00;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            transition: background 0.3s;
        }

        .folder-tab:hover {
            background-color: #E6B800;
        }

        /* Content Boxes */
        .folder-content {
            display: none;
            padding: 20px;
            background: white;
            border: 2px solid #FFCC00;
            border-radius: 0 8px 8px 8px;
            margin-bottom: 15px;
        }

        /* Teller Windows */
        .teller {
            cursor: pointer;
            background: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 8px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .teller:hover {
            background: #45A049;
        }

        /* Ratings and Comments */
        .ratings,
        .comments {
            display: none;
            padding: 10px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 5px;
        }

        .comments{
            
            max-height: 400px;
            overflow-y: auto;
        }

        .stars {
            color: gold;
            font-size: 16px;
        }

        /* Comment Box */
        .comment-box {
            background: #f1f1f1;
            padding: 8px;
            border-radius: 5px;
            margin-top: 5px;
        }
    </style>
</head>

<body class="container mt-4">

    <h2 class="text-center mb-4">📊 Admin Analytics</h2>

    <!-- Logout Button -->
    <div class="d-flex justify-content-end mb-4">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <!-- Department Tabs -->
    <div class="folder-container">
        @foreach ($analytics as $department)
        <div class="folder-tab" onclick="toggleFolder('dept-{{ Str::slug($department->department) }}')">
            📁 {{ $department->department }}
        </div>
        @endforeach
    </div>

    <!-- Department Details -->
    @foreach ($analytics as $department)
    <div class="folder-content" id="dept-{{ Str::slug($department->department) }}">
        <h3>{{ $department->department }}</h3>
        <p>⭐ Average Rating: <span class="stars">{{ str_repeat('★', round($department->avg_rating)) }}</span> ({{ number_format($department->avg_rating, 2) }})</p>
        <p>📊 Total Feedback: {{ $department->feedback_count }}</p>

        @foreach ($windows as $window)
        @if ($window->department == $department->department)
        <div class="teller" onclick="toggleRatings('teller-{{ Str::slug($department->department) }}-{{ Str::slug($window->window) }}')">
            🏢 Window {{ $window->window }}
        </div>
        <div class="ratings" id="teller-{{ Str::slug($department->department) }}-{{ Str::slug($window->window) }}">

            <p>⭐ Average: <span class="stars">{{ str_repeat('★', round($window->avg_rating)) }}</span> ({{ number_format($window->avg_rating, 2) }})</p>
            <p>📊 Ratings: {{ $window->total_ratings }}</p>
            <p>5⭐: {{ $window->excellent }}</p>
            <p>4⭐: {{ $window->good }}</p>
            <p>3⭐: {{ $window->medium }}</p>
            <p>2⭐: {{ $window->poor }}</p>
            <p>1⭐: {{ $window->very_bad }}</p>

            <span class="comment-toggle btn btn-light mt-2"
                onclick="toggleComments('comments-{{ Str::slug($department->department) }}-{{ Str::slug($window->window) }}')">
                💬 View Comments
            </span>

            <div class="comments" id="comments-{{ Str::slug($department->department) }}-{{ Str::slug($window->window) }}">
                <div id="commentList-{{ Str::slug($department->department) }}-{{ Str::slug($window->window) }}">
                    @foreach ($comments as $comment)
                    @if ($comment->window == $window->window && $comment->department == $department->department)
                    <p class="comment-box">📌 "{{ $comment->comment }}"</p>
                    @endif
                    @endforeach
                </div>
            </div>

        </div>
        @endif
        @endforeach
    </div>
    @endforeach

    <!-- JavaScript -->
    <script>
        function toggleFolder(folderId) {
            document.querySelectorAll('.folder-content').forEach(folder => folder.style.display = 'none');
            document.getElementById(folderId).style.display = 'block';
        }

        function toggleRatings(tellerId) {
            let ratingsSection = document.getElementById(tellerId);
            if (ratingsSection) {
                ratingsSection.style.display = ratingsSection.style.display === 'block' ? 'none' : 'block';
            }
        }


        function toggleComments(commentId) {
            let commentSection = document.getElementById(commentId);
            if (commentSection) {
                commentSection.style.display = commentSection.style.display === 'block' ? 'none' : 'block';
            }
        }
    </script>

</body>

</html>