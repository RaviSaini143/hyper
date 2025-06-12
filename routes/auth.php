<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Admin Login
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth') 
    ->name('logout');


Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');


# Reset Password
Route::get('/admin/reset/password', [ResetPasswordController::class, 'create'])
    ->middleware('auth')
    ->name('reset');

Route::post('/admin/check/email', [ResetPasswordController::class, 'store'])
    ->middleware('auth')
    ->name('reset.password');  

Route::get('/admin/password/reset', [ResetPasswordController::class, 'showResetForm'])
    ->middleware('auth')
    ->name('password.reset.form');

Route::post('/admin/update/password', [ResetPasswordController::class, 'update'])
    ->middleware('auth')
    ->name('update.password');

Route::post('/admin/send-reset-password-email', [ResetPasswordController::class, 'sendResetPasswordEmail'])
    ->middleware('auth')
    ->name('send.reset.password.email');

#auth Profile

Route::get('/admin/profile', [UpdateProfileController::class, 'create'])
    ->middleware('auth')
    ->name('admin.profile');

Route::get('/admin/profile/edit', [UpdateProfileController::class, 'index'])
    ->middleware('auth')
    ->name('user.index.profile');

Route::post('/admin/profile/update/{id}', [UpdateProfileController::class, 'update'])
    ->middleware('auth')
    ->name('user.update.profile');    

 #Add User
 Route::get('/admin/user/add', [UserController::class, 'create'])
    ->middleware('auth')
    ->name('user.add'); 

  Route::post('/admin/user/store', [UserController::class, 'store'])
    ->middleware('auth')
    ->name('user.store');    

 Route::get('/admin/user/listing', [UserController::class, 'index'])
    ->middleware('auth')
    ->name('user.listing'); 

 // Login Page
Route::get('/login', [AuthenticatedSessionController::class, 'createuser'])
->middleware('guest.add_user')   
    ->name('login.user');
    
Route::post('/login', [AuthenticatedSessionController::class, 'storeuser'])
->middleware('guest.add_user')
    ->name('login.store');
    
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroyuser'])
    ->middleware('auth:add_user')  
    ->name('logout.user');

   