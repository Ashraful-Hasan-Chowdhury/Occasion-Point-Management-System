<?php

use App\Http\Controllers\Hallowner\HomeController;
use App\Http\Controllers\Hallowner\Auth\LoginController;
use App\Http\Controllers\Hallowner\Auth\RegisterController;
use App\Http\Controllers\Hallowner\Auth\ForgotPasswordController;
use App\Http\Controllers\Hallowner\Auth\ResetPasswordController;
use App\Http\Controllers\Hallowner\Auth\VerificationController;
use App\Http\Controllers\Hallowner\ProfileController;
use App\Http\Controllers\Hallowner\HallController;
use App\Http\Controllers\Hallowner\PaymentController;
use App\Http\Controllers\Hallowner\BookingController;
use App\Http\Controllers\Hallowner\ReviewController;

Route::group(['namespace' => 'Hallowner'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('hallowner.dashboard');

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('hallowner.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('hallowner.logout');

    // Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('hallowner.register');
    Route::post('register', [RegisterController::class, 'register']);


    // Passwords
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('hallowner.password.email');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('hallowner.password.request');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('hallowner.password.reset');

    // Must verify email
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('hallowner.verification.resend');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('hallowner.verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('hallowner.verification.verify');

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'index'])
        ->name('hallowner.profile');
    Route::post('profile-update', [ProfileController::class, 'update'])
        ->name('hallowner.profile.update');
    Route::post('password-update', [ProfileController::class, 'updatepassword'])
        ->name('hallowner.password.update');
    // Hall Routes
    Route::get('hall', [HallController::class, 'show'])
        ->name('hallowner.hall');
    Route::get('add-hall', [HallController::class, 'index'])
        ->name('hallowner.hall.add');
    Route::post('store-hall', [HallController::class, 'store'])
        ->name('hallowner.hall.store');
    Route::get('destroy-hall/{id}', [HallController::class, 'destroy'])
        ->name('hallowner.hall.destroy');
    Route::get('edit-hall/{id}', [HallController::class, 'edit'])
        ->name('hallowner.hall.edit');
    Route::post('update-hall/{id}', [HallController::class, 'update'])
        ->name('hallowner.hall.update');
    // Payment Routes
    Route::get('payment', [PaymentController::class, 'show'])
        ->name('hallowner.payment');
    Route::get('add-payment', [PaymentController::class, 'index'])
        ->name('hallowner.payment.add');
    Route::post('store-payment', [PaymentController::class, 'store'])
        ->name('hallowner.payment.store');

    // Booking Routes
    Route::get('booking-request', [BookingController::class, 'request'])
        ->name('hallowner.booking.request');
    Route::get('booking-accept/{id}', [BookingController::class, 'accept'])
        ->name('hallowner.booking.accept');
    Route::get('booking-reject/{id}', [BookingController::class, 'reject'])
        ->name('hallowner.booking.reject');
    Route::get('booking', [BookingController::class, 'show'])
        ->name('hallowner.booking');
    // Review Routes
    Route::get('reviews', [ReviewController::class, 'show'])
        ->name('hallowner.reviews');
});
