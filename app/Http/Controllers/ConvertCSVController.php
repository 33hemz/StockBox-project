<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductData;

class ConvertCSVController extends Controller
{
   public function index() {
      return view('table');
   }
   public function uploadCSV() {
      //This function opens the designated CSV file and uploads each column into the ProductData SQL database
      $CSVfile = fopen(request()->file('csvFile'), 'r');
      $header = fgetcsv($CSVfile);

      $expectedHeaders = ['brand','product_name','category','subcategory','price_£',
      'price_per','ingredients','allergen_information','recycling_information','product_link','brand_details'];
      if ($header !== $expectedHeaders) {
         return redirect()->back()->withErrors(['file' => 'Invalid CSV file uploaded, Please ensure your header\'s match the ones in the example CSV file.']);
      }
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
