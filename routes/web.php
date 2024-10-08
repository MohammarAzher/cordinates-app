<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;

use App\Http\Controllers\Dashboard\CordinatesController;

use App\Http\Controllers\Auth\LoginController;

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
    return view('auth.login');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');


//Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {

    Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


    Route::get('/users',[App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('users');
    Route::get('/user/create',[App\Http\Controllers\Dashboard\UserController::class, 'create'])->name('user.create');
    Route::get('/user/edit/{id}',[App\Http\Controllers\Dashboard\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/store',[App\Http\Controllers\Dashboard\UserController::class, 'store'])->name('user.store');
    Route::get('/user/destroy/{id}',[App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('user.delete');




    Route::get('/cordinates',[App\Http\Controllers\Dashboard\CordinatesController::class, 'index'])->name('cordinates');
    Route::get('/get/cordinates',[App\Http\Controllers\Dashboard\CordinatesController::class, 'get_cordinates'])->name('get_cordinates');



});
