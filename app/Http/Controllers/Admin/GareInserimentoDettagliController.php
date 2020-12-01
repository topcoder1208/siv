<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGareInserimentoDettagliRequest;
use App\Http\Requests\StoreGareInserimentoDettagliRequest;
use App\Http\Requests\UpdateGareInserimentoDettagliRequest;
use App\Models\GareInserimento;
use App\Models\GareInserimentoDettagli;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function massDestroy(MassDestroyGareInserimentoDettagliRequest $request)
    {
        GareInserimentoDettagli::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
