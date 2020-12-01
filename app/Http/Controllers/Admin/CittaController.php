<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCittumRequest;
use App\Http\Requests\StoreCittumRequest;
use App\Http\Requests\UpdateCittumRequest;
use App\Models\Cittum;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CittaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cittum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $citta = Cittum::with(['provincia'])->get();

        $provinces = Province::get();

        return view('admin.citta.index', compact('citta', 'provinces'));
    }

    public function create()
    {
        abort_if(Gate::denies('cittum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.citta.create', compact('provincias'));
    }

    public function store(StoreCittumRequest $request)
    {
        $cittum = Cittum::create($request->all());

        return redirect()->route('admin.citta.index');
    }

    public function edit(Cittum $cittum)
    {
        abort_if(Gate::denies('cittum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cittum->load('provincia');

        return view('admin.citta.edit', compact('provincias', 'cittum'));
    }

    public function update(UpdateCittumRequest $request, Cittum $cittum)
    {
        $cittum->update($request->all());

        return redirect()->route('admin.citta.index');
    }

    public function show(Cittum $cittum)
    {
        abort_if(Gate::denies('cittum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cittum->load('provincia');

        return view('admin.citta.show', compact('cittum'));
    }

    public function destroy(Cittum $cittum)
    {
        abort_if(Gate::denies('cittum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cittum->delete();

        return back();
    }

    public function massDestroy(MassDestroyCittumRequest $request)
    {
        Cittum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
