<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
        // \App\Models\ProductCategory::factory()->count(14)->sequence(
        //     ['product_category_name' => 'Fresh & Chilled Food'],
        //     ['product_category_name' => 'Food Cupboard'],
        //     ['product_category_name' => 'Bakery'],
        //     ['product_category_name' => 'Frozen Food'],
        //     ['product_category_name' => 'Dietary, Lifestyle & World Foods'],
        //     ['product_category_name' => 'Soft Drinks, Tea & Coffee'],
        //     ['product_category_name' => 'Beer, Wine & Spirits'],
        //     ['product_category_name' => 'Health, Beauty & Personal Care'],
        //     ['product_category_name' => 'Baby, Parent & Kids'],
        //     ['product_category_name' => 'Home Care & Cleaning'],
        //     ['product_category_name' => 'Home, Garden & Pets'],
        //     ['product_category_name' => 'Occasions & Entertaining'],
        //     ['product_category_name' => 'Clothing & Accessories'],
        //     ['product_category_name' => 'Christmas'],   
        // )->create();

        // \App\Models\Company::factory()->create([
        //     'company_name' => 'Nestle',
        // ]);

        // \App\Models\User::factory()->create([
        //     'user_type' => 'USER',
        //     'first_name' => 'Test',
        //     'last_name' => 'User',
        //     'company_id' => 1,
        //     'email' => 'user',
        //     'password' => password_hash('password', PASSWORD_DEFAULT),
        //     'init_user' => 1
        // ]);

        \App\Models\User::factory()->create([
            'user_type' => 'ADMIN',
            'first_name' => 'FirstName',
            'last_name' => 'LastName',
            'company_id' => null,
            'email' => 'admin',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'init_user' => 1
        ]);
    }
}
