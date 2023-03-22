<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ConvertCSVController extends Controller
{
   public function index() {
      return view('upload_product_data');
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
         
         $productCat = ProductCategory::where('product_category_name', $line[1])->first();
         
         if ($productCat === null) {
            $new = ProductCategory::create(['product_category_name' => $line[1]]);
            $productCatId = $new['id'];
         } else {
            $productCatId = $productCat['id'];
         }

         $product = [];
         $product['category'] = $line[1] ?? '';
         
         $product['category_id'] = $productCatId;
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

      return redirect(route('upload_product_data'));
   } 





   function create_shopping_list() {

      $items = array(
          "Fruits" => array("Apples","Watermelon", "Peach"),
          "Vegetables" => array("Carrots", "Broccoli", "Cauliflower"),
          "Meat and Poultry" => array("Chicken", "Beef", "Pork", "Quorn Chicken Nuggets"),
          "Milk" => array("Whole Milk", "Semi-Skimmed Milk", "Oat Milk"),
          "Dairy Products + Eggs" => array("Cheddar Cheese", "Butter", "Yogurt", "Eggs"),
          "Bakery" => array("White Bread", "Brown Bread", "Bread Rolls"),
          "Canned Foods" => array("Kidney Beans", "Beans", "Soup")
      );
      $list = "<h2>Shopping List</h2><ul>";
      foreach ($items as $category => $item) {
          $num_items = 10000; 
          while ($num_items > count($item)) {
              $num_items = rand(0, 5); // randomly select number of items between 0 and 5
          }
          if ($num_items == 0) {
              
          } else {
              $selected_items = array_rand($item, $num_items); // randomly select items
              if ($num_items > 1) {
                  // If more than one item is selected, concatenate with list tags
                  $items_str = implode("</li><li>", array_intersect_key($item, array_flip($selected_items)));
              } else {
                  $items_str = $item[$selected_items]; // Otherwise, just use the single selected item
              }
              $list .= "<li>$items_str</li>";
          }
      }
      $list .= "</ul>";

      return $list;
  }
}
