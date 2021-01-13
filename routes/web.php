<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\HallController;
use App\Http\Controllers\User\ParlourController;
use App\Http\Controllers\User\PhotographerController;
use App\Http\Controllers\User\ProfileController;

Auth::routes();

// ckeditor upload
Route::get('ckeditor/image_upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');

// User Home Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Hall Routes
Route::get('/halls', [HallController::class, 'index'])->name('hall');
Route::get('/hall-by-date', [HallController::class, 'show'])->name('hall.date');
Route::get('/hall-details/{id}', [HallController::class, 'details'])->name('hall.details');
// Hall Review
Route::post('/hall-review/{id}', [HallController::class, 'review'])->name('review.store.hall');
// Hall booking
Route::post('/hall-booking/{id}', [HallController::class, 'booking'])->name('hall.book');
Route::get('/hall-bookings', [HallController::class, 'bookings'])->name('hall.bookings');

// Parlour Routes
Route::get('/parlours', [ParlourController::class, 'index'])->name('parlour');
Route::get('/parlour-by-date', [ParlourController::class, 'show'])->name('parlour.date');
Route::get('/parlour-details/{id}', [ParlourController::class, 'details'])->name('parlour.details');
// Parlour Review
Route::post('/parlour-review/{id}', [ParlourController::class, 'review'])->name('review.store.parlour');
// Parlour booking
Route::post('/parlour-booking/{id}', [ParlourController::class, 'booking'])->name('parlour.book');
Route::get('/parlour-bookings', [ParlourController::class, 'bookings'])->name('parlour.bookings');


// Photographer Routes
Route::get('/photographers', [PhotographerController::class, 'index'])->name('photographer');
Route::get('/photographer-by-date', [PhotographerController::class, 'show'])->name('photographer.date');
Route::get('/photographer-details/{id}', [PhotographerController::class, 'details'])->name('photographer.details');
// Photographer Review
Route::post('/photographer-review/{id}', [PhotographerController::class, 'review'])->name('review.store.photographer');
// Photographer booking
Route::post('/photographer-booking/{id}', [PhotographerController::class, 'booking'])->name('photographer.book');
Route::get('/photographer-bookings', [PhotographerController::class, 'bookings'])->name('photographer.bookings');

// Profile routes
Route::get('/password', [ProfileController::class, 'password'])->name('password');
Route::post('/update-password', [ProfileController::class, 'updatepassword'])->name('updatepassword');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/update-profile', [ProfileController::class, 'updateprofile'])->name('updateprofile');
