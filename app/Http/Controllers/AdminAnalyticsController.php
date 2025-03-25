<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminAnalyticsController extends Controller
{
    public function index()
{
    // Fetch departments analytics
    $analytics = DB::table('feedback')
        ->selectRaw('department AS id, department, COUNT(*) as feedback_count, 
            AVG(CASE 
                WHEN rating = "excellent" THEN 5
                WHEN rating = "good" THEN 4
                WHEN rating = "medium" THEN 3
                WHEN rating = "poor" THEN 2
                WHEN rating = "bad" THEN 1
                ELSE NULL 
            END) as avg_rating')
        ->groupBy('department')
        ->get();

    // Fetch service windows analytics
    $windows = DB::table('feedback')
        ->selectRaw('department, window, COUNT(*) as total_ratings,
            COUNT(CASE WHEN rating = "excellent" THEN 1 END) as excellent, 
            COUNT(CASE WHEN rating = "good" THEN 1 END) as good, 
            COUNT(CASE WHEN rating = "medium" THEN 1 END) as medium, 
            COUNT(CASE WHEN rating = "poor" THEN 1 END) as poor, 
            COUNT(CASE WHEN rating = "bad" THEN 1 END) as very_bad, 
            AVG(CASE 
                WHEN rating = "excellent" THEN 5
                WHEN rating = "good" THEN 4
                WHEN rating = "medium" THEN 3
                WHEN rating = "poor" THEN 2
                WHEN rating = "bad" THEN 1
                ELSE NULL 
            END) as avg_rating')
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

