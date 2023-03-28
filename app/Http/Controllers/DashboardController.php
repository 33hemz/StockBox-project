<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumerData;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
    
        $userData = ConsumerData::query();

        // Gender filter
        if ($request->filled('gender')) {
            $userData->where('gender', request()->gender);
        }
        
        if ($request->filled('age')) {
            $userData->where('age', request()->age);
        }
        // Get all data after applying filters
        $userData = $userData->get();

        // $userData = $query->get();

        // gender graph
        $genderData = [
            'Male' => $userData->where('gender', 'Male')->count(),
            'Female' => $userData->where('gender', 'Female')->count(),
        ];

        // Age graph
        $ageData = [        
            '15-24' => $userData->whereBetween('age', [15, 24])->count(),
            '25-34' => $userData->whereBetween('age', [25, 34])->count(),
            '35-44' => $userData->whereBetween('age', [35, 44])->count(),
            '45-54' => $userData->whereBetween('age', [45, 54])->count(),
            '55-64' => $userData->whereBetween('age', [55, 64])->count(),
            '65-74' => $userData->whereBetween('age', [65, 74])->count(),
            '75+' => $userData->where('age', '>', 75)->count(),
        ];
    
        // countries
        $countriesData = $userData->groupBy('country')->sortKeys()->map->count()->toArray();
    
        // convert to format that google charts is expecting
        $countriesData = array_map(function($key, $value) {
            return [$key, $value];
        }, array_keys($countriesData), array_values($countriesData));
    
    
        $countries = array_keys($userData->groupBy('country')->sortKeys()->toArray());
    
        // income
        $incomeData = [
            '15-25k' => $userdata->whereBetween('income', [15000, 25000])->count(),
            '25k-35k' => $userdata->whereBetween('income', [25000, 35000])->count(),
            '35k-45k' => $userdata->whereBetween('income', [35000, 45000])->count(),
            '45k-65k' => $userdata->whereBetween('income', [45000, 65000])->count(),
            '65k-80k' => $userdata->whereBetween('income', [65000, 80000])->count(),
            '80k-120k' => $userdata->whereBetween('income', [80000, 120000])->count(),
            '120k+' => $userdata->where('income', '>', 12000)->count(),
        ];
    
        // number of dependents 
        $numOfDependentsData = $userData->groupBy('number_of_dependents')->sortKeys()->map->count();
        
        // dietary requirements
        $dietaryData = $userData->groupBy('dietary_requirements')->sortKeys()->map->count()->splice(1); // splice first item (empty string - for ppl with no dietary requirements)
    
        return view('dashboard', [
            'genderData' => $genderData,
            'ageData' => $ageData,
            'countriesData' => $countriesData,
            'incomeData' => $incomeData,
            'numOfDependentsData' => $numOfDependentsData,
            'dietaryData' => $dietaryData,
            'countries' => $countries,
            'selectedGender']
        );
    }
}
    