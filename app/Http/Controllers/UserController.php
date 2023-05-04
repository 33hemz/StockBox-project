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
                $cities = $personasData->unique('city')->sortBy('city')->pluck('city')->toArray();
                $personas = [];
                foreach ($cities as $city) {
                    array_push($personas, $personasData->where('city', $city)->first());
                }
                break;
            case 'dependants':
                $dependants = $personasData->unique('number_of_dependants')->sortBy('number_of_dependants')->pluck('number_of_dependants')->toArray();
                
                $personas = [];
                foreach ($dependants as $num) {
                    array_push($personas, $personasData->where('number_of_dependants', $num)->first());
                }
                break;
            case 'dietary-requirements':
                $dietar_requirements = $personasData->unique('dietary_requirements')->sortBy('dietary_requirements')->pluck('dietary_requirements')->toArray();
                
                $personas = [];
                foreach ($dietar_requirements as $num) {
                    array_push($personas, $personasData->where('dietary_requirements', $num)->first());
                }

            default:
                return redirect('my_personas_page/gender');
                break;
        }

        $personasFormatted = [];
        foreach ($personas as $tag => $consumer) {
            if ($consumer == null) {
                continue;
            }
            // $img = get_headers('https://fakeface.rest/thumb/view/'. time() .'?' . 'gender=' . strtolower($consumer['gender']) . '&mininum_age=' . intval($consumer['age'])-5 .'&maximum_age=' . intval($consumer['age'])+5, 1)['Location'];
            $img = null;
            array_push($personasFormatted, [
                'tag' => $tag,
                'image_url' => $img,
                'id' => $consumer['id'], 
                'first_name' => fake()->firstName($consumer['gender']), 
                'last_name' => fake()->lastName($consumer['gender']), 
                'gender' => $consumer['gender'], 
                'age' => $consumer['age'], 
                'income' => number_format($consumer['income']), 
                'city' => $consumer['city'], 
                'number_of_dependants' => $consumer['number_of_dependants'], 
                'dietary_requirements' => $consumer['dietary_requirements'], 
                'date_generated' => '08/03/2023'
            ]);
    
        }

        return view('my_personas_page', [
            'personas' => $personasFormatted
        ]);
    }



}
