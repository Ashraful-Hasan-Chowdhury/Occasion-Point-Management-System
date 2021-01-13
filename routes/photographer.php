<?php

use App\Http\Controllers\Photographer\HomeController;
use App\Http\Controllers\Photographer\Auth\LoginController;
use App\Http\Controllers\Photographer\Auth\RegisterController;
use App\Http\Controllers\Photographer\Auth\ForgotPasswordController;
use App\Http\Controllers\Photographer\Auth\ResetPasswordController;
use App\Http\Controllers\Photographer\Auth\VerificationController;
use App\Http\Controllers\Photographer\ProfileController;
use App\Http\Controllers\Photographer\PortfolioController;
use App\Http\Controllers\Photographer\PackageController;
use App\Http\Controllers\Photographer\PaymentController;
use App\Http\Controllers\Photographer\BookingController;
use App\Http\Controllers\Photographer\ReviewController;

Route::group(['namespace' => 'Photographer'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('photographer.dashboard');

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('photographer.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('photographer.logout');

    // Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('photographer.register');
    Route::post('register', [RegisterController::class, 'register']);


    // Passwords
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('photographer.password.email');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('photographer.password.request');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('photographer.password.reset');

    // Must verify email
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('photographer.verification.resend');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('photographer.verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('photographer.verification.verify');

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'index'])
        ->name('photographer.profile');
    Route::post('profile-update', [ProfileController::class, 'update'])
        ->name('photographer.profile.update');
    Route::post('password-update', [ProfileController::class, 'updatepassword'])
        ->name('photographer.password.update');

    // Portfolio Routes
    Route::get('portfolio', [PortfolioController::class, 'show'])
        ->name('photographer.portfolio');
    Route::get('add-portfolio', [PortfolioController::class, 'index'])
        ->name('photographer.portfolio.add');
    Route::post('store-portfolio', [PortfolioController::class, 'store'])
        ->name('photographer.portfolio.store');
    Route::get('destroy-portfolio/{id}', [PortfolioController::class, 'destroy'])
        ->name('photographer.portfolio.destroy');
    Route::get('edit-portfolio/{id}', [PortfolioController::class, 'edit'])
        ->name('photographer.portfolio.edit');
    Route::post('update-portfolio/{id}', [PortfolioController::class, 'update'])
        ->name('photographer.portfolio.update');

    // Packages Routes
    Route::get('package', [PackageController::class, 'show'])
        ->name('photographer.package');
    Route::get('add-package', [PackageController::class, 'index'])
        ->name('photographer.package.add');
    Route::post('store-package', [PackageController::class, 'store'])
        ->name('photographer.package.store');
    Route::get('destroy-package/{id}', [PackageController::class, 'destroy'])
        ->name('photographer.package.destroy');
    Route::get('edit-package/{id}', [PackageController::class, 'edit'])
        ->name('photographer.package.edit');
    Route::post('update-package/{id}', [PackageController::class, 'update'])
        ->name('photographer.package.update');
    // Payment Routes
    Route::get('payment', [PaymentController::class, 'show'])
        ->name('photographer.payment');
    Route::get('add-payment', [PaymentController::class, 'index'])
        ->name('photographer.payment.add');
    Route::post('store-payment', [PaymentController::class, 'store'])
        ->name('photographer.payment.store');

    // Booking Routes
    Route::get('booking-request', [BookingController::class, 'request'])
        ->name('photographer.booking.request');
    Route::get('booking-accept/{id}', [BookingController::class, 'accept'])
        ->name('photographer.booking.accept');
    Route::get('booking-reject/{id}', [BookingController::class, 'reject'])
        ->name('photographer.booking.reject');
    Route::get('booking', [BookingController::class, 'show'])
        ->name('photographer.booking');

    // Review Routes
    Route::get('reviews', [ReviewController::class, 'show'])
        ->name('photographer.reviews');
});
