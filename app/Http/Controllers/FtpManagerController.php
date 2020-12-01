<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FtpManagerController extends Controller
{
    public function update() {
        ini_set('max_execution_time', 3600);
        $userparameters = DB::table('userparameters')->get();
        $ftp_config = array();
        foreach($userparameters as $userparameter) {
            $ftp_config[$userparameter->tipologia] = $userparameter->parametro;
        }

        config(['filesystems.disks.ftp.host' => $ftp_config['MxFTP_HOST']]);
        config(['filesystems.disks.ftp.username' => $ftp_config['MxFTP_USER']]);
        config(['filesystems.disks.ftp.password' => $ftp_config['MxFTP_PWD']]);
        
        $file_path = "/";
        $f_manager = Storage::disk('ftp');
        // $f_manager = Storage::disk('local');

        $contents = $f_manager->listContents($file_path, true);
        foreach($contents as $content) {
            if($content['type'] == "file") {
                if(strpos($content['basename'], $ftp_config['MxFILE_ANA']) !== FALSE) {
                    DB::table('exportlog')->insert(['NomeFile' => $content['basename'], 'created_at' => date("Y-m-d H:i:s")]);

                    $context = $f_manager->read("/" . $content['path']);
                    $arr_context = explode("\n", $context);
                    foreach($arr_context as $ind =>$row_context) {
                        if($ind == 0) continue;
                        $arr_row_context = explode(";", $row_context);
                        
                        if(count($arr_row_context) == 1) continue;

                        $citta_row = DB::table("citta")->where("citta", $arr_row_context[7])->first();
                        $citta_id = (is_null($citta_row) ? NULL : $citta_row->id);

                        $province_row = DB::table("provinces")->where("provincia", $arr_row_context[8])->first();
                        $province_id = (is_null($province_row) ? NULL : $province_row->id);

                        $dealer_id = $this->update_dealers($arr_row_context, $citta_id, $province_id);
                        $this->update_dealer_points($arr_row_context, $citta_id, $province_id, $dealer_id);
                        $this->update_agentis($arr_row_context, $citta_id, $province_id, $dealer_id);
                    }
                }
                else if(strpos($content['basename'], $ftp_config['MxFILE_FAT']) !== FALSE) {
                    DB::table('exportlog')->insert(['NomeFile' => $content['basename'], 'created_at' => date("Y-m-d H:i:s")]);
                    
                    $context = $f_manager->read("/" . $content['path']);
                    $arr_context = explode("\n", $context);
                    foreach($arr_context as $ind =>$row_context) {
                        if($ind == 0) continue;
                        $arr_row_context = explode(";", $row_context);
                        
                        if(count($arr_row_context) == 1) continue;

                        $db_row = DB::table('soggettifatturatos')->where('codice_id', $arr_row_context[2])->first();
                        if(is_null($db_row)) {
                            DB::table('soggettifatturatos')->insert([
                                'mese' => $arr_row_context[0],
                                'anno' => $arr_row_context[1],
                                'codice_id' => $arr_row_context[2],
                                'telefoni' => (float)($arr_row_context[3]),
                                'card' => (float)($arr_row_context[4]),
                                'servizi' => (float)($arr_row_context[5]),
                                'altro' => (float)($arr_row_context[6]),
                                'created_at' => date("Y-m-d H:i:s"),
                                'updated_at' => date("Y-m-d H:i:s")
                            ]);
                        }
                        else {
                            DB::table('soggettifatturatos')->where('codice_id', $arr_row_context[2])->update([
                                'mese' => $arr_row_context[0],
                                'anno' => $arr_row_context[1],
                                'telefoni' => (float)($arr_row_context[3]),
                                'card' => (float)($arr_row_context[4]),
                                'servizi' => (float)($arr_row_context[5]),
                                'altro' => (float)($arr_row_context[6]),
                                'updated_at' => date("Y-m-d H:i:s")
                            ]);
                        }
                    }
                }
            }
        }
    }

    private function update_dealers($arr_row_context, $citta_id, $province_id) {
        $id = "";
        $db_row = DB::table('dealers')->where('codice', $arr_row_context[1])->first();
        if(is_null($db_row)) {
            $id = DB::table('dealers')->insertGetId([
                "codice" =>  $arr_row_context[1],
                "conto_contabilita" => $arr_row_context[2],
                "dealer" => $arr_row_context[3],
                "stato" => $arr_row_context[4],
                "indirizzo" => $arr_row_context[5],
                "cap" =>  $arr_row_context[6],
                "citta_id" => $citta_id,
                "provincia_id" => $province_id,
                "email" => $arr_row_context[9],
                "telefono" => $arr_row_context[10],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        else {
            $id = $db_row->id;
            $update_value = [
                "conto_contabilita" => $arr_row_context[2],
                "dealer" => $arr_row_context[3],
                "stato" => $arr_row_context[4],
                "indirizzo" => $arr_row_context[5],
                "cap" =>  $arr_row_context[6],
                "citta_id" => $citta_id,
                "provincia_id" => $province_id,
                "email" => $arr_row_context[9],
                "telefono" => $arr_row_context[10],
                'updated_at' => date("Y-m-d H:i:s")
            ];
            
            DB::table('dealers')->where('codice', $arr_row_context[1])->update($update_value);
        }

        return $id;
    }

    private function update_dealer_points($arr_row_context, $citta_id, $province_id, $dealer_id) {
        $db_row = DB::table('dealer_points')->where('codice', $arr_row_context[1])->first();
        if(is_null($db_row)) {
            DB::table('dealer_points')->insert([
                "codice" =>  $arr_row_context[1],
                "conto_contabilita" => $arr_row_context[2],
                // "stato" => $arr_row_context[4],
                "indirizzo" => $arr_row_context[5],
                "cap" =>  $arr_row_context[6],
                "citta_id" => $citta_id,
                "provincia_id" => $province_id,
                "point" => $arr_row_context[12],
                "email" => $arr_row_context[14],
                "telefono" => $arr_row_context[13],
                "id_dealer_id" => $dealer_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        else {
            $update_value = [
                "conto_contabilita" => $arr_row_context[11],
                // "stato" => $arr_row_context[4],
                "indirizzo" => $arr_row_context[5],
                "cap" =>  $arr_row_context[6],
                "citta_id" => $citta_id,
                "provincia_id" => $province_id,
                "point" => $arr_row_context[12],
                "email" => $arr_row_context[14],
                "telefono" => $arr_row_context[13],
                "id_dealer_id" => $dealer_id,
                'updated_at' => date("Y-m-d H:i:s")
            ];
            
            DB::table('dealer_points')->where('codice', $arr_row_context[1])->update($update_value);
        }
    }

    private function update_agentis($arr_row_context, $citta_id, $province_id, $dealer_id) {
        $brand = DB::table('brands')->where('name', $arr_row_context[0])->first();
        $brand_id = 0;
        if(!is_null($brand)) {
            $brand_id = $brand->id;
        }

        $db_row = DB::table('agentis')->where('codice', $arr_row_context[1])->first();
        if(is_null($db_row)) {
            DB::table('agentis')->insert([
                "codice" =>  $arr_row_context[1],
                // "stato" => $arr_row_context[4],
                "indirizzo" => $arr_row_context[5],
                "cap" =>  $arr_row_context[6],
                "citta_id" => $citta_id,
                "provincia_id" => $province_id,
                "conto_contabilita" => $arr_row_context[11],
                "agente" => $arr_row_context[12],
                "telefono" => $arr_row_context[13],
                "email" => $arr_row_context[14],
                "id_brand_id" => $brand_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        else {
            $update_value = [
                // "stato" => $arr_row_context[4],
                "indirizzo" => $arr_row_context[5],
                "cap" =>  $arr_row_context[6],
                "citta_id" => $citta_id,
                "provincia_id" => $province_id,
                "conto_contabilita" => $arr_row_context[11],
                "agente" => $arr_row_context[12],
                "telefono" => $arr_row_context[13],
                "email" => $arr_row_context[14],
                "id_brand_id" => $brand_id,
                'updated_at' => date("Y-m-d H:i:s")
            ];
            
            DB::table('agentis')->where('codice', $arr_row_context[1])->update($update_value);
        }
    }
}
