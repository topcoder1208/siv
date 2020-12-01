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
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GareInserimentoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gare_inserimento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimentos = GareInserimento::with(['brand_tipologias', 'visibilitas', 'esito_negativos'])->get();

        $categories = Categorie::get();

        $soggetti_tipologia = SoggettiTipologium::get();

        $offertes = Offerte::get();

        return view('admin.gareInserimentos.index', compact('gareInserimentos', 'categories', 'soggetti_tipologia', 'offertes'));
    }

    public function create()
    {
        abort_if(Gate::denies('gare_inserimento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brand_tipologias = Categorie::all()->pluck('nome', 'id');

        $visibilitas = SoggettiTipologium::all()->pluck('tipologia', 'id');

        $esito_negativos = Offerte::all()->pluck('nome', 'id');

        return view('admin.gareInserimentos.create', compact('brand_tipologias', 'visibilitas', 'esito_negativos'));
    }

    public function store(StoreGareInserimentoRequest $request)
    {
        $gareInserimento = GareInserimento::create($request->all());
        $gareInserimento->brand_tipologias()->sync($request->input('brand_tipologias', []));
        $gareInserimento->visibilitas()->sync($request->input('visibilitas', []));
        $gareInserimento->esito_negativos()->sync($request->input('esito_negativos', []));

        return redirect()->route('admin.gare-inserimentos.index');
    }

    public function edit(GareInserimento $gareInserimento)
    {
        abort_if(Gate::denies('gare_inserimento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brand_tipologias = Categorie::all()->pluck('nome', 'id');

        $visibilitas = SoggettiTipologium::all()->pluck('tipologia', 'id');

        $esito_negativos = Offerte::all()->pluck('nome', 'id');

        $gareInserimento->load('brand_tipologias', 'visibilitas', 'esito_negativos');

        return view('admin.gareInserimentos.edit', compact('brand_tipologias', 'visibilitas', 'esito_negativos', 'gareInserimento'));
    }

    public function update(UpdateGareInserimentoRequest $request, GareInserimento $gareInserimento)
    {
        $gareInserimento->update($request->all());
        $gareInserimento->brand_tipologias()->sync($request->input('brand_tipologias', []));
        $gareInserimento->visibilitas()->sync($request->input('visibilitas', []));
        $gareInserimento->esito_negativos()->sync($request->input('esito_negativos', []));

        return redirect()->route('admin.gare-inserimentos.index');
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
