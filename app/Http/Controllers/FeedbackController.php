<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // Landing page
    public function index()
    {
        return view('welcome'); // First page with department selection
    }

    // Select the correct view for the department
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

    // Rate window selection
    public function rate($department, $window)
    {
        return view('rating', compact('department', 'window'));
    }

    // Store rating in the database
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

    // Ask if the user wants to leave a comment
    public function commentOption()
    {
        return view('comment-option');
    }

    // Store comment after rating is submitted
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

    // Thank you page
    public function thankYou()
    {
        return view('thank-you');
    }
}
