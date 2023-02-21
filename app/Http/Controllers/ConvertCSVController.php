<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ConvertCSVController extends Controller
{
   public function index() {
      return view('table');
   }

   // this function opens the designated CSV file and uploads each column into the Product SQL database
   public function uploadCSV() {

      $data = request()->validate(['file' => 'required']);


      $CSVfile = fopen(request()->file('file'), 'r');
      $header = fgetcsv($CSVfile, null, ';');

      $expectedHeaders = ['link','category_1','category_2','product_name','price','price_per','ingredients','allergen_information','brand','recycling_information','brand_details'];
      
      if ($header !== $expectedHeaders) {
         return redirect()->back()->withErrors(['file' => 'Invalid CSV file uploaded, Please ensure your CSV header\'s are in the following order: <i>' . implode("; ", $expectedHeaders) . '</i>.']);
      }
      $lineOfCsv = 1; 

      $numInserted = 0; // store number of records inserted into the db
      $totalProcessed = 0; // store total number of processed records (either already in db or inserted)
      while(!feof($CSVfile)) {
         $lineOfCsv++;
         $line = fgetcsv($CSVfile, null, ';');



         
         // ignore line if blank
         if(($line[0] ?? null) === null) {
            continue;
         }


         $product = [];
         $product['category'] = $line[1] ?? '';
         
         
         $id = ProductCategory::where('product_category_name', $product['category'])->first();
         if (!isset($id['id'])) {
            return redirect()->back()->withErrors(['file' => 'Invalid product category for line ' . $lineOfCsv]);
         } 
         
         $product['category_id'] = $id['id'] ?? '';
         $product['product_link'] = $line[0] ?? '';
         $product['subcategory'] = $line[2] ?? '';
         $product['product_name'] = $line[3] ?? '';
         $product['price_£'] = $line[4] ?? '';
         $product['price_per'] = $line[5] ?? '';
         $product['ingredients'] = $line[6] ?? '';
         $product['allergen_information'] = $line[7] ?? '';
         $product['brand'] = $line[8] ?? '';
         $product['recycling_information'] = $line[9] ?? '';
         $product['brand_details'] = $line[10] ?? '';

         // add product to database if it doesn't already exist
         $create = Product::firstOrCreate($product);
         if ($create->wasRecentlyCreated) {
            $numInserted++;
         }
         $totalProcessed++;
      }

      fclose($CSVfile);

      // display import successful message
      if ($totalProcessed !== $numInserted) {
         request()->session()->flash('success', $numInserted . ' products were successfully imported. ' . $totalProcessed-$numInserted . ' products were not imported (already present in the database).');
      } else {
         request()->session()->flash('success', $totalProcessed . ' products were successfully imported.');
      }

      return redirect(route('table'));
   } 
}
