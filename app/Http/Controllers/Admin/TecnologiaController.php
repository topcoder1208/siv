<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTecnologiumRequest;
use App\Http\Requests\StoreTecnologiumRequest;
use App\Http\Requests\UpdateTecnologiumRequest;
use App\Models\Categorie;
use App\Models\Tecnologium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TecnologiaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tecnologium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tecnologia = Tecnologium::all();

        return view('admin.tecnologia.index', compact('tecnologia'));
    }

    public function create()
    {
        abort_if(Gate::denies('tecnologium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = Categorie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tecnologia.create', compact('categorias'));
    }

    public function store(StoreTecnologiumRequest $request)
    {
        $tecnologium = Tecnologium::create($request->all());

        return redirect()->route('admin.tecnologia.index');
    }

    public function edit(Tecnologium $tecnologium)
    {
        abort_if(Gate::denies('tecnologium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorias = Categorie::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tecnologium->load('categoria');

        return view('admin.tecnologia.edit', compact('categorias', 'tecnologium'));
    }

    public function update(UpdateTecnologiumRequest $request, Tecnologium $tecnologium)
    {
        $tecnologium->update($request->all());

        return redirect()->route('admin.tecnologia.index');
    }

    public function show(Tecnologium $tecnologium)
    {
        abort_if(Gate::denies('tecnologium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tecnologium->load('categoria');

        return view('admin.tecnologia.show', compact('tecnologium'));
    }

    public function destroy(Tecnologium $tecnologium)
    {
        abort_if(Gate::denies('tecnologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tecnologium->delete();

        return back();
    }

    public function massDestroy(MassDestroyTecnologiumRequest $request)
    {
        Tecnologium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
