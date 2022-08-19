<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
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
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard.admin');

    ## Categories
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('category.index');
        Route::get('/category', 'create')->name('category.create');
        Route::get('/category/{category}', 'edit')->name('category.edit');
        Route::post('/category', 'store')->name('category.store');
        Route::put('/category/{category}', 'update')->name('category.update');
        Route::delete('/category/{category}', 'destroy')->name('category.destroy');
    });

    ## Tags
    Route::controller(TagController::class)->group(function () {
        Route::get('/tags', 'index')->name('tag.index');
        Route::get('/tag', 'create')->name('tag.create');
        Route::get('/tag/{tag}', 'edit')->name('tag.edit');
        Route::post('/tag', 'store')->name('tag.store');
        Route::put('/tag/{tag}', 'update')->name('tag.update');
        Route::delete('/tag/{tag}', 'destroy')->name('tag.destroy');
    });
});
