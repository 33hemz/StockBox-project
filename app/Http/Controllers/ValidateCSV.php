<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidateCSV extends Controller
{
    function isCSVFile($filename) {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        return ($extension === "csv");
    }
    
}
