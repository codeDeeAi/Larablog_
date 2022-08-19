<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Users\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// Force HTTPS for production
if (app()->environment('production')) {
    URL::forceScheme('https');
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

## Guest Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

## Home 
Route::get('/', [HomeController::class, 'index'])->name('users.home');


## Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
       return view('admin.dashboard.index');
    });

    ## Tags
    Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
    Route::post('/tag', [TagController::class, 'create'])->name('tag.create');
    Route::put('/tag/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
});
