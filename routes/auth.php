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
use App\Http\Controllers\LanguageController;
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


Route::get('/admin/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/admin/forgot-password/store', [PasswordResetLinkController::class, 'store'])->middleware('guest')
    ->name('password.email');

Route::get('/admin/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/admin/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/admin/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/admin/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');



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
Route::middleware('set.locale')->group(function () {
Route::get('/admin/profile', [UpdateProfileController::class, 'create'])
    ->middleware('auth')
    ->name('admin.profile');

Route::get('/admin/profile/edit', [UpdateProfileController::class, 'index'])
    ->middleware('auth')
    ->name('user.index.profile');

Route::post('/admin/profile/update/{id}', [UpdateProfileController::class, 'update'])
    ->middleware('auth')
    ->name('user.update.profile');  
Route::post('/profile/update/{id}', [UserController::class, 'update_user'])
    ->middleware(['auth:add_user'])
    ->name('update.profile'); 	
//Route::middleware('set.locale')->group(function () {
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
	
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])
    ->middleware('auth')
    ->name('user.listing.edit'); 

Route::post('/admin/user/update/{id}', [UserController::class, 'update'])
    ->middleware('auth')
    ->name('user.listing.update'); 
	
	//Language

 Route::get('/admin/language/add', [LanguageController::class, 'create'])
    ->middleware('auth')
    ->name('language.add'); 

Route::post('/admin/language/store', [LanguageController::class, 'store'])
    ->middleware('auth')
    ->name('language.store');  

Route::get('/admin/language/listing', [LanguageController::class, 'index'])
    ->middleware('auth')
    ->name('language.listing'); 
//endlanguage
	# Reset Password
Route::get('/admin/reset/password', [ResetPasswordController::class, 'create'])
    ->middleware('auth')
    ->name('reset');
});



 // Login Page
Route::get('/login', [AuthenticatedSessionController::class, 'createuser'])
->middleware('guest.add_user')   
    ->name('login.user');
    
Route::post('/login', [AuthenticatedSessionController::class, 'storeuser'])
->middleware('guest.add_user')
    ->name('login.store');
    
    Route::post('/logout/user', [AuthenticatedSessionController::class, 'destroyuser'])
    ->middleware('auth:add_user')  
    ->name('logout.user');

#User Forget Password 
Route::get('/forgot-password', [PasswordResetLinkController::class, 'createUser'])
    ->middleware('guest')
    ->name('password.request.user');

Route::post('/forgot-password/store', [PasswordResetLinkController::class, 'storeUser'])
    ->middleware('guest')
    ->name('password.email.user');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'createUser'])
    ->middleware('guest')
    ->name('password.reset.user');

Route::post('/reset-password/update', [NewPasswordController::class, 'storeUser'])
    ->middleware('guest')
    ->name('password.update.user');

//Otp Verify Admin
	
Route::post('/admin/verifyOtp', [AuthenticatedSessionController::class, 'verifyOtp'])
    ->middleware('guest')
    ->name('login.verify.otp');	
	
Route::post('/admin/verifyOtp/Code', [AuthenticatedSessionController::class, 'verifyOtpCode'])
    ->middleware('guest')
    ->name('otp.verify.code');		
	
	
//Otp Verify User
	
Route::post('/login/verifyOtp', [AuthenticatedSessionController::class, 'verifyOtpUser'])
    ->middleware('guest.add_user')
    ->name('login.user.verify.otp');	
	
Route::post('/login/verifyOtp/Code', [AuthenticatedSessionController::class, 'verifyOtpCodeUser'])
    ->middleware('guest.add_user')
    ->name('otp.user.verify.code');	
	
Route::get('/lang/download', function () {
    $path = resource_path('lang/en.json');
    if (!file_exists($path)) {
        abort(404, 'Language file not found.');
    }
    return Response::download($path, 'en.json', [
        'Content-Type' => 'application/json',
    ]);
})->name('lang.download');	

/* Route::delete('/lang/delete/{locale}', [App\Http\Controllers\LanguageController::class, 'delete'])->name('lang.delete'); */

// Login as user (from admin)
Route::get('/admin/user/login/{id}', [UserController::class, 'autoLogin'])
    ->middleware('auth') // regular admin auth
    ->name('user.auto.login');

// Return to admin
Route::get('/admin/stop-impersonation', [UserController::class, 'stopImpersonation'])
    ->middleware('auth:add_user') // now the user is logged in, so this is valid
    ->name('admin.stop.impersonation');
