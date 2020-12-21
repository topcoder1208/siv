<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGareInserimentoRequest;
use App\Http\Requests\StoreGareInserimentoRequest;
use App\Http\Requests\UpdateGareInserimentoRequest;
use App\Models\Categorie;
use App\Models\GareInserimento;
use App\Models\Offerte;
use App\Models\SoggettiTipologium;
use App\Models\GareInserimentoDettagli;
use App\Models\DealerPoint;
use App\Models\Dealer;
use App\Models\Brand;
use App\Models\Agenti;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class GareInserimentoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gare_inserimento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*")) {
            $tipologia_gara = 'target';
        } else {
            $tipologia_gara = 'fasce';
        }

        $gareInserimentos = GareInserimento::with(['brand_tipologias', 'visibilitas', 'esito_negativos'])->where(['tipologia_gara' => $tipologia_gara])->get();

        $categories = Categorie::get();

        $soggetti_tipologia = SoggettiTipologium::get();

        $offertes = Offerte::get();

        return view('admin.gareInserimentos.index', compact('gareInserimentos', 'categories', 'soggetti_tipologia', 'offertes'));
    }

    public function copy($id, Request $request) {
        abort_if(Gate::denies('gare_inserimento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $gare = GareInserimento::find($id);
        $new_gare = $gare->replicate();
        $new_gare->save();

        $new_id = $new_gare->id;
        DB::insert('INSERT INTO gare_inserimento_dettaglis(`tipologia`,`valore_n_1`,`valore_n_2`,`valore_n_3`,`valore_n_4`,`descrizione_valore`,`gare_inserimento_id`,`tipologia_id`)
                                            SELECT `tipologia`,`valore_n_1`,`valore_n_2`,`valore_n_3`,`valore_n_4`,`descrizione_valore`,?,`tipologia_id` FROM
                                            `gare_inserimento_dettaglis` WHERE gare_inserimento_id=?;', 
                                        [$new_id, $id]);


        if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*"))
            return redirect(route("admin.gare-inserimentos.target"));
        else
            return redirect(route("admin.gare-inserimentos.fascia"));
    }

    public function create()
    {
        abort_if(Gate::denies('gare_inserimento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*")) {
            $tipologia_gara = 'target';
        } else {
            $tipologia_gara = 'fasce';
        }

        $brand_tipologias = Categorie::all()->pluck('nome', 'id');

        $visibilitas = SoggettiTipologium::all()->pluck('tipologia', 'id');

        $esito_negativos = Offerte::all()->pluck('nome', 'id');

        $brands = Brand::where(['attivo' => 1])->get();

        $t = Categorie::all();
        $bm_ids = array();
        foreach($t as $r) {
            if(array_search($r->brand_id . "-" . $r->tecnologia_modalita_id, $bm_ids) === FALSE) {
                $brand_categories[] = $r;
                $bm_ids[] = $r->brand_id . "-" . $r->tecnologia_modalita_id;
            }
        }
        $t = DB::table('tecnologia_modalita')->get();
        $modalita = array();
        foreach($t as $r) {
            $modalita[$r->id] = $r->modalita;
        }

        foreach($brand_tipologias as $id => $nome) {
            $brand_tipologias[$id] = [$nome, (isset($checked_categories[$id]) ? $checked_categories[$id] : 0)];
        }

        $fasce_val = "";

        $gares = GareInserimento::where('stato', '<>', 0)
                                ->where('tipologia_gara', $tipologia_gara)
                                ->get()->pluck('titolo', 'id');

        return view('admin.gareInserimentos.create', compact('brand_tipologias', 'brand_categories', 'fasce_val', 'gares', 'modalita', 'brands', 'visibilitas', 'esito_negativos'));
    }

    public function store(StoreGareInserimentoRequest $request)
    {
        $data = $request->all();
        $data['stato'] = 1;
        if(isset($data['id'])){
            $gareInserimento = GareInserimento::where(['id' => $data['id']])->first();
            $gareInserimento->update($data);
        }
        else {
            $gareInserimento = GareInserimento::create($data);
        }
        $gareInserimento->brand_tipologias()->sync($request->input('brand_tipologias', []));
        $gareInserimento->visibilitas()->sync($request->input('visibilitas', []));
        $gareInserimento->esito_negativos()->sync($request->input('esito_negativos', []));

        return array("result" => "success", "id" => $gareInserimento->id);
        // return redirect()->route('admin.gare-inserimentos.index');
    }

    public function edit($gare_id)
    {
        abort_if(Gate::denies('gare_inserimento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $gare = GareInserimento::where('id', $gare_id)->first();
        $brand_tipologias = Categorie::all()->pluck('nome', 'id');
        $t = GareInserimentoDettagli::where(['tipologia_id' => 17, 'gare_inserimento_id' => $gare_id])->get();
        $checked_categories = [];
        foreach($t as $r) {
            $checked_categories[$r->valore_n_1] = $r->valore_n_2;
        }

        $visibilitas = SoggettiTipologium::all()->pluck('tipologia', 'id');

        $esito_negativos = Offerte::all()->pluck('nome', 'id');


        $dettaglis = GareInserimentoDettagli::where(['tipologia_id' => 2, 'gare_inserimento_id' => $gare_id])
                            ->get()->pluck('valore_n_2', 'valore_n_3');
        
        $brands = Brand::where(['attivo' => 1])->get();

        $t = Categorie::all();
        $bm_ids = array();
        foreach($t as $r) {
            if(array_search($r->brand_id . "-" . $r->tecnologia_modalita_id, $bm_ids) === FALSE) {
                $brand_categories[] = $r;
                $bm_ids[] = $r->brand_id . "-" . $r->tecnologia_modalita_id;
            }
        }
        $t = DB::table('tecnologia_modalita')->get();
        $modalita = array();
        foreach($t as $r) {
            $modalita[$r->id] = $r->modalita;
        }

        foreach($brand_tipologias as $id => $nome) {
            $brand_tipologias[$id] = [$nome, (isset($checked_categories[$id]) ? $checked_categories[$id] : 0)];
        }

        $fasce_val = GareInserimentoDettagli::where(['tipologia_id' => 18, 'gare_inserimento_id' => $gare_id])->first();
        if(is_null($fasce_val)) {
            $fasce_val = "";
        }
        else {
            $fasce_val = $fasce_val->valore_n_1;
        }

        $gares = GareInserimento::where('stato', '<>', 0)
                                ->where('id', '<>' ,$gare_id)
                                ->get()->pluck('titolo', 'id');

        $t = GareInserimentoDettagli::where(['gare_inserimento_id' => $gare_id, 'tipologia_id' => 22])->get();
        $esito_gares = [];
        foreach($t as $row) {
            $esito_gares[$row->valore_n_1] = 1;
        }

        return view('admin.gareInserimentos.create', compact('brand_tipologias', 'brand_categories', 'fasce_val', 'gare', 'gares', 'modalita', 'brands', 'dettaglis', 'visibilitas', 'esito_negativos', 'esito_gares'));
    }

    public function update(UpdateGareInserimentoRequest $request, GareInserimento $gareInserimento)
    {
        $gareInserimento->update($request->all());
        $gareInserimento->brand_tipologias()->sync($request->input('brand_tipologias', []));
        $gareInserimento->visibilitas()->sync($request->input('visibilitas', []));
        $gareInserimento->esito_negativos()->sync($request->input('esito_negativos', []));

        return array("result" => "success");
        // return redirect()->route('admin.gare-inserimentos.index');
    }

    public function show(GareInserimento $gareInserimento)
    {
        abort_if(Gate::denies('gare_inserimento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimento->load('brand_tipologias', 'visibilitas', 'esito_negativos');

        return view('admin.gareInserimentos.show', compact('gareInserimento'));
    }

    public function destroy(GareInserimento $gareInserimento)
    {
        abort_if(Gate::denies('gare_inserimento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimento->delete();

        return back();
    }

    public function massDestroy(MassDestroyGareInserimentoRequest $request)
    {
        GareInserimento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
