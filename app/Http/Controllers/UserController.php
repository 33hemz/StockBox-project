<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Company;

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

    public function my_personas_page(){
        
        return view('my_personas_page');
    }


}
