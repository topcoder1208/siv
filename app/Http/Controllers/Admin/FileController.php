<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Upload;
use App\ExcelImport;

class FileController extends Controller
{
    public function upload(Request $request, $tipologia_id = NULL, $gare_inserimento_id = NULL)
    {
      if(is_null($tipologia_id)) {
        $tipologia_id = $request->post('tipologia_id');
        $gare_inserimento_id = $request->post('gare_inserimento_id');
      }
      $uploadedFile = $request->file('file');
      $orig_name = $uploadedFile->getClientOriginalName();
      $arr_orig_name = explode(".", $orig_name);
      $filename = time() . "." . $arr_orig_name[count($arr_orig_name) - 1];

      Storage::disk('local')->putFileAs(
        'uploadscustomer',
        $uploadedFile,
        $filename
      );

      $upload = new Upload;
      $upload->filename = $filename;
      $upload->orig_filename = $orig_name;
      $upload->user_id = auth()->user()->id;

      // $upload->user()->associate(auth()->user());

      $upload->save();

      $array = Excel::toArray(new ExcelImport, 'uploadscustomer/' . $filename);
      foreach($array[0] as $ind => $row) {
        
        if($ind == 0) continue;

        $this->insert($request, $tipologia_id, $gare_inserimento_id, $row[0], $row[1]);

      }

      return response()->json([
        'id' => $upload->id
      ]);
    }

    public function insert(Request $request, 
        $tipologia_id = NULL, 
        $gare_inserimento_id = NULL, 
        $valore_n_1 = NULL, 
        $descrizione_valore = NULL) {
        
        if(is_null($valore_n_1)) {
          $valore_n_1 = $request->post('valore_n_1');
          $descrizione_valore = $request->post('descrizione_valore');
          $tipologia_id = $request->post('tipologia');
          $gare_inserimento_id = $request->post('gare_inserimento_id');
        }

        $row = DB::table('gare_inserimento_dettaglis')->where([
          'valore_n_1' => $valore_n_1,
          'tipologia' => $tipologia,
          'gare_inserimento_id' => $gare_inserimento_id
        ])->first();

        if(is_null($row)) {
          DB::table('gare_inserimento_dettaglis')->insert([
            'valore_n_1' => $valore_n_1,
            'descrizione_valore' => $descrizione_valore,
            'tipologia' => $tipologia,
            'gare_inserimento_id' => $gare_inserimento_id
          ]);
        }
        else {
          DB::table('gare_inserimento_dettaglis')->where([
            'valore_n_1' => $valore_n_1,
            'tipologia' => $tipologia,
            'gare_inserimento_id' => $gare_inserimento_id
          ])->update(['descrizione_valore' => $descrizione_valore]);
        }
    }
}