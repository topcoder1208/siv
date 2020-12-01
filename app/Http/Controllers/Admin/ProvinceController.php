<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProvinceRequest;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use App\Models\Province;
use App\Models\Regioni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvinceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('province_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinces = Province::with(['regione'])->get();

        $regionis = Regioni::get();

        return view('admin.provinces.index', compact('provinces', 'regionis'));
    }

    public function create()
    {
        abort_if(Gate::denies('province_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regiones = Regioni::all()->pluck('regione', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.provinces.create', compact('regiones'));
    }

    public function store(StoreProvinceRequest $request)
    {
        $province = Province::create($request->all());

        return redirect()->route('admin.provinces.index');
    }

    public function edit(Province $province)
    {
        abort_if(Gate::denies('province_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regiones = Regioni::all()->pluck('regione', 'id')->prepend(trans('global.pleaseSelect'), '');

        $province->load('regione');

        return view('admin.provinces.edit', compact('regiones', 'province'));
    }

    public function update(UpdateProvinceRequest $request, Province $province)
    {
        $province->update($request->all());

        return redirect()->route('admin.provinces.index');
    }

    public function show(Province $province)
    {
        abort_if(Gate::denies('province_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $province->load('regione', 'provinciaCitta');

        return view('admin.provinces.show', compact('province'));
    }

    public function destroy(Province $province)
    {
        abort_if(Gate::denies('province_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $province->delete();

        return back();
    }

    public function massDestroy(MassDestroyProvinceRequest $request)
    {
        Province::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
