<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgentiRequest;
use App\Http\Requests\StoreAgentiRequest;
use App\Http\Requests\UpdateAgentiRequest;
use App\Models\Agenti;
use App\Models\Brand;
use App\Models\Cittum;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentis = Agenti::with(['id_brand', 'citta', 'provincia'])->get();

        $brands = Brand::get();

        $citta = Cittum::get();

        $provinces = Province::get();

        return view('admin.agentis.index', compact('agentis', 'brands', 'citta', 'provinces'));
    }

    public function create()
    {
        abort_if(Gate::denies('agenti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cittas = Cittum::all()->pluck('citta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agentis.create', compact('id_brands', 'cittas', 'provincias'));
    }

    public function store(StoreAgentiRequest $request)
    {
        $agenti = Agenti::create($request->all());

        return redirect()->route('admin.agentis.index');
    }

    public function edit(Agenti $agenti)
    {
        abort_if(Gate::denies('agenti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cittas = Cittum::all()->pluck('citta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agenti->load('id_brand', 'citta', 'provincia');

        return view('admin.agentis.edit', compact('id_brands', 'cittas', 'provincias', 'agenti'));
    }

    public function update(UpdateAgentiRequest $request, Agenti $agenti)
    {
        $agenti->update($request->all());

        return redirect()->route('admin.agentis.index');
    }

    public function show(Agenti $agenti)
    {
        abort_if(Gate::denies('agenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenti->load('id_brand', 'citta', 'provincia');

        return view('admin.agentis.show', compact('agenti'));
    }

    public function destroy(Agenti $agenti)
    {
        abort_if(Gate::denies('agenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenti->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentiRequest $request)
    {
        Agenti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
