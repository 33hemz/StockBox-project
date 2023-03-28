<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Company;
use App\Models\ConsumerData;
use Phpml\Clustering\KMeans;

class UserController extends Controller
{
    public function index(){
        $company = Company::find(auth()->user()['company_id']);
        return view('brand_page', [
            'company' => $company,
            'allCategories' => ProductCategory::all(),
            'categories' => $company->productCategories,
        ]);
    }

    public function addProductCategory(){
        $attachedCompanies = ProductCategory::find(request()['product_category_id'])->companies();

        // check if already in list
        $existsAlready = $attachedCompanies->where('company_id', auth()->user()['company_id'])->first();
        if ($existsAlready !== null) {
            return redirect()->back()->withErrors([
                'product_category_id' => 'Category already attached.'
            ])->withInput();
        }

        $category = $attachedCompanies->attach(auth()->user()['company_id']);
        return redirect(route('brand_page'));
    }

    public function deleteProductCategory(){
        ProductCategory::find(request()['product_category_id'])->companies()->detach(auth()->user()['company_id']);
        return redirect(route('brand_page'));
    }

    
    public function my_personas_page() {
        $consumerData = ConsumerData::inRandomOrder()->limit(5)->get();
        $personas = [];


        
        foreach ($consumerData as $consumer) {
            $img = get_headers('https://fakeface.rest/thumb/view/'. time() .'?' . 'gender=' . strtolower($consumer['gender']) . '&mininum_age=' . $consumer['age'] .'&maximum_age=' . $consumer['age'], 1)['Location'];

            array_push($personas, [
                'image_url' => $img,
                'first_name' => fake()->firstName($consumer['gender']), 
                'last_name' => fake()->lastName($consumer['gender']), 
                'gender' => $consumer['gender'], 
                'age' => $consumer['age'], 
                'income' => number_format($consumer['income']), 
                'country' => $consumer['country'], 
                'number_of_dependents' => $consumer['number_of_dependents'], 
                'dietary_requirements' => $consumer['dietary_requirements'], 
                'date_generated' => '08/03/2023'
            ]);
        }
        
     
        
        return view('my_personas_page', [
            'personas' => $personas
        ]);
    }


}
