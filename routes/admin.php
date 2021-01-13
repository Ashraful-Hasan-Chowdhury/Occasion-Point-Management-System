<?php

use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\ParlourController;
use App\Http\Controllers\Admin\PhotographerController;

Route::GET('/home', 'AdminController@index')->name('admin.home');
// Login and Logout
Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
Route::POST('/', 'LoginController@login');
Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

// Password Resets
Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('/password/reset', 'ResetPasswordController@reset');
Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
Route::POST('/password/change', 'AdminController@changePassword');

// Register Admins
Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/register', 'RegisterController@register');
Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

// Admin Lists
Route::get('/show', 'AdminController@show')->name('admin.show');
Route::get('/me', 'AdminController@me')->name('admin.me');

// Admin Roles
Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

// Roles
Route::get('/roles', 'RoleController@index')->name('admin.roles');
Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

// active status
Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
Route::delete('activation/{admin}', 'ActivationController@deactivate');
Route::resource('permission', 'PermissionController');

Route::fallback(function () {
    return abort(404);
});

// Hall Routes
Route::get('/hall', [HallController::class, 'show'])
    ->name('admin.hall');
Route::get('/block-hall/{id}', [HallController::class, 'block'])
    ->name('admin.hall.block');
Route::get('/unblock-hall/{id}', [HallController::class, 'unblock'])
    ->name('admin.hall.unblock');
Route::get('/hall/request', [HallController::class, 'showrequests'])
    ->name('admin.hall.request');
Route::get('/reject-hall/{id}', [HallController::class, 'reject'])
    ->name('admin.hall.reject');
Route::get('/approval-hall/{id}', [HallController::class, 'approval'])
    ->name('admin.hall.approval');
Route::get('/approve-hall/{id}', [HallController::class, 'approve'])
    ->name('admin.hall.approve');
Route::get('/due-hall', [HallController::class, 'due'])
    ->name('admin.hall.due');
// hallpayment
Route::get('/hall-payment', [HallController::class, 'payment'])
    ->name('admin.hall.payment');
Route::get('/hall-payment/request', [HallController::class, 'paymentrequest'])
    ->name('admin.hall.payment.request');
Route::get('/hall-payment/confirm/{id}/{ownerid}', [HallController::class, 'confirm'])
    ->name('admin.hall.payment.confirm');
Route::get('/hall-payment/confirm/{id}/unblock/{ownerid}', [HallController::class, 'confirmandunblock'])
    ->name('admin.hall.payment.confirm.unblock');
Route::get('/hall-payment/decline/{id}', [HallController::class, 'decline'])
    ->name('admin.hall.payment.decline');

// Parlour Routes
Route::get('/parlour', [ParlourController::class, 'show'])
    ->name('admin.parlour');
Route::get('/block-parlour/{id}', [ParlourController::class, 'block'])
    ->name('admin.parlour.block');
Route::get('/unblock-parlour/{id}', [ParlourController::class, 'unblock'])
    ->name('admin.parlour.unblock');
Route::get('/parlour/request', [ParlourController::class, 'showrequests'])
    ->name('admin.parlour.request');
Route::get('/reject-parlour/{id}', [ParlourController::class, 'reject'])
    ->name('admin.parlour.reject');
Route::get('/approval-parlour/{id}', [ParlourController::class, 'approval'])
    ->name('admin.parlour.approval');
Route::get('/approve-parlour/{id}', [ParlourController::class, 'approve'])
    ->name('admin.parlour.approve');
Route::get('/due-parlour', [ParlourController::class, 'due'])
    ->name('admin.parlour.due');
// parlourpayment
Route::get('/parlour-payment', [ParlourController::class, 'payment'])
    ->name('admin.parlour.payment');
Route::get('/parlour-payment/request', [ParlourController::class, 'paymentrequest'])
    ->name('admin.parlour.payment.request');
Route::get('/parlour-payment/confirm/{id}/{ownerid}', [ParlourController::class, 'confirm'])
    ->name('admin.parlour.payment.confirm');
Route::get('/parlour-payment/confirm/{id}/unblock/{ownerid}', [ParlourController::class, 'confirmandunblock'])
    ->name('admin.parlour.payment.confirm.unblock');
Route::get('/parlour-payment/decline/{id}', [ParlourController::class, 'decline'])
    ->name('admin.parlour.payment.decline');

// Photographer Routes
Route::get('/photographer', [PhotographerController::class, 'show'])
    ->name('admin.photographer');
Route::get('/block-photographer/{id}', [PhotographerController::class, 'block'])
    ->name('admin.photographer.block');
Route::get('/unblock-photographer/{id}', [PhotographerController::class, 'unblock'])
    ->name('admin.photographer.unblock');
Route::get('/photographer/request', [PhotographerController::class, 'showrequests'])
    ->name('admin.photographer.request');
Route::get('/reject-photographer/{id}', [PhotographerController::class, 'reject'])
    ->name('admin.photographer.reject');
Route::get('/approval-photographer/{id}', [PhotographerController::class, 'approval'])
    ->name('admin.photographer.approval');
Route::get('/approve-photographer/{id}', [PhotographerController::class, 'approve'])
    ->name('admin.photographer.approve');
Route::get('/due-photographer', [PhotographerController::class, 'due'])
    ->name('admin.photographer.due');
// photographerpayment
Route::get('/photographer-payment', [PhotographerController::class, 'payment'])
    ->name('admin.photographer.payment');
Route::get('/photographer-payment/request', [PhotographerController::class, 'paymentrequest'])
    ->name('admin.photographer.payment.request');
Route::get('/photographer-payment/confirm/{id}/{ownerid}', [PhotographerController::class, 'confirm'])
    ->name('admin.photographer.payment.confirm');
Route::get('/photographer-payment/confirm/{id}/unblock/{ownerid}', [PhotographerController::class, 'confirmandunblock'])
    ->name('admin.photographer.payment.confirm.unblock');
Route::get('/photographer-payment/decline/{id}', [PhotographerController::class, 'decline'])
    ->name('admin.photographer.payment.decline');
