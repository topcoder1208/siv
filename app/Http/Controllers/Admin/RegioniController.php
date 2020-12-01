<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegioniRequest;
use App\Http\Requests\StoreRegioniRequest;
use App\Http\Requests\UpdateRegioniRequest;
use App\Models\Regioni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegioniController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('regioni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionis = Regioni::all();

        return view('admin.regionis.index', compact('regionis'));
    }

    public function create()
    {
        abort_if(Gate::denies('regioni_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionis.create');
    }

    public function store(StoreRegioniRequest $request)
    {
        $regioni = Regioni::create($request->all());

        return redirect()->route('admin.regionis.index');
    }

    public function edit(Regioni $regioni)
    {
        abort_if(Gate::denies('regioni_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionis.edit', compact('regioni'));
    }

    public function update(UpdateRegioniRequest $request, Regioni $regioni)
    {
        $regioni->update($request->all());

        return redirect()->route('admin.regionis.index');
    }

    public function show(Regioni $regioni)
    {
        abort_if(Gate::denies('regioni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regioni->load('regioneProvinces');

        return view('admin.regionis.show', compact('regioni'));
    }

    public function destroy(Regioni $regioni)
    {
        abort_if(Gate::denies('regioni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regioni->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegioniRequest $request)
    {
        Regioni::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
