<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Str;

Route::get('/generate-url', function () {
    // Generate a random string of 32 characters
    $randomString = Str::random(32);

    // Create a pseudo-random URL
    $generatedUrl = "https://$randomString.com";

    return response()->json([
        'original_url' => 'https://access.idntity.ai/',
        'generated_url' => $generatedUrl
    ]);
});

// Display the registration form
Route::get('/', function () {
    return view('welcome');
})->name('register.form');

Route::get('/home', function () {
    return view('welcome');
})->name('register.form');

// Handle registration submission
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Success page route (which you mentioned already exists)
Route::get('/success', function () {
    return view('success');
})->name('success');


Route::get('/mail', function () {
    return view('emails.mail');
})->name('mail');

Route::get('/users', [AuthController::class, 'Users'])->name('users');

Route::get('/send-email', [AuthController::class, 'showSendEmailForm'])->name('send.email.form');
Route::post('/send-email', [AuthController::class, 'sendContractEmail'])->name('send.contract.email');
