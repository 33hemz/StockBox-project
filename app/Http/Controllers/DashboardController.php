<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumerData;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
    
        $userData = ConsumerData::query();

        // Gender filter
        if (request()->filled('gender')) {
            $userData->where('gender', request()->gender);
        }
        
        //Age filter
        if (request()->filled('age')) {
            $age = explode('-', request()->age);
            $userData->whereBetween('age', [$age[0], $age[1]]);
        }

        // Country filter
        if (request()->filled('city')) {
            $userData->where('city', request()->city);
        }
        
       // Income filter
       if (request()->filled('income')) {
        $income = request()->income;
        if (strpos($income, '+') !== false) {
            $minIncome = str_replace('k', '001', str_replace('+', '', $income));
            $userData->where('income', '>', $minIncome);
        } else {
            $income = explode('-', $income);
            $minIncome = str_replace('k', '001', $income[0]);
            $maxIncome = str_replace('k', '000', $income[1]);
            $userData->whereBetween('income', [$minIncome, $maxIncome]);
        }
        }

        // Dependants filter
        if (request()->filled('number_of_dependents')) {
            $userData->where('number_of_dependents', request()->number_of_dependents);
        }
        
        // Dietary requirements filter
        if (request()->filled('dietary_requirements')) {
            $userData->where('dietary_requirements', request()->dietary_requirements);
        }
    
        // Get all data after applying filters
        $userData = $userData->get();

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
        
        // cites
        if (request()->filled('city')) {
            $selectedCity = request()->city;
            $citiesData = [        $selectedCity => $userData->where('city', $selectedCity)->count()    ];
        } else {
            $citiesData = $userData->groupBy('city')->sortKeys()->map->count()->toArray();
            $selectedCity = null;
        }

        $citiesData = array_map(function($key, $value) {
            return [$key, $value];
        }, array_keys($citiesData), array_values($citiesData));
        
        $cities = array_keys($userData->groupBy('city')->sortKeys()->toArray());


        // income
        $incomeData = [
            '10-25k' => $userData->whereBetween('income', [10000, 25000])->count(),
            '25k-35k' => $userData->whereBetween('income', [25001, 35000])->count(),
            '35k-45k' => $userData->whereBetween('income', [35001, 45000])->count(),
            '45k-65k' => $userData->whereBetween('income', [45001, 65000])->count(),
            '65k-80k' => $userData->whereBetween('income', [65001, 80000])->count(),
            '80k-120k' => $userData->whereBetween('income', [80001, 120000])->count(),
            '120k+' => $userData->whereBetween('income', [120001, 500000])->count(),
        ];
    
        // number of dependents 
        $numOfDependentsData = $userData->groupBy('number_of_dependents')->sortKeys()->map->count();
        
        // dietary requirements
        $dietaryData = $userData->groupBy('dietary_requirements')->sortKeys()->map->count()->splice(1); // splice first item (empty string - for ppl with no dietary requirements)
    
        return view('dashboard', [
            'genderData' => $genderData,
            'ageData' => $ageData,
            'citiesData' => $citiesData,
            'incomeData' => $incomeData,
            'numOfDependentsData' => $numOfDependentsData,
            'dietaryData' => $dietaryData,
            'cities' => $cities,
            ]
        );
    }
}
    