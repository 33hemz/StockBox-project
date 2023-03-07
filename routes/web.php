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

Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('password.request');
Route::post('/process-password-recovery', [LoginController::class, 'processForgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('forgot_password.enter_new_password', ['token' => $token]);
})->name('password.reset');
Route::post('/enter-new-password', [LoginController::class, 'processNewPassword'])->name('password.update');

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

        Route::get('/view-product-data', [AdminController::class, 'viewProductData'])->name('view_product_data');

        Route::get('/upload-product-data', [ConvertCSVController::class, 'index'])->name('upload_product_data');


        Route::post('/process-table', [ConvertCSVController::class, 'uploadCSV'])->name('process_csv_file');
    
    });

    Route::prefix('admin')->middleware('user_type:ADMIN')->group(function() {
        Route::get('/create-new-user', [AdminController::class, 'index'])->name('create_new_user');
        Route::post('/add_new_company', [AdminController::class, 'addNewCompany'])->name('add_new_company');
    });
    
});
