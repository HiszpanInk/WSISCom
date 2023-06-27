<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\EnsureLogin;

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
    return view('index');
})->name('index');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware(EnsureLogin::class);



Route::get('login', function () {
    return view('login');
})->name('loginPage');

Route::post('login', [LoginController::class, 'handleLoginAttemp'])->name('loginAction');
Route::post('logout', [LoginController::class, 'handleLogoutAttemp'])->name('logoutAction');