<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConvertCSVController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\UserDataController;



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

Route::get('/home', function() {
    if(auth()->user()->user_type === 'ADMIN') {
        return redirect(route('create_new_user'));
    }
    else {
        return redirect(route('dashboard'));
    } 
    })->name('home');
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

    Route::get('/create_password', [LoginController::class, 'createPassword'])->name('first_time_login');
    Route::post('/process_first_time_login', [LoginController::class, 'processPassword'])->name('process_first_time_login');

    // --- USER PAGES ---
    Route::middleware('user_type:USER')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        

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
        
        Route::post('/process-user-data-table', [UserDataController::class, 'uploadUserData'])->name('process_user_data');
        Route::post('/process-table', [ConvertCSVController::class, 'uploadCSV'])->name('process_csv_file');
    

    
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

Route::get('/userdatagen', function() {
    $faker = Faker\Factory::create();
    $fullNames = array($faker->name());
    $genders = array('Male', 'Female');
    $countries = array('USA', 'Canada', 'UK', 'Australia', 'France');
    $incomes = array(20000, 40000, 60000, 80000, 100000);
    $numDependents = array(0, 1, 2, 3, 4);
    $dietaryRequirements = array('Vegetarian', 'Vegan', 'Gluten-free', 'Lactose-free', 'No restrictions');

    $data = array();

    for ($i = 0; $i < 20; $i++) {
       
        $fullName = $faker->name()  ; 
        $gender = $genders[rand(0, count($genders) - 1)];
        $age = rand(18, 80);
        $country = $countries[rand(0, count($countries) - 1)];
        $income = $incomes[rand(0, count($incomes) - 1)];
        $numDependent = $numDependents[rand(0, count($numDependents) - 1)];
        $dietaryRequirement = $dietaryRequirements[rand(0, count($dietaryRequirements) - 1)];
        

        print_r(array(
            'fullName' => $fullName,
            'gender' => $gender,
            'age' => $age,
            'country' => $country,
            'income' => $income,
            'numDependents' => $numDependent,
            'dietaryRequirements' => $dietaryRequirement
          ));
        
        echo "<br>";
    }
});

Route::get('/generateShoppingList', function() {
function create_shopping_list() {
    $items = array(
        "Fruits" => array("Apples", "Bananas", "Grapes"),
        "Vegetables" => array("Mushrooms", "Potatoes"),
        "Meats" => array("Chicken", "Beef", "Pork", "Quorn Chicken Nuggets"),
        "Milk" => array("Whole Milk", "Semi-Skimmed Milk", "Oat Milk")
    );
    $list = "<h2>Shopping List</h2><ul>";
    foreach ($items as $category => $item) {
        $random_item = $item[array_rand($item)];
        $list .= "<li>$random_item</li>";
    }
    $list .= "</ul>";
    return $list;
}

// Call the function to create the shopping list
$shopping_list = create_shopping_list();

// Display the shopping list
echo $shopping_list;

});