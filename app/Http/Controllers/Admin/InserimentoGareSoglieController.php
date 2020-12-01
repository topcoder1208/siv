<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInserimentoGareSoglieRequest;
use App\Http\Requests\StoreInserimentoGareSoglieRequest;
use App\Http\Requests\UpdateInserimentoGareSoglieRequest;
use App\Models\GareInserimento;
use App\Models\InserimentoGareSoglie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InserimentoGareSoglieController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inserimento_gare_soglie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoGareSoglies = InserimentoGareSoglie::all();

        return view('admin.inserimentoGareSoglies.index', compact('inserimentoGareSoglies'));
    }

    public function create()
    {
        abort_if(Gate::denies('inserimento_gare_soglie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titolos = GareInserimento::all()->pluck('titolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inserimentoGareSoglies.create', compact('titolos'));
    }

    public function store(StoreInserimentoGareSoglieRequest $request)
    {
        $inserimentoGareSoglie = InserimentoGareSoglie::create($request->all());

        return redirect()->route('admin.inserimento-gare-soglies.index');
    }

    public function edit(InserimentoGareSoglie $inserimentoGareSoglie)
    {
        abort_if(Gate::denies('inserimento_gare_soglie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titolos = GareInserimento::all()->pluck('titolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inserimentoGareSoglie->load('titolo');

        return view('admin.inserimentoGareSoglies.edit', compact('titolos', 'inserimentoGareSoglie'));
    }

    public function update(UpdateInserimentoGareSoglieRequest $request, InserimentoGareSoglie $inserimentoGareSoglie)
    {
        $inserimentoGareSoglie->update($request->all());

        return redirect()->route('admin.inserimento-gare-soglies.index');
    }

    public function show(InserimentoGareSoglie $inserimentoGareSoglie)
    {
        abort_if(Gate::denies('inserimento_gare_soglie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoGareSoglie->load('titolo');

        return view('admin.inserimentoGareSoglies.show', compact('inserimentoGareSoglie'));
    }

    public function destroy(InserimentoGareSoglie $inserimentoGareSoglie)
    {
        abort_if(Gate::denies('inserimento_gare_soglie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoGareSoglie->delete();

        return back();
    }

    public function massDestroy(MassDestroyInserimentoGareSoglieRequest $request)
    {
        InserimentoGareSoglie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
