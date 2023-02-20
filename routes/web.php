<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConvertCSVController;
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


/*

NAMING CONVENTIONS:
https://xqsit.github.io/laravel-coding-guidelines/docs/naming-conventions/

Controller Names: CapitalCase
Controller functions: camelCase
URLs: kebab-case
Blade views and route names: snake_case

*/

Route::get('/', function() { return view('landing'); })->name('landing');
Route::get('/user-manual', function() { return view('user_manual'); })->name('user_manual');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/process-login', [LoginController::class, 'login'])->name('process_login');

Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot_password');
Route::get('/enter-new-password', [LoginController::class, 'enterNewPassword'])->name('enter_new_password');
Route::post('/process-password-recovery', [LoginController::class, 'processForgotPassword'])->name('process_forgot_password');

// routes that require authentication
Route::middleware('auth')->group(function() {
    // --- USER+ADMIN PAGES ---
    Route::get('/logout', function() {
        auth()->logout();
        return redirect('/');
    })->name('logout');

    // --- USER PAGES ---
    Route::middleware('user_type:USER')->group(function() {
        Route::get('/dashboard', function() {
            return view('dashboard');
        })->name('dashboard');
        

        Route::get('/brand-page', [UserController::class, 'index'])->name('brand_page');
        Route::post('/updated-brand-page', [UserController::class, 'addProductCategory'])->name('updated_brand_page');
        Route::post('/deleted-product-category', [UserController::class, 'deleteProductCategory'])->name('deleted_product_category');
    });
    
    // --- ADMIN PAGES ---
    Route::prefix('admin')->middleware('user_type:ADMIN')->group(function() {
        Route::get('/create-new-user', [AdminController::class, 'index'])->name('create_new_user');
        Route::post('/process-new-user', [AdminController::class, 'processNewUser'])->name('process_new_user');


        Route::get('/table', [ConvertCSVController::class, 'index'])->name('table');

        Route::get('/process-table', [ConvertCSVController::class, 'uploadCSV'])->name('csv');
    });
    
});
