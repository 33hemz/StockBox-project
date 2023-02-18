<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConvertCSVController;

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

Route::get('/user_manual', function() {
    return view('user_manual');
})->name('user-manual');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/processlogin', [LoginController::class, 'login'])->name('processlogin');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/enter-new-password', [LoginController::class, 'enterNewPassword'])->name('enterNewPassword');
Route::post('/process-password-recovery', [LoginController::class, 'processForgotPassword'])->name('processForgotPassword');

// routes that require authentication
Route::middleware('auth')->group(function() {
    // --- USER PAGES ---
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/logout', function() {
        auth()->logout();
        return redirect('/');
    });
    
    // --- ADMIN PAGES ---
    Route::get('/create_new_user', [AdminController::class, 'index'])->name('create_new_user');
    Route::post('/processnewuser', [AdminController::class, 'processNewUser'])->name('processnewuser');

    Route::get('/brand_page', function() {
        return view('brand_page');
    })->name('brand_page');
});


    
Route::get('/table', function() {
    return view('table');
})->name('table');

Route::get('/processTable', [ConvertCSVController::class, 'uploadCSV'])->name('csv');
