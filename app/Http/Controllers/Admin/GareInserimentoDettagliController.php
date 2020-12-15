<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGareInserimentoDettagliRequest;
use App\Http\Requests\StoreGareInserimentoDettagliRequest;
use App\Http\Requests\UpdateGareInserimentoDettagliRequest;
use App\Models\GareInserimento;
use App\Models\Categorie;
use App\Models\GareInserimentoDettagli;
use App\Models\DealerPoint;
use App\Models\Dealer;
use App\Models\Agenti;
use App\Upload;
use App\ExcelImport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GareInserimentoDettagliController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimentoDettaglis = GareInserimentoDettagli::all();

        return view('admin.gareInserimentoDettaglis.index', compact('gareInserimentoDettaglis'));
    }

    public function create()
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gara_inserimentos = GareInserimento::all()->pluck('tipologia_gara', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gareInserimentoDettaglis.create', compact('gara_inserimentos'));
    }

    public function store(StoreGareInserimentoDettagliRequest $request)
    {
        $gareInserimentoDettagli = GareInserimentoDettagli::create($request->all());

        return redirect()->route('admin.gare-inserimento-dettaglis.index');
    }

    public function edit(GareInserimentoDettagli $gareInserimentoDettagli)
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gara_inserimentos = GareInserimento::all()->pluck('tipologia_gara', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gareInserimentoDettagli->load('gara_inserimento');

        return view('admin.gareInserimentoDettaglis.edit', compact('gara_inserimentos', 'gareInserimentoDettagli'));
    }

    public function update(UpdateGareInserimentoDettagliRequest $request, GareInserimentoDettagli $gareInserimentoDettagli)
    {
        $gareInserimentoDettagli->update($request->all());

        return redirect()->route('admin.gare-inserimento-dettaglis.index');
    }

    public function show(GareInserimentoDettagli $gareInserimentoDettagli)
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimentoDettagli->load('gara_inserimento');

        return view('admin.gareInserimentoDettaglis.show', compact('gareInserimentoDettagli'));
    }

    public function destroy(GareInserimentoDettagli $gareInserimentoDettagli)
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimentoDettagli->delete();

        return back();
    }

    public function getPremio($gareInserimentosId) 
    {
        $checked_offertes = GareInserimentoDettagli::where(['tipologia_id' => 17, 'gare_inserimento_id' => $gareInserimentosId])->get();

        $soglies = GareInserimentoDettagli::where(['gare_inserimento_id' => $gareInserimentosId, 'tipologia_id' => '19'])->orderBy("valore_n_2")->get();
        
        $values = GareInserimentoDettagli::where(['gare_inserimento_id' => $gareInserimentosId, 'tipologia_id' => '20'])->get();
        
        return array('checked_offertes' => $checked_offertes, 'soglies' => $soglies, 'values' => $values);
    }

    public function getDettaglis($tipologia_id, $gare_inserimento_id) 
    {
        $dettaglis = GareInserimentoDettagli::select(['gare_inserimento_dettaglis.id', 'valore_n_1', 'descrizione_valore'])
                                                    ->where(['tipologia_id' => $tipologia_id])
                                                    ->where(['gare_inserimento_id' => $gare_inserimento_id])
                                                    ->get();
        return ['data' => $dettaglis];
    }

    public function getDettaglisSrc($tipologia_id, $gare_inserimento_id)
    {
        $table = "";
        $name_field = "";
        $model = NULL;
        if($tipologia_id == 10 || $tipologia_id == 15) {
            $table = 'dealer_points';
            $name_field = 'point';
            $model = new DealerPoint;
        } else if($tipologia_id == 11) {
            $table = 'dealers';
            $name_field = 'dealer';
            $model = new Dealer;
        } else if($tipologia_id == 12 || $tipologia_id == 16) {
            $table = 'agentis';
            $name_field = 'agente';
            $model = new Agenti;
        } else if($tipologia_id == 14) {
            $table = 'dealer_points';
            $name_field = 'agente';
            $model = new GareInserimentoDettagli;
        }


        if($tipologia_id == 14) {
            $dettaglis_src = DB::select("select A.id,D.codice,D.point as name, D.indirizzo,D.cap, P.provincia,C.citta,R.regione,_A.id as _id FROM
                                            (select * from gare_inserimento_dettaglis where tipologia_id=10) as A 
                                            left join " . $table . " as D on A.valore_n_1=D.codice
                                            left join provinces as P on D.provincia_id=P.id
                                            left join citta as C on D.citta_id=C.id
                                            left join regionis as R on P.regione_id=R.id
                                            left join (select id,valore_n_1 from gare_inserimento_dettaglis where tipologia_id=14 and 
                                            gare_inserimento_id=" .$gare_inserimento_id. ") as _A on A.valore_n_1=_A.valore_n_1
                                            order by D.point");
        }
        else {
            $dettaglis_src = $model::select([$table . '.id', 'codice', DB::raw($name_field . ' as name'), 'indirizzo', $table . '.cap', 'provinces.provincia', 'citta.citta', 'regionis.regione', DB::raw('gare_inserimento_dettaglis.id as _id')])
                                        ->leftJoin('provinces', 'provinces.id', '=', $table.'.provincia_id')
                                        ->leftJoin('citta', 'citta.id', '=', $table.'.citta_id')
                                        ->leftJoin('regionis', 'regionis.id', '=', 'provinces.regione_id')
                                        ->leftJoin(DB::raw('(select * from gare_inserimento_dettaglis where tipologia_id=' . $tipologia_id . ' and 
                                            gare_inserimento_id=' .$gare_inserimento_id. ') as gare_inserimento_dettaglis'), 'gare_inserimento_dettaglis.valore_n_1', '=', $table.'.codice')
                                        ->orderBy($name_field)
                                        ->get();
        }
        return ['data' => $dettaglis_src];
    }

    public function insertFrom($tipologia_id, $gareInserimentosId) {
        ini_set('max_execution_time', -1);
        GareInserimentoDettagli::where(['gare_inserimento_id' => $gareInserimentosId, 'tipologia_id' => ($tipologia_id == 13 ? 14 : $tipologia_id)])
                                ->forceDelete();

        $tbl = "dealer_points";
        $field = "point";
        $tipologia = "Beneficio point";
        if($tipologia_id == "11") {
            $tbl = "dealers";
            $field = "dealer";
            $tipologia = "Beneficio dealer";
        } else if($tipologia_id == "12") {
            $tbl = "agentis";
            $field = "agente";
            $tipologia = "Beneficio agente";
        } else if($tipologia_id == "14" || $tipologia_id == "13") {
            $tbl = "dealer_points";
            $field = "point";
            $tipologia = "Concorrenti point";
        } else if($tipologia_id == "15") {
            $tbl = "dealer_points";
            $field = "point";
            $tipologia = "Target point";
        } else if($tipologia_id == "16") {
            $tbl = "agentis";
            $field = "agente";
            $tipologia = "Target agente";
        }

        if($tipologia_id == 14) {
            DB::insert('INSERT INTO gare_inserimento_dettaglis(gare_inserimento_id, tipologia, descrizione_valore, valore_n_1, tipologia_id)
                                            SELECT ?, "' .$tipologia. '", `'.$field.'`, codice, ' .$tipologia_id. ' FROM `' .$tbl. '` WHERE
                                            codice NOT IN (SELECT valore_n_1 FROM gare_inserimento_dettaglis WHERE gare_inserimento_id=? AND tipologia_id=' .$tipologia_id. ')', 
                                        [$gareInserimentosId, $gareInserimentosId]);
        }
        else if($tipologia_id == 13) {
            DB::insert('INSERT INTO gare_inserimento_dettaglis(gare_inserimento_id, tipologia, descrizione_valore, valore_n_1, tipologia_id)
                                            SELECT ?, "' .$tipologia. '", `descrizione_valore`, valore_n_1, 14 FROM `gare_inserimento_dettaglis` WHERE
                                            gare_inserimento_id=? AND tipologia_id=10', 
                                        [$gareInserimentosId, $gareInserimentosId]);
        }
        else {
            DB::insert('INSERT INTO gare_inserimento_dettaglis(gare_inserimento_id, tipologia, descrizione_valore, valore_n_1, tipologia_id)
                                                SELECT ?, "' .$tipologia. '", `' .$field. '`, codice, ' .$tipologia_id. ' FROM `' .$tbl. '` WHERE
                                                codice NOT IN (SELECT valore_n_1 FROM gare_inserimento_dettaglis WHERE gare_inserimento_id=? AND tipologia_id=' .$tipologia_id. ')', 
                                            [$gareInserimentosId, $gareInserimentosId]);
        }

        if($tipologia_id == 13) {
            $tipologia_id = 14;
        }

        $result = GareInserimentoDettagli::where(['tipologia_id' => $tipologia_id])->get();
        return $result;
    }

    public function insertFromSelected(Request $request) {
        $all_data = $request->all();
        $data = (isset($all_data['data']) ? $all_data['data'] : []);
        $deleted_data = (isset($all_data['deleted_data']) ? $all_data['deleted_data'] : []);
        $gare_inserimento_id = $all_data['gare-inserimentos-id'];
        $tipologia_id = $all_data['tipologia_id'];
        $tbl = "dealer_points";
        $field = "point";
        $tipologia = "Beneficio point";
        if($tipologia_id == "11") {
            $tbl = "dealers";
            $field = "dealer";
            $tipologia = "Beneficio dealer";
        } else if($tipologia_id == "12") {
            $tbl = "agentis";
            $field = "agente";
            $tipologia = "Beneficio agente";
        } else if($tipologia_id == "14") {
            $tbl = "dealer_points";
            $field = "point";
            $tipologia = "Concorrenti point";
        } else if($tipologia_id == "15") {
            $tbl = "dealer_points";
            $field = "point";
            $tipologia = "Target point";
        } else if($tipologia_id == "16") {
            $tbl = "agentis";
            $field = "agente";
            $tipologia = "Target agente";
        }

        if(count($deleted_data) > 0)
        {
            if($tipologia_id == "14") {
                $codices = [];
                $codices_rows = DB::table("gare_inserimento_dettaglis")->whereIn('id', $deleted_data)->get();
                foreach($codices_rows as $row) {
                    $codices[] = $row->valore_n_1;
                }
                GareInserimentoDettagli::where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => $tipologia_id])
                                        ->whereIn('valore_n_1', $codices)
                                        ->forceDelete();
            }
            else {
                $codices = [];
                $codices_rows = DB::table($tbl)->whereIn('id', $deleted_data)->get();
                foreach($codices_rows as $row) {
                    $codices[] = $row->codice;
                }
                GareInserimentoDettagli::where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => $tipologia_id])
                                        ->whereIn('valore_n_1', $codices)
                                        ->forceDelete();
            }
        }

        if(count($data) > 0) {
            if($tipologia_id == "14") {
                DB::insert('INSERT INTO gare_inserimento_dettaglis(gare_inserimento_id, tipologia, descrizione_valore, valore_n_1, tipologia_id)
                                                SELECT ?, "' .$tipologia. '", descrizione_valore, valore_n_1, '.$tipologia_id.' FROM `gare_inserimento_dettaglis` WHERE 
                                                id IN (' .implode(",", $data). ')', 
                                            [$gare_inserimento_id]);
            }
            else {
                DB::insert('INSERT INTO gare_inserimento_dettaglis(gare_inserimento_id, tipologia, descrizione_valore, valore_n_1, tipologia_id)
                                                    SELECT ?, "' .$tipologia. '", `' .$field. '`, codice, ' .$tipologia_id. ' FROM `' .$tbl. '` WHERE 
                                                    id IN (' .implode(",", $data). ') AND
                                                    codice NOT IN (SELECT valore_n_1 FROM gare_inserimento_dettaglis WHERE gare_inserimento_id=?)', 
                                                [$gare_inserimento_id, $gare_inserimento_id]);
            }
        }

        $result = GareInserimentoDettagli::where(['tipologia_id' => $tipologia_id])->get();
        return $result;
    }

    public function insertFromFileUpload(Request $request, $tipologia_id = NULL, $gare_inserimento_id = NULL)
    {
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

      DB::table("gare_inserimento_dettaglis")->where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => $tipologia_id])->delete();

      $array = Excel::toArray(new ExcelImport, 'uploadscustomer/' . $filename);
      foreach($array[0] as $ind => $row) {
        
        if($ind == 0) continue;

        $this->_insertFromFileUpload($tipologia_id, $gare_inserimento_id, $row[0], $row[1]);

      }

      $records = DB::table("gare_inserimento_dettaglis")->where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => $tipologia_id])->get();

      return $records;
    }

    public function _insertFromFileUpload(
        $tipologia_id = NULL, 
        $gare_inserimento_id = NULL, 
        $valore_n_1 = NULL, 
        $descrizione_valore = NULL) {
        
          $tipologia = "Beneficio dealer";
          if($tipologia_id == "10") {
            $tipologia = "Beneficio point";
          }
          else if($tipologia_id == "11") {
            $tipologia = "Beneficio agente";
          }
          else if($tipologia_id == "14") {
            $tipologia = "Concorrenti agente";
          }
          else if($tipologia_id == "15") {
            $tipologia = "Target point";
          }
          else if($tipologia_id == "16") {
            $tipologia = "Target agenti";
          }

          DB::table('gare_inserimento_dettaglis')->insert([
            'valore_n_1' => $valore_n_1,
            'descrizione_valore' => $descrizione_valore,
            'tipologia' => $tipologia,
            'tipologia_id' => $tipologia_id,
            'gare_inserimento_id' => $gare_inserimento_id
          ]);
    }

    public function insertBrandCategoriesDetails(Request $request) {
        $data = $request->all();
        $ids = $data['brand_categories'];
        $gareInserimentosId = $data['gare-inserimentos-id'];

        GareInserimentoDettagli::where([
            'gare_inserimento_id' => $gareInserimentosId,
            'tipologia_id' => 2
        ])->forceDelete();

        $categories = Categorie::select(Categorie::raw('concat(brands.name, " ", categories.tipologia) as descrizione_valore'), 'tecnologia_modalita_id', 'brand_id', 'categories.id')
                                ->whereIn('categories.id', $ids)
                                ->join('brands', 'brands.id', '=', 'categories.brand_id')
                                ->get();

        foreach($categories as $category) {
            GareInserimentoDettagli::insert([
                'gare_inserimento_id' => $gareInserimentosId, 
                'tipologia' => 'Brand tecnologia', 
                'tipologia_id' => 2,
                'valore_n_1' => $category->tecnologia_modalita_id,
                'valore_n_2' => $category->brand_id,
                'valore_n_3' => $category->id,
                'descrizione_valore' => $category->descrizione_valore
            ]);
        }

        return "success";
    }

    public function getFasce($gare_inserimento_id) {
        $fasce = GareInserimentoDettagli::where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => 17])->get();
        return $fasce;
    }

    public function saveFasce(Request $request)
    {
        $data = $request->all();
        $offertes_ids = $data['offertes-ids'];
        $offertes_names = $data['offertes-names'];
        $gare_inserimento_id = $data['gare-inserimentos-id'];
        
        GareInserimentoDettagli::where(['tipologia_id' => 17, 'gare_inserimento_id' => $gare_inserimento_id])->forceDelete();

        foreach($offertes_ids as $ind => $offertes_id) {
            GareInserimentoDettagli::insert([
                'tipologia' => 'servizi',
                'valore_n_1' => $offertes_id,
                'descrizione_valore' => $offertes_names[$ind],
                'gare_inserimento_id' => $gare_inserimento_id, 
                'tipologia_id' => 17
            ]);
        }

        GareInserimentoDettagli::where(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => 18])->forceDelete();
        GareInserimentoDettagli::insert(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => 18, 'valore_n_1' => $data['val'], 'tipologia' => 'Fasce']);
        return "success";
    }

    public function savePremio(Request $request) 
    {
        $data = $request->all();
        $premio_type = $data['premio_type'];
        $premio_value = $data['premio_value'];
        GareInserimento::where(['id' => $data['gare-inserimentos-id']])->update(['premiotipo' => $premio_type, 'premio_quantita' => $premio_value]);

        $soglies = $data['soglies'];
        GareInserimentoDettagli::where(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '19'])->forceDelete();
        foreach($soglies as $ind => $soglie) {
            GareInserimentoDettagli::insert(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '19', 'valore_n_1' => $soglie, 'valore_n_2' => ((int)($ind / 2)) . ($ind % 2 == 0 ? "-1" : "-2"), 'tipologia' => 'Soglies']);
        }

        $values = $data['values'];
        GareInserimentoDettagli::where(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '20'])->forceDelete();
        foreach($values as $ind => $col) {
            foreach($col as $r => $v) {
                GareInserimentoDettagli::insert(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '20', 'valore_n_1' => $v, 'valore_n_2' => $ind, 'valore_n_3' => $r, 'tipologia' => 'Premio']);
            }
        }

        return 'success';
    }

    public function getMetodo($gare_inserimento_id) {
        $metodo = GareInserimentoDettagli::where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => 21])->get();
        return $metodo;
    }

    public function saveMetodo(Request $request) 
    {
        $data = $request->all();
        $metodo_attribuzione = $data['metodo_attribuzione'];
        $metodo_calcolo = $data['metodo_calcolo'];
        GareInserimento::where(['id' => $data['gare-inserimentos-id']])->update(['metodo_attribuzione' => $metodo_attribuzione, 'metodo_calcolo' => $metodo_calcolo]);

        $valore_n_1 = $data['valore_n_1'];
        $valore_n_2 = $data['valore_n_2'];
        $valore_n_3 = $data['valore_n_3'];
        GareInserimentoDettagli::where(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '21'])->forceDelete();
        foreach($valore_n_1 as $ind => $val) {
            GareInserimentoDettagli::insert(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '21', 'valore_n_1' => $val, 'valore_n_2' => $valore_n_2[$ind], 'valore_n_3' => $valore_n_3[$ind], 'tipologia' => 'Metodo']);
        }

        return 'success';
    }

    public function getEsito($gare_inserimento_id) {
        $esito = GareInserimentoDettagli::where(['gare_inserimento_id' => $gare_inserimento_id, 'tipologia_id' => 22])->get();
        return $metodo;
    }

    public function saveEsito(Request $request) 
    {
        $data = $request->all();
        $esito = $data['esito'];
        $esito_incremento = $data['esito_incremento'];
        $esito_decremento = $data['esito_decremento'];
        GareInserimento::where(['id' => $data['gare-inserimentos-id']])->update(['esito_incremento' => $esito_incremento, 'esito_decremento' => $esito_decremento, 'esito' => $esito]);

        if(isset($data['esito_gare'])) {
            $esito_gare = $data['esito_gare'];
            GareInserimentoDettagli::where(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '22'])->forceDelete();
            foreach($esito_gare as $ind => $val) {
                GareInserimentoDettagli::insert(['gare_inserimento_id' => $data['gare-inserimentos-id'], 'tipologia_id' => '22', 'valore_n_1' => $val, 'tipologia' => 'Esito']);
            }
        }

        return 'success';
    }

    public function massDestroy(MassDestroyGareInserimentoDettagliRequest $request)
    {
        GareInserimentoDettagli::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
