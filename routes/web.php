<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'index']); // Landing page

// Dynamic department route - Handles different pages for each department
Route::get('/department/{department}', [FeedbackController::class, 'selectWindow']);

// Dynamic window selection
Route::get('/department/{department}/window/{window}', [FeedbackController::class, 'rate']);

// Submit rating
Route::post('/submit-rating', [FeedbackController::class, 'storeRating']);

// Ask for comment
Route::get('/comment-option', [FeedbackController::class, 'commentOption']);

// Comment form
Route::get('/comment', function () {
    return view('comment');
});

// Submit comment
Route::post('/submit-comment', [FeedbackController::class, 'storeComment']);

// Thank you page
Route::get('/thank-you', [FeedbackController::class, 'thankYou']);
