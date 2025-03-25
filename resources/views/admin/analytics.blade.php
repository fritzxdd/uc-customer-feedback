@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Welcome to Admin Analytics</h2>
        </div>

        <!-- Logout Button -->
        <div class="d-flex justify-content-end mb-4">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Department Analytics Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Department</th>
                        <th>Feedback Count</th>
                        <th>Average Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($analytics as $department)
                    <tr class="department-row" data-bs-toggle="collapse" data-bs-target="#dept-{{ $department->id }}" style="cursor:pointer;">
                        <td><strong>{{ $department->department }}</strong></td>
                        <td>{{ $department->feedback_count }}</td>
                        <td>{{ number_format($department->avg_rating, 2) }}</td>
                    </tr>

                    <!-- Collapsible Service Windows Table -->
                    <tr id="dept-{{ $department->id }}" class="collapse">
                        <td colspan="3">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center">
                                    <thead class="table-dark">
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
                                        <tr>
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
                            </div>

                            <!-- Comments Table (Scrollable with Max 8 Rows) -->
                            <div class="comments-section mt-4" id="comments-dept-{{ $department->id }}">
                                <h4 class="mt-2">Comments</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="col-2">Window</th>
                                                <th class="col">Student Comments</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div style="max-height: 300px; overflow-y: auto;">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                @foreach ($comments as $comment)
                                                @if ($comment->department == $department->department)
                                                <tr class="comment-row window-{{ $comment->window }}">
                                                    <td class="col-2">Window {{ $comment->window }}</td>
                                                    <td class="col">{{ $comment->comment }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>