<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'index']); // Landing page
Route::get('/department/{department}', [FeedbackController::class, 'selectWindow']); // Select window
Route::get('/department/{department}/window/{window}', [FeedbackController::class, 'rate']); // Rate page

Route::post('/submit-rating', [FeedbackController::class, 'storeRating']); // Store rating and redirect
Route::get('/comment-option', [FeedbackController::class, 'commentOption']); // Ask if user wants to comment
Route::get('/comment', function () { return view('comment'); }); // Comment form

Route::post('/submit-comment', [FeedbackController::class, 'storeComment']); // Save comment
Route::get('/thank-you', [FeedbackController::class, 'thankYou']); // Thank you page
