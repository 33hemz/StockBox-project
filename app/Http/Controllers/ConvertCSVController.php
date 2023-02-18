<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductData;

class ConvertCSVController extends Controller
{
   public function uploadCSV() {
      //This function opens the designated CSV file and uploads each column into the ProductData SQL database

      $CSVfile = fopen(public_path('assets/Ocado_Full_Data.csv'), 'r');

         
         while(!feof($CSVfile))
         {
            $line = fgetcsv($CSVfile, null, ';');

            $product = new ProductData;
            $product->product_link = $line[0];
            $product->category = $line[1];
            $product->subcategory = $line[2];
            $product->product_name = $line[3];
            $product->price_£ = $line[4];
            $product->price_per = $line[5];
            $product->ingredients = $line[6];
            $product->allergen_information = $line[7];
            $product->brand = $line[8];
            $product->recycling_information = $line[9];
            $product->brand_details = $line[10];

            $product->save();
         }

      fclose($CSVfile);

      return view('table');
   } 

   function isCSVFile($filename) {
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      return ($extension === "csv");
  }
}
