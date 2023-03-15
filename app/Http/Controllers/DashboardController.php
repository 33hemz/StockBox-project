<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        
        $userdata = UserData::all();

        // gender graph
        $genderData = [
            'Male' => UserData::where('gender', 'Male')->count(),
            'Female' => UserData::where('gender', 'Female')->count(),
        ];

        // age graph
        $ageData = [
            '15-24' => UserData::whereBetween('age', [15, 24])->count(),
            '25-34' => UserData::whereBetween('age', [25, 34])->count(),
            '35-44' => UserData::whereBetween('age', [35, 44])->count(),
            '45-54' => UserData::whereBetween('age', [45, 54])->count(),
            '55-64' => UserData::whereBetween('age', [55, 64])->count(),
            '65-74' => UserData::whereBetween('age', [65, 74])->count(),
            '75+' => UserData::where('age', '>', 75)->count(),
        ];

        // countries
        $countriesData = UserData::select('country', DB::raw('count(*) as count'))->groupBy('country')->get()->pluck('count', 'country');
        foreach ($countriesData as $feature => $value) {
            $countriesDataFormatted[] = ['feature' => $feature, 'value' => $value];
        }

        // income
        $incomeData = [
            '15-25k' => UserData::whereBetween('income', [15000, 25000])->count(),
            '25k-35k' => UserData::whereBetween('income', [25000, 35000])->count(),
            '35k-45k' => UserData::whereBetween('income', [35000, 45000])->count(),
            '45k-65k' => UserData::whereBetween('income', [45000, 65000])->count(),
            '65k-80k' => UserData::whereBetween('income', [65000, 80000])->count(),
            '80k-120k' => UserData::whereBetween('income', [80000, 120000])->count(),
            '120k+' => UserData::where('income', '>', 12000)->count(),
        ];

        // number of dependents 
        $numOfDependentsData = UserData::select('number_of_dependents', DB::raw('count(*) as count'))->groupBy('number_of_dependents')->get()->pluck('count', 'number_of_dependents');
            
        // dietary requirements
        $dietaryData = UserData::select('dietary_requirements', DB::raw('count(*) as count'))->where('dietary_requirements' , "!=", "")->groupBy('dietary_requirements')->get()->pluck('count', 'dietary_requirements');

        return view('dashboard', [
            'genderData' => $genderData,
            'ageData' => $ageData,
            'countriesData' => $countriesData,
            'countriesDataFormatted' => $countriesDataFormatted,
            'incomeData' => $incomeData,
            'numOfDependentsData' => $numOfDependentsData,
            'dietaryData' => $dietaryData,
        ]);
    }

}
