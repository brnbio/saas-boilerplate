<?php

declare(strict_types=1);

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function()
{
    Route::get ('/login', Controllers\Users\LoginController::class)->name('login');
    Route::post('/login', [Controllers\Users\LoginController::class, 'login']);
    Route::get ('/register', Controllers\Users\RegisterController::class)->name('register');
    Route::post('/register', [Controllers\Users\RegisterController::class, 'register']);
    Route::get ('/forgot-password', Controllers\Users\ForgotPasswordController::class)->name('password.request');
    Route::post('/forgot-password', [Controllers\Users\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get ('/reset-password/{token}', Controllers\Users\ResetPasswordController::class)->name('password.reset');
    Route::post('/reset-password/{token}', [Controllers\Users\ResetPasswordController::class, 'reset'])->name('password.update');

});

Route::middleware('auth')->group(function()
{
    Route::post('/logout', [Controllers\Users\LoginController::class, 'logout'])->name('logout');
    Route::get ('/email/verify', Controllers\Users\VerificationController::class)->name('verification.notice');
    Route::get ('/email/verify/{id}/{hash}', [Controllers\Users\VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [Controllers\Users\VerificationController::class, 'resend'])->name('verification.resend');
    Route::get ('/account', Controllers\Users\AccountController::class)->name('account');
    Route::post('/account', [Controllers\Users\AccountController::class, 'update']);
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get ('/', Controllers\HomeController::class)->name('home');
    Route::get ('/password/confirm', Controllers\Users\ConfirmPasswordController::class)->name('password.confirm');
    Route::post('/password/confirm', [Controllers\Users\ConfirmPasswordController::class, 'confirm']);
    Route::get ('/billing', Controllers\Users\BillingController::class)->name('billing');
});