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

    
    public function my_personas_page($option = null) {

        $personasData = ConsumerData::whereHas('products', function ($query) {
            $query->whereIn('category_id', function ($query) {
                $query->select('product_category_id')
                ->from('company_product_category')
                ->where('company_id', auth()->user()->company_id);
            });
        })->get();
        

        switch($option) {
            case 'gender':
                $personas = [
                    'Male' => $personasData->where('gender', 'Male')->first(),
                    'Female' => $personasData->where('gender', 'Female')->first(),
                ];
                
                break;
            case 'age':
                $personas = [        
                    '15-24' => $personasData->whereBetween('age', [15, 24])->first(),
                    '25-34' => $personasData->whereBetween('age', [25, 34])->first(),
                    '35-44' => $personasData->whereBetween('age', [35, 44])->first(),
                    '45-54' => $personasData->whereBetween('age', [45, 54])->first(),
                    '55-64' => $personasData->whereBetween('age', [55, 64])->first(),
                    '65-74' => $personasData->whereBetween('age', [65, 74])->first(),
                    '75+' => $personasData->where('age', '>', 75)->first(),
                ];
                break;
            case 'income':
                $personas = [
                    '10-25k' => $personasData->whereBetween('income', [10000, 25000])->first(),
                    '25k-35k' => $personasData->whereBetween('income', [25001, 35000])->first(),
                    '35k-45k' => $personasData->whereBetween('income', [35001, 45000])->first(),
                    '45k-65k' => $personasData->whereBetween('income', [45001, 65000])->first(),
                    '65k-80k' => $personasData->whereBetween('income', [65001, 80000])->first(),
                    '80k-120k' => $personasData->whereBetween('income', [80001, 120000])->first(),
                    '120k+' => $personasData->whereBetween('income', [120001, 500000])->first(),
                ];
                break;
            case 'city':
                $personas = $personasData->groupBy('city')->map->count()->sortKeys()->map->count()->toArray()->first();
                break;
            case 'dependents':
                $personas = $personasData->groupBy('number_of_dependents')->sortKeys()->map->count()->toArray()->first();
                break;
            case 'dietary_requirements':
                $personas = $personasData->groupBy('dietary_requirements')->sortKeys()->map->count()->toArray()->first(); 
                // Rename empty to 'No restrictions'
                if (isset($personas[''])) {
                    $count = $personas[''];
                    unset($personas['']);
                    $personas['No restrictions'] = $count;
                }
                $personas = collect($personas);
            default:
                $personas = [];
                break;
        }

        $personasFormatted = [];
        foreach ($personas as $tag => $consumer) {
            if ($consumer == null) {
                continue;
            }
            $img = get_headers('https://fakeface.rest/thumb/view/'. time() .'?' . 'gender=' . strtolower($consumer['gender']) . '&mininum_age=' . intval($consumer['age'])-5 .'&maximum_age=' . intval($consumer['age'])+5, 1)['Location'];
            
            array_push($personasFormatted, [
                'tag' => $tag,
                'image_url' => $img,
                'first_name' => fake()->firstName($consumer['gender']), 
                'last_name' => fake()->lastName($consumer['gender']), 
                'gender' => $consumer['gender'], 
                'age' => $consumer['age'], 
                'income' => number_format($consumer['income']), 
                'city' => $consumer['city'], 
                'number_of_dependents' => $consumer['number_of_dependents'], 
                'dietary_requirements' => $consumer['dietary_requirements'], 
                'date_generated' => '08/03/2023'
            ]);
    
        }

        return view('my_personas_page', [
            'personas' => $personasFormatted
        ]);
    }



}
