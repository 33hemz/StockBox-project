<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumerData;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        
        $userdata = ConsumerData::all();

        // gender graph
        $genderData = [
            'Male' => $userdata->where('gender', 'Male')->count(),
            'Female' => $userdata->where('gender', 'Female')->count(),
        ];

        // age graph
        $ageData = [
            '15-24' => $userdata->whereBetween('age', [15, 24])->count(),
            '25-34' => $userdata->whereBetween('age', [25, 34])->count(),
            '35-44' => $userdata->whereBetween('age', [35, 44])->count(),
            '45-54' => $userdata->whereBetween('age', [45, 54])->count(),
            '55-64' => $userdata->whereBetween('age', [55, 64])->count(),
            '65-74' => $userdata->whereBetween('age', [65, 74])->count(),
            '75+' => $userdata->where('age', '>', 75)->count(),
        ];

        // countries
        $countriesData = $userdata->groupBy('country')->sortKeys()->map->count()->toArray();

        // convert to format that google charts is expecting
        $countriesData = array_map(function($key, $value) {
            return [$key, $value];
        }, array_keys($countriesData), array_values($countriesData));

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
        $numOfDependentsData = $userdata->groupBy('number_of_dependents')->sortKeys()->map->count();
        
        // dietary requirements
        $dietaryData = $userdata->groupBy('dietary_requirements')->sortKeys()->map->count()->splice(1); // splice first item (empty string - for ppl with no dietary requirements)

        return view('dashboard', [
            'genderData' => $genderData,
            'ageData' => $ageData,
            'countriesData' => $countriesData,
            'incomeData' => $incomeData,
            'numOfDependentsData' => $numOfDependentsData,
            'dietaryData' => $dietaryData,
        ]);
    }

}
