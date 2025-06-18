<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SubUser\SubUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\TranslationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';
Route::get('admin/confirm-email/{token}', [UpdateProfileController::class, 'confirmEmailChange'])->name('admin.confirmEmailChange');

Route::get('user/confirm-email-change/{token}', [UserController::class, 'confirmEmailChange'])->name('user.confirmEmailChange');

// Admin root route
Route::get('/admin', function () {
    if (Auth::guard('web')->check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }
});
/* Route::get('/admin/dashboard', function () {
    return view('index');
})->middleware(['auth'])->name('home'); */
Route::post('/users/toggle-status/{id}', [UserController::class, 'toggleStatus'])->middleware(['auth'])->name('users.toggleStatus');

Route::get('/dashboard', [UserController::class, 'home'])
    ->middleware(['auth:add_user'])
    ->name('user.dashboard');
	Route::middleware('set.locale')->group(function () {
Route::get('/dashboard/subuser', [SubUserController::class, 'home'])
    ->middleware(['auth:add_user'])
    ->name('subuser.homedashboard');
	});
/* Route::get('/', function () {
    if (Auth::guard('add_user')->check()) {
        return redirect()->route('user.dashboard');
    } elseif (Auth::check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('login.user');
    }
}); */
Route::get('/', function () {
    if (Auth::guard('add_user')->check()) {
        $user = Auth::guard('add_user')->user();
        return match ($user->user_type) {
            'subuser' => redirect()->route('subuser.homedashboard'),
            'user' => redirect()->route('user.dashboard'),
        };
    } elseif (Auth::check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('login.user');
    }
});


Route::middleware('set.locale')->group(function () {
	Route::get('/admin/dashboard', [TranslationController::class, 'dashboard'])->middleware(['auth'])->name('home');
    Route::get('/test-translation', [TranslationController::class, 'index'])->name('test.translation');
    Route::post('/change-locale', [TranslationController::class, 'changeLocale'])->name('change.locale');
	Route::post('/change-locale2', [TranslationController::class, 'changeLocale2'])->middleware(['auth:add_user'])->name('change.locale2');
	Route::get('/dashboard', [UserController::class, 'home'])->name('user.dashboard')->middleware(['auth:add_user']);

// User Dashboard
//Route::get('/dashboard', [UserController::class, 'home'])->name('user.dashboard')->middleware(['auth:add_user']);
Route::get('/dashboard/profile', [UserController::class, 'profile'])
    ->name('user.profile')
    ->middleware(['auth:add_user']);
Route::get('/dashboard/profile/edit/{id}', [UserController::class, 'userProfileEdit'])
    ->name('user.profile.edit')
    ->middleware(['auth:add_user']);	
Route::get('/dashbaord/add/subuser', [SubUserController::class, 'create'])
    ->name('subuser.add')
    ->middleware(['auth:add_user']);

Route::post('/dashbaord/store/subuser', [SubUserController::class, 'store'])
    ->name('subuser.store')
    ->middleware(['auth:add_user']);

Route::get('/dashbaord/listing/subuser', [SubUserController::class, 'index'])
    ->name('subuser.listing')
    ->middleware(['auth:add_user']);

Route::get('/dashbaord/profie/subuser/{id}', [SubUserController::class, 'indexSubuserProfile'])
    ->name('subuser.profile.index')
    ->middleware(['auth:add_user']);

Route::post('/dashbaord/update/subuser/{id}', [SubUserController::class, 'updateSubuserProfile'])
    ->name('subuser.profile.update')
    ->middleware(['auth:add_user']);
});
Route::post('/dashbaord/subuser/toggle-status/{id}', [SubUserController::class, 'subusertoggleStatus'])->middleware(['auth:add_user'])->name('subuser.toggleStatus');

Route::group(['prefix' => '/demo', 'middleware' => 'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
Route::post('/lang/delete/{locale}', [App\Http\Controllers\LanguageController::class, 'delete'])->name('lang.delete');
Route::post('/language/upload', [App\Http\Controllers\LanguageController::class, 'upload'])->name('language.upload');



Route::post('/admin/bulk-action', [UserController::class, 'bulkAction'])->middleware(['auth'])->name('users.bulkAction');
Route::post('/admin/bulk-action-deleted-user', [UserController::class, 'bulkActionDeletedUser'])->middleware(['auth'])->name('deleteduser.bulkAction');
Route::post('/admin/deleted/permanent/{id}', [UserController::class, 'destroyDeleted'])
    ->middleware(['auth'])
    ->name('deleteduser.destroy');
Route::post('/admin/restore/{id}', [UserController::class, 'restore'])
    ->middleware(['auth'])
    ->name('user.restore');	
Route::post('/admin/delete/{id}', [UserController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('users.destroy');

Route::post('/admin/deleteip/{id}', [UserController::class, 'destroyIp'])
    ->middleware(['auth'])
    ->name('users.destroy.ip');	

Route::get('/dashbaord/subuser/edit/{id}', [SubUserController::class, 'edit'])
->middleware(['auth:add_user'])
    ->name('subuser.edit');
Route::post('/dashbaord/subuser/update/{id}', [SubUserController::class, 'update'])->middleware(['auth:add_user'])
    ->name('subuser.update')
->middleware(['auth:add_user']);	
Route::post('/dashbaord/subuser/bulk-action', [SubUserController::class, 'bulkActionSubUser'])->name('subuser.bulkAction')
->middleware(['auth:add_user']);
Route::post('/dashbaord/subuser/delete/{id}', [SubUserController::class, 'destroy'])
    ->name('subuser.destroy') 
->middleware(['auth:add_user']);
	
Route::get('/dashbaord/subuser/ajax', [SubUserController::class, 'getSubUsers'])->name('subuser.ajax')->middleware(['auth:add_user']);
	
Route::middleware('set.locale')->group(function () {
Route::get('/dashboard/subuser/profile', [SubUserController::class, 'profileSubUser'])
    ->name('subuser.profile')
    ->middleware(['auth:add_user']);
});