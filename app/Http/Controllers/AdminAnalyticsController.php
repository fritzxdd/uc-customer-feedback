<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminAnalyticsController extends Controller
{
    public function index()
    {
        // Fetch departments analytics
        $analytics = DB::table('feedback')
            ->selectRaw('department AS id, department, COUNT(*) as feedback_count, AVG(rating) as avg_rating')
            ->groupBy('department')
            ->get();

        // Fetch service windows analytics
        $windows = DB::table('feedback')
            ->selectRaw('department, window, COUNT(*) as total_ratings,
                SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) as excellent,
                SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) as good,
                SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) as medium,
                SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) as poor,
                SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) as very_bad,
                AVG(rating) as avg_rating')
            ->groupBy('department', 'window')
            ->get();
 
        // Fetch comments per window
        $comments = DB::table('feedback')
            ->select('department', 'window', 'comment')
            ->whereNotNull('comment')
            ->get();

        return view('admin.analytics', compact('analytics', 'windows', 'comments'));
    }
}

