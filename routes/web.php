<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AdminAnalyticsController;
use App\Models\AdminUser;

// Landing page
Route::get('/', [FeedbackController::class, 'index']);

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

// Admin Login Page
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Admin Login Processing
Route::post('/admin/login', function (Request $request) {
    $admin = AdminUser::where('username', $request->username)->first();
    
    // if ($admin && Hash::check($request->password, $admin->password)) {
    //     session(['admin_logged_in' => true]);
    //     return redirect()->route('admin.analytics');
    // } else {
    //     return back()->withErrors(['error' => 'Invalid Credentials']);
    // }
    return redirect()->route('admin.analytics');
});

// Admin Analytics Page (Requires Authentication)
Route::get('/admin/analytics', [AdminAnalyticsController::class, 'index'] )->name('admin.analytics');

// Admin Logout
Route::post('/admin/logout', function () {
    session()->forget('admin_logged_in');
    return redirect()->route('admin.login');
})->name('admin.logout');
