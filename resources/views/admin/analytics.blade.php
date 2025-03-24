
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics</title>

    <!-- Bootstrap 4 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h2>Welcome to Admin Analytics</h2>
            </div>
        </div>

        <!-- Logout Form -->
        <div class="row justify-content-end mb-4">
            <div class="col-md-3 text-right">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block">Logout</button>
                </form>
            </div>
        </div>

        <!-- Display Department Analytics -->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Department</th>
                            <th>Feedback Count</th>
                            <th>Average Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analytics as $department)
                        <tr class="department-row" data-dept="{{ $department->id }}">
                            <td><strong>{{ $department->department }}</strong></td>
                            <td>{{ $department->feedback_count }}</td>
                            <td>{{ number_format($department->avg_rating, 2) }}</td>
                        </tr>

                        <!-- Hidden Row for Service Windows -->
                        <tr class="dept-windows" id="dept-{{ $department->id }}">
                            <td colspan="3">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Window</th>
                                            <th>Total Ratings</th>
                                            <th>Excellent</th>
                                            <th>Good</th>
                                            <th>Medium</th>
                                            <th>Poor</th>
                                            <th>Very Bad</th>
                                            <th>Average Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($windows as $window)
                                        @if ($window->department == $department->department)
                                        <tr class="window-row" data-window="{{ $window->window }}" data-dept="{{ $department->id }}">
                                            <td>{{ $window->window }}</td>
                                            <td>{{ $window->total_ratings }}</td>
                                            <td>{{ $window->excellent }}</td>
                                            <td>{{ $window->good }}</td>
                                            <td>{{ $window->medium }}</td>
                                            <td>{{ $window->poor }}</td>
                                            <td>{{ $window->very_bad }}</td>
                                            <td>{{ number_format($window->avg_rating, 2) }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Comments Table (Initially Hidden) -->
                                <div class="comments-section" id="comments-dept-{{ $department->id }}">
                                    <h4 class="mt-4">Comments</h4>
                                    <table class="table table-striped table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Student Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comments as $comment)
                                            @if ($comment->department == $department->department)
                                            <tr class="comment-row window-{{ $comment->window }}">
                                                <td>{{ $comment->comment }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        console.log("{{ $comments }}");
    </script>

</body>

</html>
