<?php

use App\Http\Controllers\Parlour\HomeController;
use App\Http\Controllers\Parlour\Auth\LoginController;
use App\Http\Controllers\Parlour\Auth\RegisterController;
use App\Http\Controllers\Parlour\Auth\ForgotPasswordController;
use App\Http\Controllers\Parlour\Auth\ResetPasswordController;
use App\Http\Controllers\Parlour\Auth\VerificationController;
use App\Http\Controllers\Parlour\ProfileController;
use App\Http\Controllers\Parlour\PackageController;
use App\Http\Controllers\Parlour\PaymentController;
use App\Http\Controllers\Parlour\BookingController;
use App\Http\Controllers\Parlour\ReviewController;

Route::group(['namespace' => 'Parlour'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('parlour.dashboard');

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('parlour.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('parlour.logout');

    // Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('parlour.register');
    Route::post('register', [RegisterController::class, 'register']);


    // Passwords
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('parlour.password.email');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('parlour.password.request');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('parlour.password.reset');

    // Must verify email
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('parlour.verification.resend');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('parlour.verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('parlour.verification.verify');

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'index'])
        ->name('parlour.profile');
    Route::post('profile-update', [ProfileController::class, 'update'])
        ->name('parlour.profile.update');
    Route::post('password-update', [ProfileController::class, 'updatepassword'])
        ->name('parlour.password.update');

    // Packages Routes
    Route::get('package', [PackageController::class, 'show'])
        ->name('parlour.package');
    Route::get('add-package', [PackageController::class, 'index'])
        ->name('parlour.package.add');
    Route::post('store-package', [PackageController::class, 'store'])
        ->name('parlour.package.store');
    Route::get('destroy-package/{id}', [PackageController::class, 'destroy'])
        ->name('parlour.package.destroy');
    Route::get('edit-package/{id}', [PackageController::class, 'edit'])
        ->name('parlour.package.edit');
    Route::post('update-package/{id}', [PackageController::class, 'update'])
        ->name('parlour.package.update');

    // Payment Routes
    Route::get('payment', [PaymentController::class, 'show'])
        ->name('parlour.payment');
    Route::get('add-payment', [PaymentController::class, 'index'])
        ->name('parlour.payment.add');
    Route::post('store-payment', [PaymentController::class, 'store'])
        ->name('parlour.payment.store');

    // Booking Routes
    Route::get('booking-request', [BookingController::class, 'request'])
        ->name('parlour.booking.request');
    Route::get('booking-accept/{id}', [BookingController::class, 'accept'])
        ->name('parlour.booking.accept');
    Route::get('booking-reject/{id}', [BookingController::class, 'reject'])
        ->name('parlour.booking.reject');
    Route::get('booking', [BookingController::class, 'show'])
        ->name('parlour.booking');

    // Review Routes
    Route::get('reviews', [ReviewController::class, 'show'])
        ->name('parlour.reviews');
});
