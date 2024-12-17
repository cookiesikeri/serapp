<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Display the registration form
Route::get('/', function () {
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

Route::get('/send-email', [AuthController::class, 'showSendEmailForm'])->name('send.email.form');
Route::post('/send-email', [AuthController::class, 'sendContractEmail'])->name('send.contract.email');
