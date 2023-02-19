<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Company;

class UserController extends Controller
{
    public function index(){
        return view('brand_page', [
            'company' => Company::find(auth()->user()['company_id']),
            'categories' => ProductCategory::all()
        ]);
    }

    public function addProductCategory(){
        $category = ProductCategory::create(request()->all());
        $category->save();
        return redirect(route('brand_page'));
    }

    public function deleteProductCategory(){
        $category = ProductCategory::find(request()['product_id']);
        $category->delete();
        return redirect(route('brand_page'));
    }
}
