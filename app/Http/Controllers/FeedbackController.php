<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('welcome'); // First page with department selection
    }

    public function selectWindow($department)
    {
        return view('windows', compact('department'));
    }

    public function rate($department, $window)
    {
        return view('rating', compact('department', 'window'));
    }

    public function storeRating(Request $request)
{
    // Store the rating in the database FIRST
    $feedback = Feedback::create([
        'department' => $request->department,
        'window' => $request->window,
        'rating' => $request->rating,
        'comment' => null, // Default to null if no comment yet
    ]);

    // Store feedback ID in session so we can update it later if user adds a comment
    session(['feedback_id' => $feedback->id]);

    return redirect('/comment-option'); // Redirect to comment option page
}


    public function commentOption()
    {
        return view('comment-option');
    }

    public function storeComment(Request $request)
{
    // Find the existing feedback entry
    $feedback = Feedback::find(session('feedback_id'));

    if ($feedback) {
        // Update the comment field
        $feedback->update([
            'comment' => $request->comment,
        ]);
    }

    // Clear session after storing comment
    session()->forget('feedback_id');

    return redirect('/thank-you');
}


    public function thankYou()
    {
        return view('thank-you'); // This is the missing function
    }
}
