<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVenditeRequest;
use App\Http\Requests\StoreVenditeRequest;
use App\Http\Requests\UpdateVenditeRequest;
use App\Models\Agenti;
use App\Models\DealerPoint;
use App\Models\Offerte;
use App\Models\Vendite;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VenditeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vendite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendites = Vendite::with(['servizio', 'id_agente', 'id_point'])->get();

        $offertes = Offerte::get();

        $agentis = Agenti::get();

        $dealer_points = DealerPoint::get();

        return view('admin.vendites.index', compact('vendites', 'offertes', 'agentis', 'dealer_points'));
    }

    public function create()
    {
        abort_if(Gate::denies('vendite_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servizios = Offerte::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_agentes = Agenti::all()->pluck('agente', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_points = DealerPoint::all()->pluck('conto_contabilita', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vendites.create', compact('servizios', 'id_agentes', 'id_points'));
    }

    public function store(StoreVenditeRequest $request)
    {
        $vendite = Vendite::create($request->all());

        return redirect()->route('admin.vendites.index');
    }

    public function edit(Vendite $vendite)
    {
        abort_if(Gate::denies('vendite_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servizios = Offerte::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_agentes = Agenti::all()->pluck('agente', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_points = DealerPoint::all()->pluck('conto_contabilita', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendite->load('servizio', 'id_agente', 'id_point');

        return view('admin.vendites.edit', compact('servizios', 'id_agentes', 'id_points', 'vendite'));
    }

    public function update(UpdateVenditeRequest $request, Vendite $vendite)
    {
        $vendite->update($request->all());

        return redirect()->route('admin.vendites.index');
    }

    public function show(Vendite $vendite)
    {
        abort_if(Gate::denies('vendite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendite->load('servizio', 'id_agente', 'id_point');

        return view('admin.vendites.show', compact('vendite'));
    }

    public function destroy(Vendite $vendite)
    {
        abort_if(Gate::denies('vendite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendite->delete();

        return back();
    }

    public function massDestroy(MassDestroyVenditeRequest $request)
    {
        Vendite::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
