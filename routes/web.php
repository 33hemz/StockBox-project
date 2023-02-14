<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function() {
    return view('landing');
})->name('landing');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/processlogin', [LoginController::class, 'login'])->name('processlogin');
Route::get('/forgot-password', [LoginController::class, 'recovery'])->name('forgot-password');
Route::post('/process_password_recovery', [LoginController::class, 'process_forgot_password'])->name('process_forgot_password');
Route::get('enter_new_password', [LoginController::class, 'enter_new_password'])->name('enter_new_password');

Route::get('/user-manual', function() {
    return view('user-manual');
})->name('user-manual');



Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/logout', function() {
        auth()->logout();
        return redirect('/');
    });
});