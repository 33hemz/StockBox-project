<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConvertCSVController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ConsumerDataController;



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
    Route::get('/home', function() {
        if(auth()->user()->user_type === 'ADMIN') {
            return redirect(route('create_new_user'));
        } else {
            return redirect(route('dashboard'));
        } 
    })->name('home');
    Route::get('/logout', function() {
        auth()->logout();
        return redirect('/');
    })->name('logout');

    Route::get('/create_password', [LoginController::class, 'createPassword'])->name('first_time_login');
    Route::post('/process_first_time_login', [LoginController::class, 'processPassword'])->name('process_first_time_login');

    // --- USER PAGES ---
    Route::middleware('user_type:USER')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::get('/brand-page', [UserController::class, 'index'])->name('brand_page');
        Route::post('/updated-brand-page', [UserController::class, 'addProductCategory'])->name('updated_brand_page');
        Route::post('/deleted-product-category', [UserController::class, 'deleteProductCategory'])->name('deleted_product_category');
        Route::get('/my_personas_page', [UserController::class, 'my_personas_page'])->name('my_personas_page');
        Route::get('/my_personas_page/{option}', [UserController::class, 'personasManage'])->name('personas_page');
    });
    
    // --- ADMIN PAGES ---
    Route::prefix('admin')->middleware('user_type:ADMIN')->group(function() {
        Route::get('/create-new-user', [AdminController::class, 'index'])->name('create_new_user');
        Route::post('/process-new-user', [AdminController::class, 'processNewUser'])->name('process_new_user');

        Route::get('/view-product-data', [AdminController::class, 'viewProductData'])->name('view_product_data');

        Route::get('/upload-product-data', [ConvertCSVController::class, 'index'])->name('upload_product_data');
        
        Route::post('/process-user-data-table', [ConsumerDataController::class, 'uploadUserData'])->name('process_user_data');
        Route::post('/process-table', [ConvertCSVController::class, 'uploadCSV'])->name('process_csv_file');
        Route::post('/generate-shopping-list', [ConvertCSVController::class, 'create_shopping_list'])->name('create_shopping_list');
    
        Route::get('/manage-user', [ManageUserController::class, 'index'])->name('manage_user');

        Route::post('/delete-user', [ManageUserController::class, 'deleteUser'])->name('delete_user');

        Route::get('/edit-user/{id}', [ManageUserController::class, 'editUser'])->name('edit_user');
        Route::post('/process-edit-user', [ManageUserController::class, 'processEditUser'])->name('process_edit_user');
    });

    Route::prefix('admin')->middleware('user_type:ADMIN')->group(function() {
        Route::get('/create-new-user', [AdminController::class, 'index'])->name('create_new_user');
        Route::post('/add_new_company', [AdminController::class, 'addNewCompany'])->name('add_new_company');
    });
    
});

// DEVELOPER ROUTES
if (env('APP_ENV') == 'local') {
    Route::get('/dev/generate-sample-user', [ConvertCSVController::class, 'test']);
    Route::get('/dev/test', function() {
        return view('first_time_login');
        return view('forgot_password.forgot_password_success');
        return view('forgot_password.enter_new_password', ['token'=>null]);
    });
}