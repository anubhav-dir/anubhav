<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('site.index');
// });


Route::group(['middleware' => 'guest'], function(){
    Route::get('/add-admin', [UserController::class, 'addAdmin'])->name('user.add-admin');
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::post('/', [SiteController::class, 'index'])->name('index');
    Route::get('/login', [SiteController::class, 'login'])->name('login');
    Route::post('/login', [SiteController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/profile-update', [UserController::class, 'profileupdate'])->name('user.profile-update');
    Route::post('/profile-update', [UserController::class, 'profileupdate'])->name('user.profile-update');
    Route::get('/logout', [SiteController::class, 'logout'])->name('logout');

    Route::resource('user', UserController::class);
});
