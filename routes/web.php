<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

// Admin root route
Route::get('/admin', function () {
    if (Auth::guard('web')->check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/admin/dashboard', function () {
    return view('index');
})->middleware(['auth'])->name('home');

Route::get('/dashboard', [UserController::class, 'home'])
    ->middleware(['auth:add_user'])
    ->name('user.dashboard');

Route::get('/', function () {
    if (Auth::guard('add_user')->check()) {
        return redirect()->route('user.dashboard');
    } elseif (Auth::check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('login.user');
    }
});



// User Dashboard
Route::get('/dashboard', [UserController::class, 'home'])
    ->name('user.dashboard')
    ->middleware(['auth:add_user']);
Route::get('/profile', [UserController::class, 'profile'])
    ->name('user.profile')
    ->middleware(['auth:add_user']);


Route::group(['prefix' => '/demo', 'middleware' => 'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

