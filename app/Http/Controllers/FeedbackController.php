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
        $department = strtolower($department);

        // Render different views for each department
        if ($department === 'registrar') {
            return view('registrar');
        } elseif ($department === 'cashier') {
            return view('cashier');
        } elseif ($department === 'edp') {
            return view('edp');
        } else {
            abort(404, 'Department Not Found');
        }
    }

    public function rate($department, $window)
    {
        return view('rating', compact('department', 'window'));
    }

    public function storeRating(Request $request)
{
    // Validate input
    $request->validate([
        'department' => 'required|string',
        'window' => 'required|integer',
        'rating' => 'required|string',
    ]);

    // Store rating
    $feedback = Feedback::create([
        'department' => $request->department,
        'window' => $request->window,
        'rating' => $request->rating,
        'comment' => null, // Default to null until user adds a comment
    ]);

    // Store feedback ID in session for later comment update
    session(['feedback_id' => $feedback->id]);

    return redirect('/comment-option');
}


    public function commentOption()
    {
        return view('comment-option');
    }

    public function storeComment(Request $request)
{
     // Validate input
     $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    // Retrieve stored feedback ID
    $feedback = Feedback::find(session('feedback_id'));

    if ($feedback) {
        // Update the comment
        $feedback->update(['comment' => $request->comment]);
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
