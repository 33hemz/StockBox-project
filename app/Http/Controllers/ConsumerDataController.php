<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ConsumerData;

class ConsumerDataController extends Controller
{
   public function index() {
      return view('upload_product_data');
   }

   // this function opens the designated CSV file and uploads each column into the Product SQL database
   public function uploadUserData() {

      $data = request()->validate(['consumer_file' => 'required']);


      $CSVfile = fopen(request()->file('consumer_file'), 'r');
      $header = fgetcsv($CSVfile, null, ';');

      $expectedHeaders = ['gender','age','country','income','number_of_dependants','dietary_requirements'];

      if ($header !== $expectedHeaders) {
         return redirect()->back()->withErrors(['consumer_file' => 'Invalid CSV file uploaded, Please ensure your CSV header\'s are in the following order: <i>' . implode("; ", $expectedHeaders) . '</i>.']);
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

         $userData = [];
         
         $userData['gender'] = $line[0] ?? '';
         $userData['age'] = $line[1] ?? '';
         $userData['country'] = $line[2] ?? '';
         $userData['income'] = $line[3] ?? '';
         $userData['number_of_dependants'] = $line[4] ?? '';
         $userData['dietary_requirements'] = $line[5] ?? '';

         $create = ConsumerData::firstOrCreate($userData);
         if($create->wasRecentlyCreated) {
            $numInserted++;
         }
         $totalProcessed++;
      }

      fclose($CSVfile);

      // display import successful message
      if ($totalProcessed !== $numInserted) {
         request()->session()->flash('success', $numInserted . ' consumer data were successfully imported. ' . $totalProcessed-$numInserted . ' consumer data were not imported (already present in the database).');
      } else {
         request()->session()->flash('success', $totalProcessed . ' consumer data were successfully imported.');
      }

      return redirect(route('upload_product_data'));
   } 
}
