<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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


Route::get('/', function () {
    if(Auth::guest()) {
        return redirect(route('user.login'));
    }
    return view('home');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/user/login','login')->name('user.login')->middleware('guest');
    Route::get('/user/register', 'register')->name('user.register')->middleware('guest');
    Route::post('/user/logout', 'logout')->name('user.logout');
    Route::post('/user/store', 'store')->name('user.store');
    Route::post('/user/authenticate', 'authenticate')->name('user.authenticate');
    Route::post('/user/delete','delete')->name('user.delete');
});

Route::controller(ProfileController::class)->group(function() {
    Route::post('/profile/store', 'store')->name('profile.store');
    Route::get('/profile/edit/{profile}', 'edit')->name('profile.edit');
    Route::post('/profile/update/{profile}', 'update')->name('profile.update');
    Route::get('/profile/create', 'create')->name('profile.create');
    Route::get('/profile/view/{profile}', 'view')->name('profile.view');

})->middleware('auth');


